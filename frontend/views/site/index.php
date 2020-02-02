<?php
use frontend\models\Course;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';

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
      margin: 10px;
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
                <div class="slider slider-nav">
                    <?php
                        $course = Course::findAll(['categoryID'=>$models->categoryID]);
                        foreach($course as $courses):
                    ?>
                      <div><h3 style="background-image: url('../../asset/images/course/<?= $courses->img ?>');width: 258px;height: 198px;background-size: 258px 198px;"></h3><span style="word-break: break-all;font-size:20px"><?= $courses->title ?></span></div>
                    <?php endforeach; ?>                    
                </div>               
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>                   

                   