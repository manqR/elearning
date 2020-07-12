<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Course */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$this->registerCss("
@media screen and (min-width: 600px) {
    .cover{
        max-width:70%
    }
    
}
@media screen and (max-width: 600px) {
    .cover{
        max-width:100%
    }
    h1{
        font-size:1.5rem;
    }
  }
");               
                    
$connection = \Yii::$app->db;
$sql = $connection->createCommand("SELECT  CASE WHEN `group` = 1 THEN 'Tes Formatif' 
                                    ELSE 'Latihan' END keterangan
                                    ,COUNT(DISTINCT x.dtlCatCourseName) jml
                                    ,`group`
                                    FROM dtlcoursecategory x JOIN (	  
                                    SELECT a.*
                                    FROM dtlcourse a 
                                    JOIN dtlcoursecategory b ON a.detailID = b.detailID 
                                    WHERE a.courseID = '".$model->courseID."'
                                    ) t    
                                    ON x.detailID = t.detailID     
                                    GROUP BY `group`");
                              
$mode = $sql->queryAll();  


$practice = 0;
$quiz = 0;            
foreach($mode as $modes):
 // echo $courses->courseID.'|'.$modes['group'].' - '.$modes['jml'];
 if($modes['group'] == 1){
   $quiz = $modes['jml'];
 }else{
   $practice = $modes['jml'];
 }
endforeach;


?>
<div class="course-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="card card-block" style="border: none;border: none;align-items: center;margin: 40px;">        
        <img class="cover" src="asset/images/course/<?= $model->img ?>" />
    </div>              
    
    <div class="card card-block"  style="margin: 10px 10px 10px 0px;border: none">
        <span ><?= $model->description ?>  </span>
    </div>
    <span class="ti-medall" style="font-size: 13px;font-weight: bold;float: right;margin-right: 10px;margin-top: 5px;"><?=  $practice ." Latihan" ?></span>
    <span class="ti-tag" style="font-size: 13px; font-weight: bold;float: right; margin-top: 5px; "><?= $quiz ." Tes Formatif " ?></span>
    
    <?= Html::a('<span class="btn btn-primary">Materi</span>',['materi','id'=>$model->courseID],['target'=>'_blank'])?>
    <?= Html::a('<span class="btn btn-success">Latihan 1</span>',['//mycourse/practice','courseID'=>$model->courseID,'userID'=>Yii::$app->user->identity->id,'type'=>2])?>
    <?= Html::a('<span class="btn btn-success">Latihan 2</span>',['//mycourse/practice','courseID'=>$model->courseID,'userID'=>Yii::$app->user->identity->id,'type'=>4])?>
    <?= Html::a('<span class="btn btn-warning">Tes Formatif 1</span>',['//mycourse/quiz','courseID'=>$model->courseID,'userID'=>Yii::$app->user->identity->id,'type'=>1])?>
    <?= Html::a('<span class="btn btn-warning">Tes Formatif 2</span>',['//mycourse/quiz','courseID'=>$model->courseID,'userID'=>Yii::$app->user->identity->id,'type'=>3])?>
    
</div>
