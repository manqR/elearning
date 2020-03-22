<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use frontend\models\Course;
use frontend\models\Tbloption;
use frontend\models\Resultcourse;

$this->title='Riwayat Modul';


$this->registerCss("
@media screen and (min-width: 600px) {
    .cover{
        max-width:70%
    }
    
}
@media screen and (max-width: 600px) {
    .cover{
        max-width:100%
    }
    h2{
        font-size:1rem;
    }
  
  }
  .name{
    font-family: inherit;
    font-size: 18px;
    font-weight: bold;
}
");
?>

<div class="row" style="border-bottom: 1px solid #a9a9a933;">
       
    <h2><?= Html::encode($model['title']) ?><span >
        <?= Html::a('<span class="btn btn-'.($model['score'] <= 50 ? 'warning':'success').'" style="font-size: 17px;">Nilai Anda : '.$model['score'].'</span>',['//site/detail','id'=>$model['courseID']])?></span>
    </h2> 
    <p class="name">Nama : <?= Yii::$app->user->identity->name; ?></p>   
    <div class="card card-block" style="border: none;border: none;align-items: center;margin: 40px;">        
        <img class="cover" src="../../asset/images/course/<?= $model['img'] ?>" />        
    </div>              
    
    <div class="card card-block"  style="margin: 10px 10px 10px 0px;border: none">
        <span ><?= $model['description'] ?>  </span>
    </div>
    <?php
        if($model['score'] >= 80){
            $showResult = Resultcourse::find()
                        ->joinWith('iddetailcourse0')
                        ->where(['courseID'=>$model['courseID']])
                        ->Andwhere(['detailID'=>$model['detailID']])       
                        ->orderBy(['iddetailcourse'=>SORT_ASC])                 
                        ->all();  
            echo "<div style='margin:15px;display:block'>";      
            foreach($showResult as $i => $showResults):
                if($showResults->answer == $showResults->iddetailcourse0->correctAnswer){
                    $i = $i +1;
                    $optList = Tbloption::findOne(['id'=>$showResults->answer]);
                    echo "<li class='text-success'> Pertanyaan Nomor ". $i .". Jawaban Benar ".$optList->alias."</li>";
                }                
            endforeach;
            echo "</div>";
            // die;
        }
    ?>
</div>
