<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DtlcourseoptSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dtlcourseopts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dtlcourseopt-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Dtlcourseopt', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'iddtlcourse',
            'courseID',
            'optID',
            'optional',
            'iscorrect',
            //'urutan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
