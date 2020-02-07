<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Course */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="course-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="card card-block" style="border: none;">
        <img src="../../asset/images/course/<?= $model->img ?>" style="max-width: 70%;"/>
        <button class="btn btn-success" style="top: 230px;position: absolute;right: 85px;">Get this Course !</button>
    </div>
    <div class="card card-block"  style="margin: 10px 10px 10px 0px;border: none">
        <span ><?= $model->description ?>  </span>
    </div>

    <?= ''
        //DetailView::widget([
        //    'model' => $model,
        //    'attributes' => [
        //        'courseID',
        //        'categoryID',
        //        'title',
        //        'description:ntext',
        //        'img',
        //        'materi',
        //        'author',
        //        'create_date',
        //    ],
        //]) 
    ?>

</div>
