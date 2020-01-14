<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dtlcourse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dtlcourse-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'courseID')->textInput() ?>

    <?= $form->field($model, 'detailID')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'correctAnswer')->textInput() ?>

    <?= $form->field($model, 'poin')->textInput() ?>

    <?= $form->field($model, 'hint')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
