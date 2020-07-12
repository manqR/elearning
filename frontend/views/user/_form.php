<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Role;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label("Nama Pengguna") ?>
    
    <?= $form->field($model, 'roleID')-> dropDownList(
			ArrayHelper::map(Role::find()->all(),'idrole','role_name'),
			['prompt'=>'- Pilih -','style' => 'width: 100%;height:40px'])->label('Peranan');  ?>		
    <?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true])->label('Password') ?>    
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')-> dropDownList(['10'=>'Aktif',9=>'Non-Aktif'],
			['prompt'=>'- Pilih -','style' => 'width: 100%;height:40px'])  ?>		  

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
