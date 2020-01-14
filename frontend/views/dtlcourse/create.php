<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dtlcourse */

$this->title = 'Create Dtlcourse';
$this->params['breadcrumbs'][] = ['label' => 'Dtlcourses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dtlcourse-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
