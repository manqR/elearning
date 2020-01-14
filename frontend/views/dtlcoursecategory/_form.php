<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dtlcoursecategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dtlcoursecategory-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dtlCatCourseName')->textInput(['maxlength' => true])->label('Name') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
