<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dtlcoursecategory */

$this->title = 'Update Dtlcoursecategory: ' . $model->detailID;
$this->params['breadcrumbs'][] = ['label' => 'Dtlcoursecategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->detailID, 'url' => ['view', 'id' => $model->detailID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dtlcoursecategory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
