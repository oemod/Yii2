<?php

namespace app\modules\backend\controllers;

use app\modules\backend\controllers\Controllers;
use app\components\helpers\UploadImage;
use app\components\helpers\Thumbnail;
use app\models\BackpassForm;
use app\models\User;
use app\models\UserSearch;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\swiftmailer\Mailer;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use app\modules\backend\Backend;
use app\models\form\ChagePassword;
use app\components\helpers\LocationHelper;
use yii\web\Controller;
use app\components\helpers\Helper;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controllers
{
    public $userClassName;
    public $idField = 'id';
    public $usernameField = 'username';
    public $fullnameField;
    public $searchClass;
    public $extraColumns = [];
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    //'assign' => ['post'],
                    // 'allow' => true,
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
            'captcha' => [
                'class' => 'mdm\captcha\CaptchaAction',
                'level' => 1, // avaliable level are 1,2,3 :D
            ],
        ];
    }

    public function init()
    {
        parent::init();
        if ($this->userClassName === null) {
            $this->userClassName = Yii::$app->getUser()->identityClass;
            $this->userClassName = $this->userClassName ?: 'common\models\User';
        }
    }

    public function beforeAction($action)
    {
        return parent::beforeAction($action);
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAdmin()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->searchAdmin(Yii::$app->request->queryParams);
        return $this->render('index-admin', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView()
    {

        $model = $this->findModel(Yii::$app->user->id);
       // $avatar = $model['avatar'];
        $created_at = $model['created_at'];
        if ($model->load(Yii::$app->request->post())) {
            $model->password_hash = Yii::$app->security->generatePasswordHash($model->password_hash);
           /* $model->avatar = UploadedFile::getInstance($model, 'avatar');
            $file = 'upload/avatar';
            if (UploadImage::uploadImage($model->avatar, 'avatar', $file, $created_at)) {
                UploadImage::CropImage('avatar' . '-' . $created_at . '.' . $model->avatar->extension, 'upload/avatar', $created_at);
                $model->avatar = 'avatar' . '-' . $created_at . '.' . $model->avatar->extension;
            } else {
                $model->avatar = $avatar;
            }*/
            $location = LocationHelper::getLocationByAddress($model->address);
            $image_location = UploadImage::UploadImageLocation($location['lat'], $location['long'], $created_at);
            $model->address_image = $image_location;
            $model->latitude = $location['lat'];
            $model->longitude = $location['long'];
            $model->save(false);
            return $this->redirect(['view']);
        }
        return $this->render('view', [
            'model' => $model,
        ]);

    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->password_hash = Yii::$app->security->generatePasswordHash($model->password_hash);
           /* $model->avatar = UploadedFile::getInstance($model, 'avatar');
            $file = 'upload/avatar';
            if (UploadImage::uploadImage($model->avatar, 'avatar', $file, time())) {
                UploadImage::CropImage('avatar' . '-' . time() . '.' . $model->avatar->extension, 'upload/avatar', time());
                $model->avatar = 'avatar' . '-' . time() . '.' . $model->avatar->extension;
            } else {
                $date = $date = Yii::$app->formatter->asDate(time(), 'yyyy/MM/dd');
                $file = 'upload/avatar/' . $date;
                UploadImage::Noimage('avatar' . '-' . time() . '.png', $file);
                UploadImage::CropImage('avatar' . '-' . time() . '.png', 'upload/avatar', time());
                $model->avatar = 'avatar' . '-' . time() . '.png';
            }*/
           $location = LocationHelper::getLocationByAddress($model->address);
           // $image_location = UploadImage::UploadImageLocation($location['lat'], $location['long'], time());
           // $model->address_image = $image_location;
            $model->latitude = $location['lat'];
            $model->longitude = $location['long'];
            $model->role = User::STATUS_ACTIVE;
            $model->save(false);
            return $this->redirect(['admin', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);
      //  $avatar = $model['avatar'];
        $created_at = $model['created_at'];
        if ($model->load(Yii::$app->request->post())) {
          /*  $model->avatar = UploadedFile::getInstance($model, 'avatar');
            $file = 'upload/avatar';
            if (UploadImage::uploadImage($model->avatar, 'avatar', $file, $created_at)) {
                UploadImage::CropImage('avatar' . '-' . $created_at . '.' . $model->avatar->extension, 'upload/avatar', $created_at);
                $model->avatar = 'avatar' . '-' . $created_at . '.' . $model->avatar->extension;
            } else {
                $model->avatar = $avatar;
            }*/
            $location = LocationHelper::getLocationByAddress($model->address);
           // $image_location = UploadImage::UploadImageLocation($location['lat'], $location['long'], $created_at);
           // $model->address_image = $image_location;
            $model->latitude = $location['lat'];
            $model->longitude = $location['long'];
            $model->save(false);
            if ($model->group == User::GROUP) {
                return $this->redirect(['admin', 'id' => $model->id]);
            }
            return $this->redirect(['admin', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['admin']);
    }

    public function actionResetpass()
    {

        $model = $this->findModel(Yii::$app->user->id);
        if ($model->load(Yii::$app->request->post())) {
            $model->setPassword($model->password_hash);
            $model->save(false);
            return $this->redirect(['view']);
        } else {

            return $this->render('resetpass', [
                'model' => $model,
            ]);
        }
    }

    public function actionChagePassword($id = 0)
    {
        $model = new ChagePassword();
        if ($model->load(Yii::$app->request->post())) {
            print_r($_POST['user_id']);
            $user = $this->findModel($_POST['user_id']);
            $user->setPassword($model->password_hash);
            $user->save(false);
            return $this->redirect(['index']);
        }
        return $this->renderAjax('chage-password', ['model' => $model, 'user_id' => $id]);
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
            $userArray->setPassword($result);
            if ($userArray->save(false)) {
                $link = '/emailtemplate' . DIRECTORY_SEPARATOR . 'user' . DIRECTORY_SEPARATOR . 'html';
                $senmail = \app\components\Mail\Mail::sendMail($model->email, 'Mật Khẩu', $param = $result, $link);
            }
            return $this->goBack();
        } else {
            return $this->render('backpass', [
                'model' => $model,
            ]);
        }
    }


    public function actionAssignment($id)
    {
        $model = $this->findModel($id);

        return $this->render('assignment', [
            'model' => $model,
            'idField' => $this->idField,
            'usernameField' => $this->usernameField,
            'fullnameField' => $this->fullnameField,
            'items' => $this->getItems($id),
        ]);
    }

    protected function getItems($id)
    {
        $manager = Yii::$app->getAuthManager();
        $avaliable = [];
        foreach (array_keys($manager->getRoles()) as $name) {
            $avaliable[$name] = 'role';
        }

        foreach (array_keys($manager->getPermissions()) as $name) {
            if ($name[0] != '/') {
                $avaliable[$name] = 'permission';
            }
        }

        $assigned = [];
        foreach ($manager->getAssignments($id) as $item) {
            $assigned[$item->roleName] = $avaliable[$item->roleName];
            unset($avaliable[$item->roleName]);
        }

        return [
            'avaliable' => $avaliable,
            'assigned' => $assigned
        ];
    }

    public function actionAssign($id)
    {
        $post = Yii::$app->getRequest()->post();
        $action = $post['action'];
        $roles = $post['roles'];
        $manager = Yii::$app->getAuthManager();
        $error = [];
        if ($action == 'assign') {
            foreach ($roles as $name) {
                try {
                    $item = $manager->getRole($name);
                    $item = $item ?: $manager->getPermission($name);
                    $manager->assign($item, $id);
                } catch (\Exception $exc) {
                    $error[] = $exc->getMessage();
                }
            }
        } else {
            foreach ($roles as $name) {
                try {
                    $item = $manager->getRole($name);
                    $item = $item ?: $manager->getPermission($name);
                    $manager->revoke($item, $id);
                } catch (\Exception $exc) {
                    $error[] = $exc->getMessage();
                }
            }
        }
       // Helper::invalidate();
        Yii::$app->response->format = 'json';
        return array_merge($this->getItems($id), ['errors' => $error]);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



}
