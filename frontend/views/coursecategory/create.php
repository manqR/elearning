<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Coursecategory */

$this->title = 'Add Category';
$this->params['breadcrumbs'][] = ['label' => 'Coursecategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coursecategory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
