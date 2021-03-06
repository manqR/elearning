<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DtlcourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manajemen Soal';
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['//course/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="dtlcourse-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?=  $this->render('_search', ['model' => $searchModel]); ?>
    <hr/>

    <p>
        <?= Html::a('Tambah Soal', ['create','id'=>$_GET['id']], ['class' => 'btn btn-success']) ?>
        <?= ''//Html::a('Tambah Kategori Soal', ['//dtlcoursecategory/create','id'=>$_GET['id']], ['class' => 'btn btn-warning']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            [
                'label'=>'Kategori',
                'attribute'=>'categoryName',
                'value'=>'detail.dtlCatCourseName'
            ],  
            [
                'label'=>'Judul',                
                'attribute'=>'title',
            ],   
            [
                'label'=>'Deskripsi',
                'format' => 'raw',
                'attribute'=>'description',
                'value'=>function ($model) {
                    return $model->description;
                },
            ],
            [
                'label'=>'Jawaban Benar',
                'attribute'=>'correctAnswerAlias',
                'value'=>'correctAnswer0.alias'
            ],              
            'poin',
            //'hint:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
