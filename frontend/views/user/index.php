<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\Role;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengguna';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Pengguna', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'username',            
            [
                'label'=>'Nama',                
                'attribute'=>'name',
            ],   
            
            [
                'label'=>"Peranan",                
                'format' => 'raw',
                'value'=>function ($model) {
                    $role = Role::findOne(['idrole'=>$model->roleID]);
                    return $role->role_name;
                },
            ],                                          
            [
                'label'=>'Status',                
                'format' => 'raw',
                'value'=>function ($model) {
                    return ($model->status == 10 ? '<span class="label label-success">Aktif</span>' : '<span class="label label-danger">Non-Aktif</span>');
                },
            ],      
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
