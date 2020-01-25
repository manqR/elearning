<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\models\Role;

if (!Yii::$app->user->isGuest) {
    $role = Role::find()
    ->where(['idrole'=>Yii::$app->user->identity->roleID])
    ->One();
}


if (Yii::$app->controller->action->id === 'login'){ 

    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {

    AppAsset::register($this);
    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@web/frontend/layout');
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
        <head>
            <meta charset="<?= Yii::$app->charset ?>">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <?php $this->registerCsrfMetaTags() ?>
            <title><?= Html::encode($this->title) ?></title>
            <?php $this->head() ?>
        </head>
        <body>
            <?php $this->beginBody() ?>

            <!-- Begin page -->
            <div id="wrapper">
                <?= $this->render(
                    'header.php',
                    ['directoryAsset' => $directoryAsset]) 
                ?>
                <?= $this->render(
                    'left.php',
                    ['directoryAsset' => $directoryAsset]) 
                ?>               

                <div class="content-page">                  
                    <div class="content">
                        <div class="container-fluid">
                            <?= Breadcrumbs::widget([
                                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                            ]) ?>
                            <?= Alert::widget() ?>
                            <?= $content ?>
                        </div>
                        <div class="footer">
                            <div class="pull-right hide-phone">
                                Project Completed <strong class="text-custom">57%</strong>.
                            </div>
                            <div>
                                <strong>Simple Admin</strong> - Copyright © 2017 - 2018
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>

            <?php $this->endBody() ?>
        </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>