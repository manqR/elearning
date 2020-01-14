<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\DtlcourseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dtlcourse-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'detailID') ?>
    <?= Html::hiddenInput('id', $_GET['id']); ?>
    



    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>        
    </div>

    <?php ActiveForm::end(); ?>

</div>
