<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manajemen Modul';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Modul', ['create'], ['class' => 'btn btn-success']) ?>
    
        <?= Html::a('Tambah Mata kuliah', ['//coursecategory/create'], ['class' => 'btn btn-warning']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            [
                'label'=>'Kategori',
                'attribute'=>'categoryName',
                'value'=>'category.categoryName'
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
                'label'=>'Aksi',
                'format' => 'raw',
                'value'=>function ($model) {
                    return Html::a('<i class="mdi mdi-eye"></i>',['//dtlcourse/index','id'=>$model->courseID]);
                },
            ],

            // 'img',
            //'materi',
            //'author',
            //'create_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
