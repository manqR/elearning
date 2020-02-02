<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Coursecategory;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model frontend\models\Course */
/* @var $form yii\widgets\ActiveForm */


$this->registerJs("
$(document).ready(function() {    
    $('.summernote').summernote({
        height: 350,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: false                 // set focus to editable area after initializing summernote
    });
});
");
?>

<div class="course-form">

    <?php $form = ActiveForm::begin(); ?>
    
   		
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categoryID')-> dropDownList(
			ArrayHelper::map(Coursecategory::find()->all(),'categoryID','categoryName'),
			['prompt'=>'- Pilih -','style' => 'width: 100%;height:40px'])->label('Course Category');  ?>		

    <?= $form->field($model, 'description')->textarea(['rows' => 6,'class'=>'summernote']) ?>

    <?= $form->field($model, 'img')->fileInput(['class'=>'form-control'])->label('Image Covered') ?>

    <?= $form->field($model, 'materi')->fileInput(['class'=>'form-control']) ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true,'value'=>Yii::$app->user->identity->username]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
