<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Users;
use frontend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\User;
/**
 * UserController implements the CRUD actions for User model.
 */

include 'asset/inc/auth.php';
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */

    public function beforeAction($action){                
        if(!getAuth()){
           return true; 
        }   
    }
    
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Users();

        if ($model->load(Yii::$app->request->post())){

            $model->password_hash =Yii::$app->security->generatePasswordHash($model->password_hash);
            $model->auth_key =Yii::$app->security->generateRandomString();
            $model->created_at = substr(date('Ymdhis'), 0, 10);
            $model->updated_at = substr(date('Ymdhis'), 0, 10);         
            if ($model->save()) {
                Yii::$app->session->setFlash('success', '<strong>Berhasil !</strong> Data Pengguna ditambahkan!');
                return $this->redirect(['index']);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }
    

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->getErrors();

    
        if ($model->load(Yii::$app->request->post())){

                $model->name = $_POST['User']['name'];
                $model->roleID = $_POST['User']['roleID'];
                $model->email = $_POST['User']['email'];
                $model->status = $_POST['User']['status'];

            if($_POST['User']['password_hash'] != $model->password_hash){
                $model->password_hash =Yii::$app->security->generatePasswordHash($_POST['User']['password_hash']);
                $model->auth_key =Yii::$app->security->generateRandomString();                
                $model->updated_at = substr(date('Ymdhis'), 0, 10);                     
            }            
          
            if ($model->save(false)) {
                Yii::$app->session->setFlash('success', '<strong>Sukses !</strong> Pengguna Berhasil di perbaharui !');
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
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
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
