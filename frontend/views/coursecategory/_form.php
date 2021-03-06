<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Coursecategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coursecategory-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'categoryName')->textInput(['maxlength' => true])->label('Nama Matakuliah') ?>
    
    <?= $form->field($model, 'flag')->dropDownList(['1' => 'Enable', '0' => 'Disable'],['style'=>'height:40px'])->label('Status'); ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
