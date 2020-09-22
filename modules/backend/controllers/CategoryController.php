<?php

namespace app\modules\backend\controllers;
use app\components\helpers\HelperLink;
use app\components\helpers\HelperRobots;

use Yii;
use app\models\Category;
use app\models\CategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTerm()
    {

        $tag = Category::find()
            ->where(['>', 'category.id', '0'])->andWhere(['type' => 'category'])->limit(100)
            ->asArray()->all();
        $cate = Category::find()
            ->asArray()->all();

        $data = array();
        foreach ($cate as $key => $value) {
            $data[$value['id']] = $value['slug'];
        }

        //echo '<pre>';   print_r($tag);die;
        foreach ($tag as $key => $value) {

            $model = Category::find()->where(['id' => $value['id']])->one();
            if ($model->parent_id == 0) {
                $model->link = $value['slug'];
                echo $model->link;
          //      die;
            } else {
                $model->link = $data[$value['parent_id']] . '/' . $value['slug'];
            }
        //    print_r($model);
            $model->save(false);


        }

    }


    /**
     * Displays a single Category model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Category();

        if ($model->load(Yii::$app->request->post()) ) {
                $category=Category::find()->where(['id'=>$model->parent_id])->one();
                if($category){
                    $model->link=HelperLink::rewriteUrlNews($model->name,$category->name);
                }else{
                    $model->link=HelperLink::rewriteUrlCategory($model->name);
                }
            $model->type= 'category';
            $model->save(false);
            
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
            $category=Category::find()->where(['id'=>$model->parent_id])->one();
                if($category){
                    $model->link=HelperLink::rewriteUrlNews($model->name,$category->name);
                }else{
                    $model->link=HelperLink::rewriteUrlCategory($model->name);
                }
            $model->save(false);
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
