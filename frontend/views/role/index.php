<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RoleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Peranan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Peranan', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Menu Akses Peranan', ['menu'], ['class' => 'btn btn-warning']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],                        
            [
                'label'=>'Nama Peranan',                
                'attribute'=>'role_name',
            ],   
            [
                'label'=>'Status',                
                'format' => 'raw',
                'value'=>function ($model) {
                    return ($model->status == 1 ? '<span class="label label-success">Aktif</span>' : '<span class="label label-danger">Non-Aktif</span>');
                },
            ],            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
