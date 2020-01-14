<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dtlcourse */

$this->title = 'Create Course Detail';
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['//course/index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail Course', 'url' => ['index','id'=>$_GET['id']]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dtlcourse-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
