<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dtlcourseopt */

$this->title = 'Update Dtlcourseopt: ' . $model->urutan;
$this->params['breadcrumbs'][] = ['label' => 'Dtlcourseopts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->urutan, 'url' => ['view', 'id' => $model->urutan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dtlcourseopt-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
