<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Role;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Profil';
?>

<h1><?= $this->title; ?></h1>


<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Nama') ?>
    
    <?= ''//$form->field($model, 'roleID')-> dropDownList(
		//	ArrayHelper::map(Role::find()->all(),'idrole','role_name'),
		//	['prompt'=>'- Choose -','style' => 'width: 100%;height:40px'])->label('Role');  ?>		

    <?php
        if($model->isNewRecord){      
        
    ?>
    <?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true])->label('Password') ?>
    <?php } ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= '' //$form->field($model, 'status')-> dropDownList(['10'=>'Enabled',9=>'Disabled'],
		//	['prompt'=>'- Pilih -','style' => 'width: 100%;height:40px'])  ?>		  

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>