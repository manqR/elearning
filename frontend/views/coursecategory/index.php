<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CoursecategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Coursecategories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coursecategory-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Coursecategory', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'categoryID',
            'categoryName',
            'flag',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
