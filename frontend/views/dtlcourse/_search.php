<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Dtlcoursecategory;

/* @var $this yii\web\View */
/* @var $model frontend\models\DtlcourseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div  style="margin:15px">
    

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    
    <?= $form->field($model, 'detailID')-> dropDownList(
			ArrayHelper::map(Dtlcoursecategory::find()->all(),'detailID','dtlCatCourseName'),
			['prompt'=>'- Pilih -','style' => 'width: 100%;height: 33px;'])->label('Kategori Soal');  ?>	
    <?= Html::hiddenInput('id', $_GET['id']); ?>
    



    <div class="form-group">
        <?= Html::submitButton('Cari', ['class' => 'btn btn-primary']) ?>        
    </div>

    <?php ActiveForm::end(); ?>

</div>