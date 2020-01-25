
<?php
use yii\web\View;
use frontend\assets\AppAsset;
use yii\helpers\Html;



AppAsset::register($this);
?>
<?php $this->beginPage() ?>

	<!DOCTYPE html>
	<html lang="<?= Yii::$app->language ?>">
		<head>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="Financial Application Institute Budi Utomo">
            <meta name="author" content="Institut Budi Utomo">
	
			<?= Html::csrfMetaTags() ?>
			<title><?= $this->title ?></title>
			<?php $this->head() ?>
		</head>

        <body>
			<?php $this->beginBody() ?>			
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="wrapper-page">                                    
						        <?= $content ?>				
                            </div>
                        </div>
                    </div>
                </div>
            </section>
						
					
			<?php $this->endBody() ?>
			
		</body>
	</html>
<?php $this->endPage() ?>

