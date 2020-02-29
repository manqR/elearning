<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use frontend\models\Course;
use frontend\models\Tbloption;
use frontend\models\ResultCourse;


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
");
?>
<h1>Riwayat Modul</h1>

<?php
    foreach($model as $models):
        $course = Course::findOne(['courseID'=>$models->courseID]);
?>
<div class="row" style="border-bottom: 1px solid #a9a9a933;">
       
    <h2><?= Html::encode($course->title) ?><span >
        <?= Html::a('<span class="btn btn-'.($models->score <= 50 ? 'warning':'success').'" style="font-size: 17px;">Your Score : '.$models->score.'</span>',['//site/detail','id'=>$course->courseID])?></span>
    </h2>    
    <div class="card card-block" style="border: none;border: none;align-items: center;margin: 40px;">        
        <img class="cover" src="../../asset/images/course/<?= $course->img ?>" />        
    </div>              
    
    <div class="card card-block"  style="margin: 10px 10px 10px 0px;border: none">
        <span ><?= $course->description ?>  </span>
    </div>
    <?php
        if($models->score >= 80){
            $showResult = Resultcourse::find()
                        ->joinWith('iddetailcourse0')
                        ->where(['courseID'=>$course->courseID])
                        ->Andwhere(['detailID'=>1])       
                        ->orderBy(['iddetailcourse'=>SORT_ASC])                 
                        ->all();  
                      
            foreach($showResult as $i => $showResults):
                if($showResults->answer == $showResults->iddetailcourse0->correctAnswer){
                    $i = $i +1;
                    $optList = Tbloption::findOne(['id'=>$showResults->answer]);
                    echo "<li class='btn btn-success'> Pertanyaan Nomor ". $i .". Jawaban Benar ".$optList->alias."</li>";
                }                
            endforeach;
            // die;
        }
    ?>
</div>
    <?php endforeach; ?>