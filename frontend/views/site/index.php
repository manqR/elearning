<?php
use frontend\models\Course;
/* @var $this yii\web\View */

$this->title = 'Elearning';

$this->registerCss("
.main {
    font-family:Arial;
    width:90%;
    display:block;
    margin:0 auto;
  }
  h3 {      
      color: #FFF;
      font-size: 24px;      
      margin: 8%;
      padding: 2%;
      position: relative;
      text-align: center;
      border-radius:5px;
  }
  .action{
    display:block;
    margin:100px auto;
    width:100%;
    text-align:center;
  }
  .action a {
    display:inline-block;
    padding:5px 10px; 
    background:#f30;
    color:#fff;
    text-decoration:none;
  }
  .action a:hover{
    background:#000;
  }
  a{
    color:#7c7d7d;
  }
  a:hover{
    color:#000;
  }
  .textBox{
    padding-left:13px;
    width: 280px;
    padding-right:13px;
  }
   @media screen and (max-width: 600px) {
     .box{
       margin-right:260px;
     }
     .slick-track{
      display: flex;
    }
     
 
   }
  
  
 }
");

$this->registerJs("
$('.slider-nav').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: true,
    focusOnSelect: true
  });
 
  $('a[data-slide]').click(function(e) {
    e.preventDefault();
    var slideno = $(this).data('slide');
    $('.slider-nav').slick('slickGoTo', slideno - 1);
  });

  $('.box').removeStyle('width');
");
?>

<?php
    foreach($model as $models):
?>

<div class="row">
    <div class="col-sm-12">
        <h4 class="header-title m-t-0 m-b-20"><?= $models->categoryName ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box widget-inline">
            <div class="main">
                <div class="slider slider-nav" style="width:100%">
                    <?php
                        $course = Course::findAll(['categoryID'=>$models->categoryID]);
                        foreach($course as $courses):

                          $connection = \Yii::$app->db;
                          $sql = $connection->createCommand("SELECT  CASE WHEN `group` = 1 THEN 'Tes Formatif' 
                                                                      ELSE 'Latihan' END keterangan
                                                                    ,COUNT(DISTINCT x.dtlCatCourseName) jml
                                                                    ,`group`
                                                              FROM dtlcoursecategory x JOIN (	  
                                                              SELECT a.*
                                                              FROM dtlcourse a 
                                                              JOIN dtlcoursecategory b ON a.detailID = b.detailID 
                                                              WHERE a.courseID = '".$courses->courseID."'
                                                              ) t    
                                                              ON x.detailID = t.detailID     
                                                              GROUP BY `group`");
                                                        
                          $mode = $sql->queryAll();  
                          
                         $practice = 0;
                         $quiz = 0;            
                        foreach($mode as $modes):
                          // echo $courses->courseID.'|'.$modes['group'].' - '.$modes['jml'];
                          if($modes['group'] == 1){
                            $quiz = $modes['jml'];
                          }else{
                            $practice = $modes['jml'];
                          }
                        endforeach;

                  
                          
                    ?>
                      <a  class="box" href="?r=site/detail&id=<?= $courses->courseID ?>">
                      <div>
                        <h3 style="background-image: url('asset/images/course/<?= $courses->img ?>');width: 258px;height: 198px;background-size: 258px 198px;"></h3>
                        <div class="textBox">
                          <span style="word-break: break-all;font-size:15px;display:block"><?= $courses->title ?></span>
                           <span class="ti-tag" style="font-size: 11px; font-weight: bold;float: right; margin-top: 5px; "><?= $practice. " Latihan" ?></span>
                           <span class="ti-medall" style="font-size: 11px;font-weight: bold;float: right;margin-right: 10px;margin-top: 5px;"><?= $quiz ." Tes Formatif"?></span>
                        </div>
                      </div>
                      </a>
                    <?php endforeach; ?>                    
                </div>               
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>                   

                   