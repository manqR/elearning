<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DtlcourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dtlcourses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dtlcourse-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Dtlcourse', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'iddetailcourse',
            'courseID',
            'detailID',
            'title',
            'description:ntext',
            //'correctAnswer',
            //'poin',
            //'hint:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
