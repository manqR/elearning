<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Dtlcourse;
use frontend\models\Dtlcourseopt;
use frontend\models\DtlcourseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DtlcourseController implements the CRUD actions for Dtlcourse model.
 */
include '../../asset/inc/auth.php';
class DtlcourseController extends Controller
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
     * Lists all Dtlcourse models.
     * @return mixed
     */
    public function beforeAction($action){
                
        if(!getAuth()){
           return true; 
        }                
    }
    public function actionIndex()
    {
        $searchModel = new DtlcourseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dtlcourse model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Dtlcourse model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Dtlcourse();

        if ($model->load(Yii::$app->request->post())){
            
            $model->poin = $model->poin > 0 ? $model->poin : 0;            
            $model->courseID = $id;                    
            $model->save(false);            

            $isCorrect = 0;
           for($i = 1 ; $i <= 5; $i++){
             if(isset($_POST['options'.$i])){
                $options = new Dtlcourseopt();
                $options->iddtlcourse = $model->iddetailcourse;
                $options->courseID = $id;
                $options->optID = $i;
                $options->optional = $_POST['options'.$i];
                $options->iscorrect = isset($_POST['answer'.$i]) ? 1 : 0;
                $options->save(false);                         
             }
                if(isset($_POST['answer'.$i]) ? 1 : 0 == 1){
                    $isCorrect = $i;
                }
           }           
           $lookUp = DtlCourse::findOne(['iddetailcourse'=>$model->iddetailcourse]);
           $lookUp->correctAnswer = $isCorrect;
           $lookUp->save(false);
           if($lookUp){
                Yii::$app->session->setFlash('success', '<strong>Successfully !</strong> Course Added !');
                return $this->redirect(['index','id'=>$id]);
            }               
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Dtlcourse model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $options = Dtlcourseopt::findAll(['iddtlcourse'=>$id]);

        
        if ($model->load(Yii::$app->request->post())){
            
            $model->save(false);
            $isCorrect = 0;
            if($model->detailID == 1 || $model->detailID == 3){
                foreach($options as $option):
                    $option->delete();
                endforeach;

                for($i = 1 ; $i <= 5; $i++){
                    if(isset($_POST['options'.$i])){
                        $options = new Dtlcourseopt();
                        $options->iddtlcourse = $model->iddetailcourse;
                        $options->courseID = $model->courseID;
                        $options->optID = $i;
                        $options->optional = $_POST['options'.$i];
                        $options->iscorrect = isset($_POST['answer'.$i]) ? 1 : 0;
                        $options->save(false);        
                    } 
                                     
                    
                    if(isset($_POST['answer'.$i]) ? 1 : 0 == 1){
                        $isCorrect = $i;
                    }
                }      
            }     
            $lookUp = DtlCourse::findOne(['iddetailcourse'=>$model->iddetailcourse]);
            $lookUp->correctAnswer = $isCorrect;
            $lookUp->save(false);
            if($lookUp){
                 Yii::$app->session->setFlash('success', '<strong>Successfully !</strong> Updated !');
                 return $this->redirect(['index','id'=>$model->courseID]);
             }       

            return $this->redirect(['view', 'id' => $model->iddetailcourse]);
        }

        return $this->render('update', [
            'model' => $model,
            'options' =>$options
        ]);
    }

    /**
     * Deletes an existing Dtlcourse model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = Dtlcourse::findOne(['iddetailcourse'=>$id]);
        $model->delete();

        Yii::$app->session->setFlash('success', '<strong>Successfully !</strong> Course Deleted !');        
        return $this->redirect(['index','id'=>$model->courseID]);
    }

    /**
     * Finds the Dtlcourse model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Dtlcourse the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dtlcourse::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
