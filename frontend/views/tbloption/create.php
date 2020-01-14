<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tbloption */

$this->title = 'Create Tbloption';
$this->params['breadcrumbs'][] = ['label' => 'Tbloptions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbloption-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
