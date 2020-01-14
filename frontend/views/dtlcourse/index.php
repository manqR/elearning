<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DtlcourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Course Detail';
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['//course/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="dtlcourse-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?=  $this->render('_search', ['model' => $searchModel]); ?>
    <hr/>

    <p>
        <?= Html::a('Add Course Detail', ['create','id'=>$_GET['id']], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Category Course Detail', ['//dtlcoursecategory/create','id'=>$_GET['id']], ['class' => 'btn btn-warning']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            [
                'label'=>'Category',
                'attribute'=>'categoryName',
                'value'=>'detail.dtlCatCourseName'
            ],  
            'title',
            'description:ntext',
            'correctAnswer',
            'poin',
            //'hint:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
