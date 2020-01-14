<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TbloptionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbloptions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbloption-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tbloption', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'alias',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
