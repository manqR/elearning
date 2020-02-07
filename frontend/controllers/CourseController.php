<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Course;
use frontend\models\CourseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;

/**
 * CourseController implements the CRUD actions for Course model.
 */
include '../../asset/inc/auth.php';
class CourseController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Course models.
     * @return mixed
     */
    public function beforeAction($action){
                
        if(!getAuth()){
           return true; 
        }                
    }
    public function actionIndex()
    {
        $searchModel = new CourseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Course model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDetail($id)
    {
        return $this->render('detail', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Course model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Course();

        if ($model->load(Yii::$app->request->post())){
            $model->img = UploadedFile::getInstance($model, 'img');
            $model->materi = UploadedFile::getInstance($model, 'materi');
            if ($model->img || $model->materi){
                

                $model->img->saveAs('../../asset/images/course/' .sha1($model->img). '.' . $model->img->extension);
                $model->img =  sha1($model->img). '.' . $model->img->extension; 

                $model->materi->saveAs('../../asset/materi/' .sha1($model->materi). '.' . $model->materi->extension);
                $model->materi = sha1($model->materi). '.' . $model->materi->extension; 
                
                $model->create_date = date('Y-m-d H:i:s');
                $model->save();
                if($model){
                    Yii::$app->session->setFlash('success', '<strong>Successfully !</strong> Course Added !');
                    return $this->redirect(['index']);
                }  
            }          
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Course model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post())){
            $model->materi = UploadedFile::getInstance($model, 'materi');
            $model->img = UploadedFile::getInstance($model, 'img');

            if (isset($model->img)){                                
                $model->img->saveAs('../../asset/images/course/' .sha1($model->img). '.' . $model->img->extension);
                $model->img =  sha1($model->img). '.' . $model->img->extension;                                
            }   
            
            if(isset($model->materi)){
                $model->materi->saveAs('../../asset/materi/' .sha1($model->materi). '.' . $model->materi->extension);
                $model->materi = sha1($model->materi). '.' . $model->materi->extension; 
                
            }
            $model->create_date = date('Y-m-d H:i:s');
            $model->save();
            if($model){
                Yii::$app->session->setFlash('success', '<strong>Successfully !</strong> Course Added !');
                return $this->redirect(['index']);
            }  

        //     var_dump($model->materi);
        // die;
            // $model->save();
            // return $this->redirect(['view', 'id' => $model->courseID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Course model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Course model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Course the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Course::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
