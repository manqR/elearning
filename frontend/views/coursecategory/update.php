<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Coursecategory */

$this->title = 'Update Coursecategory: ' . $model->categoryID;
$this->params['breadcrumbs'][] = ['label' => 'Coursecategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->categoryID, 'url' => ['view', 'id' => $model->categoryID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="coursecategory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
