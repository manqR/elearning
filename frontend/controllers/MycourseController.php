<?php

namespace frontend\controllers;

include '../../asset/inc/auth.php';
class MycourseController extends \yii\web\Controller
{
    public function beforeAction($action){
                
        if(!getAuth()){
           return true; 
        }                
    }
    public function actionIndex()
    {
        return $this->render('index');
    }

}
