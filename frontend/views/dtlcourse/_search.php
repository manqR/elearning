<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\DtlcourseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dtlcourse-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'iddetailcourse') ?>

    <?= $form->field($model, 'courseID') ?>

    <?= $form->field($model, 'detailID') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'correctAnswer') ?>

    <?php // echo $form->field($model, 'poin') ?>

    <?php // echo $form->field($model, 'hint') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
