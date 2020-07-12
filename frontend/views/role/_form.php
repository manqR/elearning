<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Role */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="role-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'role_name')->textInput(['maxlength' => true])->label("Nama Peranan") ?>
    
    <?= $form->field($model, 'status')-> dropDownList(['1'=>'Enabled',2=>'Disabled'],
			['prompt'=>'- Pilih -','style' => 'width: 100%;height:40px'])  ?>		


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
