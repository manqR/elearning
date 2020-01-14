<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dtlcourse */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Dtlcourses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="dtlcourse-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->iddetailcourse], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->iddetailcourse], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'iddetailcourse',
            'courseID',
            'detailID',
            'title',
            'description:ntext',
            'correctAnswer',
            'poin',
            'hint:ntext',
        ],
    ]) ?>

</div>
