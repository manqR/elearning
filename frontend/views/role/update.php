<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Role */

$this->title = 'Perbaharui Peranan: ' . $model->role_name;
$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idrole, 'url' => ['view', 'id' => $model->idrole]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="role-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
