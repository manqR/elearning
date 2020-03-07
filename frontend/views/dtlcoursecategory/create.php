<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dtlcoursecategory */

$this->title = 'Tambah Kategori Soal';
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['//course/index']];
$this->params['breadcrumbs'][] = ['label' => 'Courses Detail', 'url' => ['//dtlcourse/index','id'=>$_GET['id']]];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="dtlcoursecategory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
