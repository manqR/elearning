<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Course';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add Course', ['create'], ['class' => 'btn btn-success']) ?>
    
        <?= Html::a('Add Course Category', ['//coursecategory/create'], ['class' => 'btn btn-warning']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            [
                'label'=>'Category',
                'attribute'=>'categoryName',
                'value'=>'category.categoryName'
            ],  
            'title',
            'description:ntext',
            [
                'label'=>'Action',
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
