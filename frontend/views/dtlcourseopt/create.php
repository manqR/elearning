<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dtlcourseopt */

$this->title = 'Create Dtlcourseopt';
$this->params['breadcrumbs'][] = ['label' => 'Dtlcourseopts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dtlcourseopt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
