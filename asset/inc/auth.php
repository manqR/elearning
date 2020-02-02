<?php
use frontend\models\RolePrivillage;
use yii\web\NotFoundHttpException;

function getAuth(){
    $role = Yii::$app->user->identity->roleID;
    $privillage = RolePrivillage::findAll(['idrole'=>$role]);

    foreach($privillage as $privillages):
        $menuName = str_replace(' ','',$privillages->menu_name);
        $menuName = strtolower($menuName);
        if($menuName = Yii::$app->controller->id && $privillages->flag == 0){
            throw new NotFoundHttpException('The requested page does not exist.');         
        } else{
            // throw new NotFoundHttpException('The requested page does not exist.');         
        }       
    endforeach;
    

}
    
?>