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
    img{
        max-width:70%
    }
    
}
@media screen and (max-width: 600px) {
    img{
        max-width:100%
    }
    h1{
        font-size:1.5rem;
    }
  }
");

$connection = \Yii::$app->db;
$sql = $connection->createCommand("SELECT COUNT(*) jml, b.dtlCatCourseName catName
                                   FROM dtlcourse a 
                                   JOIN dtlcoursecategory b ON a.detailID = b.detailID 
                                   WHERE a.courseID = '".$model->courseID."'
                                   GROUP BY a.courseID, b.dtlCatCourseName");
                              
$mode = $sql->queryOne();  

?>
<div class="course-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="card card-block" style="border: none;border: none;align-items: center;margin: 40px;">        
        <img src="../../asset/images/course/<?= $model->img ?>" />
    </div>              
    
    <div class="card card-block"  style="margin: 10px 10px 10px 0px;border: none">
        <span ><?= $model->description ?>  </span>
    </div>
    <span class="ti-tag" style="font-size: 13px; font-weight: bold;float: right; margin-top: 5px; "><?= (isset($mode['jml']) && $mode['catName'] == "Quiz" ? $mode['jml']. " Quiz" : "0 Quiz") ?></span>
    <span class="ti-medall" style="font-size: 13px;font-weight: bold;float: right;margin-right: 10px;margin-top: 5px;"><?= (isset($mode['jml']) && $mode['catName'] == "Practice" ? $mode['jml']. " Practice" : "0 Practice") ?></span>
    <button class="btn btn-success">Practice</button>
    <button class="btn btn-warning">Quiz</button>
    <?= Html::a('<span class="btn btn-primary">Materi</span>',['materi','id'=>$model->courseID])?>
</div>
