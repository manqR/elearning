<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\DtlcourseoptSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dtlcourseopt-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'iddtlcourse') ?>

    <?= $form->field($model, 'courseID') ?>

    <?= $form->field($model, 'optID') ?>

    <?= $form->field($model, 'optional') ?>

    <?= $form->field($model, 'iscorrect') ?>

    <?php // echo $form->field($model, 'urutan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
