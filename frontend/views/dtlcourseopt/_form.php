<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dtlcourseopt */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dtlcourseopt-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'iddtlcourse')->textInput() ?>

    <?= $form->field($model, 'courseID')->textInput() ?>

    <?= $form->field($model, 'optID')->textInput() ?>

    <?= $form->field($model, 'optional')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'iscorrect')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
