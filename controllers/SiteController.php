<?php

namespace app\controllers;

use app\components\helpers\UploadImage;
use app\models\BackpassForm;
use app\models\Messages;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SignupForm;
use app\models\Auth;
use app\models\User;
use app\components\helpers\Facebook;
use yii\helpers\Json;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            /*  'captcha' => [
                   'class' => 'mdm\captcha\CaptchaAction',
                   'level' => 3, // avaliable level are 1,2,3 :D
               ],*/
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'onAuthSuccess'],
            ],
        ];
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionTest(){
        var_dump(Yii::$app->params['devicedetect']);die;
    }


    public function actionChat()
    {
        $this->layout = 'login';
        if (Yii::$app->request->post()) {
            $model = new Messages();
            $post = Yii::$app->request->post();
            if ($post['messages']) {
                $user_id = $post['user_id'];
                $user_send = $post['user_send'];
                $username = $post['username'];
                $username_send = $post['username_send'];
                $message = $post['messages'];
                $rooms = $post['rooms'];
                $img = $post['img'];
                $img_send = $post['img_send'];
                $auth = $post['auth'];
                $model->user_id = $post['user_id'];
                $model->user_send = $post['user_send'];
                $model->rooms = $post['rooms'];
                $model->messages = $post['messages'];
                $model->status = Messages::PENDING;
                $model->save(false);


                return Yii::$app->redis->executeCommand('PUBLISH', [
                    'channel' => 'notification',
                    'message' => Json::encode([
                        'username' => $username,
                        'message' => $message,
                        'user_id' => $user_id,
                        'user_send' => $user_send,
                        'username_send' => $username_send,
                        'rooms' => $rooms,
                        'img' => $img,
                        'img_send' => $img_send,
                        'auth' => $auth
                    ])
                ]);
            }
        }

        return false;
    }

    public function actionIndex()
    {
        $this->layout = 'login';
        $model = User::find()->all();
        return $this->render('index', ['model' => $model]);
    }

    public function actionLogin()
    {
        $this->layout = 'login';
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionBackpass()
    {
        $this->layout = 'login';

        $model = new BackpassForm();
        if ($model->load(Yii::$app->request->post())) {
            $user = new User();
            $userArray = $user->findOne(['email' => $model->email]);
            $result = "";
            $chars = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $charArray = str_split($chars);
            for ($i = 0; $i < 10; $i++) {
                $randItem = array_rand($charArray);
                $result .= "" . $charArray[$randItem];
            }
            $user->setPassword($result);
            if ($user->save(false)) {
                $link = '/emailtemplate' . DIRECTORY_SEPARATOR . 'user' . DIRECTORY_SEPARATOR . 'html';
                $senmail = \app\components\Mail\Mail::sendMail('xuansang0509@gmail.com', 'xuansang', $param = 0, $link);
            }
            return $this->goBack();
        } else {
            return $this->render('backpass', [
                'model' => $model,
            ]);
        }
    }


    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSignup()
    {
        $this->layout = 'login';
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }
        return $this->render('signup', [
            'model' => $model,
        ]);
    }
    public function actionAdd(){
        $user=new User();
        $user->id=5;
        $user->username='xuansang';
        $user->group=1;
        $user->email='xuansang0509@gmail.com';
        $user->password_hash = Yii::$app->security->generatePasswordHash('123456');
        $user->save(false);
    }


    public function onAuthSuccess($client)
    {
        $attributes = $client->getUserAttributes();
        //   print_r($attributes);die;
        /** @var Auth $auth */
        $auth = Auth::find()->where([
            'source' => $client->getId(),
            'source_id' => $attributes['id'],
        ])->one();

        if (Yii::$app->user->isGuest) {
            if ($auth) {
                $model = new User();
                $model->id = $auth->user_id;
                Yii::$app->user->login($model);
            } else { // signup
                if (isset($attributes['email']) && isset($attributes['username']) && User::find()->where(['email' => $attributes['email']])->exists()) {
                    Yii::$app->getSession()->setFlash('error', [
                        Yii::t('app', "User with the same email as in {client} account already exists but isn't linked to it. Login using email first to link it.", ['client' => $client->getTitle()]),
                    ]);
                } else {
                    $password = Yii::$app->security->generateRandomString(6);
                    $time = time();
                    Facebook::getPicture((string)$attributes['id'], $time);
                    UploadImage::CropImage('avatar' . '-' . $time . '.png', 'upload/avatar', $time);
                    $user = new User([
                        'username' => $attributes['name'],
                        'email' => $attributes['email'],
                        'password' => $password,
                        'password_repeat' => $password,
                        'type' => User::FACEBOOK,
                        'avatar' => 'avatar' . '-' . $time . '.png'
                    ]);
                    $user->generaAuthKey();
                    $user->generatePasswordResetToken();
                    $transaction = $user->getDb()->beginTransaction();

                    if ($user->save(FALSE)) {
                        $auth = new Auth([
                            'user_id' => $user->id,
                            'source' => $client->getId(),
                            'source_id' => (string)$attributes['id'],
                        ]);
                        if ($auth->save()) {
                            $transaction->commit();
                            Yii::$app->user->login($user);
                        } else {
                            print_r($auth->getErrors());
                        }
                    } else {
                        print_r($user->getErrors());
                    }
                }
            }
        } else { // user already logged in
            if (!$auth) { // add auth provider
                $auth = new Auth([
                    'user_id' => Yii::$app->user->id,
                    'source' => $client->getId(),
                    'source_id' => $attributes['id'],
                ]);
                $auth->save();
            }
        }
    }


}
