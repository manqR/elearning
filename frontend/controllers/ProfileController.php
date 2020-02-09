<?php

namespace frontend\controllers;
use Yii;
use frontend\models\Users;

include '../../asset/inc/auth.php';
class ProfileController extends \yii\web\Controller
{
    public function beforeAction($action){
                
        if(!getAuth()){
           return true; 
        }                
    }
    public function actionIndex()
    {
        $model = Users::findOne(['id'=>Yii::$app->user->identity->id]);     
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', '<strong>Finished !</strong> Profile Changes !');
            return $this->redirect(['index']);
        }

        return $this->render('index',[
            'model'=>$model
        ]);
    }

}
