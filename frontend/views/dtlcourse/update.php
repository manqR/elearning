<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dtlcourse */

$this->title = 'Update Dtlcourse: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Dtlcourses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->iddetailcourse]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dtlcourse-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
