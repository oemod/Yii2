<?php

namespace app\modules\backend\controllers;

use app\components\helpers\HelperLink;
use app\components\helpers\HelperRobots;
use app\components\helpers\Sitemaps;
use app\models\Author;
use app\models\Category;
use app\models\NewsAuthor;
use app\models\NewsCategory;
use app\models\NewsUpdate;
use app\models\NewTag;
use app\models\Tags;
use app\models\WpPostmeta;
use Yii;
use app\models\News;
use app\models\NewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\components\helpers\UploadImage;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
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
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTest()
    {
        HelperRobots::deleteRobots('/bai-viet-benh-viem-gan-sieu-vi-b-la-gi-277.html');
        die;
    }

    /**
     * Displays a single News model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionEdit()
    {

        //    print_r(strtotime('2014-03-18 08:25:31'));die;
        /* $news=News::find()->where(['>','id',3000])->limit(200)->all();
         foreach($news as $key=>$value){
             $model=News::find()->where(['id'=>$value->id])->one();
             $model->created_at=strtotime($value->post_date);
             $model->updated_at=strtotime($value->post_date);
             $model->save(false);
         }*/
        $post = WpPostmeta::find()
            ->innerJoin('news', '`wp_postmeta`.`post_id` = `news`.`id`')
            ->where(['wp_postmeta.meta_key' => '_yoast_wpseo_metakeywords'])->asArray()->all();


        foreach ($post as $key => $value) {
            $model = News::find()->where(['id' => $value['post_id']])->one();
            $model->meta_keyword = $value['meta_value'];

            $model->save(false);
        }

    }


    /**
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new News();
        if ($model->load(Yii::$app->request->post())) {
            $model->image = UploadedFile::getInstance($model, 'image');
            $model->image = UploadImage::uploadImage($model->image, 'image', 'upload/news', time());
            $model->post_author = Yii::$app->user->identity->id;
            $sitemap = HelperLink::rewriteNews($model->post_title);
            $model->post_name = HelperLink::rewriteSulg($model->post_title);
            if ($model->save(false)) {
                $category = Yii::$app->request->post();
                foreach ($category['News']['category'] as $value) {
                    $newCategory = new NewsCategory();
                    $newCategory->category_id = $value;
                    $newCategory->news_id = $model->id;
                    $newCategory->save(false);

                }
            }
            try {
                Sitemaps::createdSitemapNews($sitemap, '0.6');
//                die;
            } catch (Exception $e) {
                throw new CHttpException(400, Yii::t('app', 'Error Sitemap update'));
            }
            Yii::$app->cache->flush();
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            $category = Category::find()->where(['!=', 'type', 'link_category'])->andWhere(['!=', 'type', 'nav_menu'])->asArray()->all();
            $newCategory = new NewsCategory();

            $author = Author::find()->asArray()->all();
            $newAuthor = new NewsAuthor();
            return $this->render('create', [
                'model' => $model,
                'category' => $category,
                'newCategory' => $newCategory,
            ]);
        }
    }

    public function actionSitemaps()
    {
        $news = News::find()->all();
        //print_r($news); die;
        foreach ($news as $key => $value) {
            try {
                Sitemaps::createdSitemapNews('/' . $value->post_name . '.html', '0.6');
            } catch (Exception $e) {
                throw new CHttpException(400, Yii::t('app', 'Error Sitemap update'));
            }
        }
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $image = $model['image'];
        if ($model->load(Yii::$app->request->post())) {
            $model->image = UploadedFile::getInstance($model, 'image');
            if ($model->image):
                $model->image = UploadImage::uploadImage($model->image, 'image', 'upload/news', $model->created_at);
            else:
                $model->image = $image;
            endif;
            if ($model->save(false)) {
                \Yii::$app->db->createCommand()->delete('news_category', ['news_id' => $id])->execute();
                $newscategory = Yii::$app->request->post();
                foreach ($newscategory['NewsUpdate']['category'] as $value) {
                    if (is_numeric($value)) {
                        $newCategory = new NewsCategory();
                        $newCategory->category_id = $value;
                        $newCategory->news_id = $model->id;
                        $newCategory->save(false);
                    }
                }

            }
            Yii::$app->cache->flush();

            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            $category = Category::find()->where(['!=', 'type', 'link_category'])->andWhere(['!=', 'type', 'nav_menu'])->asArray()->all();
            $newCategory = NewsCategory::find()->where(['news_id' => $id])->all();
            $Arr = array();
            foreach ($newCategory as $value) {
                $Arr[$value->category_id] = $value->category_id;
            }
            $author = Author::find()->asArray()->all();
            $newAuthor = NewsAuthor::find()->where(['id_news' => $id])->all();
            $Au = array();
            foreach ($newAuthor as $value) {
                $Au[$value->id_author] = $value->id_author;
            }

            return $this->render('update', [
                'model' => $model,
                'category' => $category,
                'newCategory' => $Arr,
            ]);
        }
    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();
        Yii::$app->cache->flush();
        try {
            // HelperRobots::deleteRobots(HelperLink::rewriteUrl($model->id, $model->title, Yii::$app->params['url']['detail']));

            Sitemaps::deleteUrlSitemap($model->post_name, '0.6');
        } catch (Exception $e) {
            throw new CHttpException(400, Yii::t('app', 'Error Sitemap update'));
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NewsUpdate::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
