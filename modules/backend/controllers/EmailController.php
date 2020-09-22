<?php

namespace app\modules\backend\controllers;

use app\models\Template;
use Yii;
use app\models\Email;
use app\models\EmailSearch;
use yii\base\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmailController implements the CRUD actions for Email model.
 */
class EmailController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Email models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSend(){
       $teamplate=Template::find()->all();
        return $this->render('send', [
            'teamplate' => $teamplate,

        ]);
    }
    public function actionSendEmail($id){
        $teamplate=Template::find()->one();
        $email=Email::find()->all();
        foreach($email as $key=>$value){
            $link = '/emailtemplate' . DIRECTORY_SEPARATOR . 'user' . DIRECTORY_SEPARATOR . 'html';
           \app\components\Mail\Mail::sendMail($value->email, $teamplate->title, $param = $teamplate, $link);

        }
        return $this->goBack();
    }


    /**
     * Displays a single Email model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Email model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Email();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Email model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Email model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Email model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Email the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Email::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionImport()
    {
        $input='upload/a.xls';
        try{
            $identify = \PHPExcel_IOFactory::identify($input);
            $objReader = \PHPExcel_IOFactory::createReader($identify);
            $objPHPExcel = $objReader->load($input);
            $objWorksheet = $objPHPExcel->getActiveSheet();
        }catch (Exception $e){
            die("ERROR");
        }
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        $highestColumnIndex = \PHPExcel_Cell::columnIndexFromString($highestColumn);
        $rows = array();
        for ($col = 0; $col <= $highestColumnIndex; $col++) {
            for ($row = 1; $row <= $highestRow; $row++) {
                if (strtolower($objWorksheet->getCellByColumnAndRow($col, 1)->getValue())) {
                    $email = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
                    $rows[$row][] = $email;
                }
            }
        }

       echo '<pre>'; print_r($rows);die;
    }

}
