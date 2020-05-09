<?php

use yii\helpers\Html;
use  yii\web\View;
/* @var $model frontend\models\Course */

$this->title = $course->title." - ".$title;
\yii\web\YiiAsset::register($this);

$this->registerCss("
    .question{
        padding: 25px;
        border-radius: 5px;
        box-shadow: 1px 2px 4px 2px #888888;        
        margin:40px;
        text-align:justify;
    }
    .questions{
        display:flex;
      
    }
    p{
        margin-left:5px;
    }
    .title{
        margin-top: 15px;
        margin-bottom: -15px;
    }
    .opt {
        display: block;
        line-height: 25px;
        margin-left: 30px;
    }
    .answer{
        float:right;
    }
    @media (max-width: 768px) {
        .alert {
            max-width: 40%;
        }
    }
    @media (min-width: 768px) {
        .alert {
            max-width: 80%;
        }
    }
");

$this->registerJs("
    function answer(){
        if(".$_GET['type']." == 2 || ".$_GET['type']." == 4 ){
            $.post('./?r=mycourse/check-answer',{
                optID: 1,
                type:".$_GET['type'].",
                courseID:".$course->courseID.",
                iddetailcourse:".$model->iddetailcourse.",
                dtl:".$dtl."
            },
            function(data, status){	 
                 location.reload();
            })
        }else{
            var answerRadio = document.querySelector(\"input[name=answers]:checked\");
            if (document.querySelectorAll('input[type=\"radio\"]:checked').length === 0){
                console.log('tidak ada dipilih')            
                $('span.msg-err').html('').append('<i class=\"alert alert-icon alert-danger alert-dismissible fade show mdi mdi-alert\"> Please select the correct answer !</i>' );
            }else{            
                $('span.msg-err').html('').append('' );
                
                $.post('./?r=mycourse/check-answer',{
                    optID: answerRadio.value,
                    type:".$_GET['type'].",
                    courseID:".$course->courseID.",
                    iddetailcourse:".$model->iddetailcourse.",
                    dtl:".$dtl."
                },
                function(data, status){	   
                    console.log(status)              
                    if(status == 'success'){
                        if(data[0]['answer'] == 'correct'){                        
                            $('span.msg-err').html('').append('<i class=\"alert alert-icon alert-success alert-dismissible fade show mdi mdi-check-all\"> Congratulation ! , Your answers is Corected !</i>' );
                        }else{                        
                            $('span.msg-err').html('').append('<i class=\"alert alert-icon alert-danger alert-dismissible fade show mdi mdi-block-helper\"> Sorry ! , Your answers Incorrected ! <b></b></i>' );
                        }  
                    
                        $('#submit').css('display','none');               
                        $('#next').css('display','block');     
                        $('#finish').css('display','none');    

                        if(data[0]['isFinish'] == true){
                            $('#next').css('display','none'); 
                            $('#finish').css('display','block'); 
                        }                              
                        $('input[name=answers]').attr(\"disabled\",true);                            
                    }else{
                        $('span.msg-err').html('').append('<i class=\"alert alert-icon alert-danger alert-dismissible fade show mdi mdi-alert\"> There\'s problem with your connection, please try again !</i>' );
                    }
                                
                });
            }
        }
    
    }
",VIEW::POS_HEAD);
?>

<h1><?=  $this->title ?></h1>

<span class="title btn btn-success">Pertanyaan <?= $no ?></span>

    
    <?php    

            $opt = '';
            foreach($option as $options):
                    $opt .= "<span class='opt'><input type='radio' name='answers'  value=".$options->optID." />". $options->opt->alias." .".$options->optional."</span><i class='msg'></i>";                         
            endforeach;    

            echo "<div class='question'><span class='questions'>".$no .". ".$model->description."</span>$opt</div>";  
           
            echo "<button class='answer btn btn-success' id='submit' onClick='answer()'> Submit Jawaban</button><span class='msg-err'></span>";      
            echo "<button class='answer btn btn-success' id='next' style='display:none' onClick='location.reload();'> Lanjut &raquo; </button>";      
            echo "<button class='answer btn btn-success' id='finish' style='display:none' onClick='location.reload();'> Lihat Hasil &raquo; </button>";      
        if($dtl == 2  || $dtl == 4){
    ?>
        <div class="alert alert-icon alert-info alert-dismissible fade show" style="margin-left: 45px;"role="alert">
            <button type="button" class="close" data-dismiss="alert"
                    aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-information"></i>
            <strong>Bantuan !</strong> <?= $model->hint ?>
            <?= Html::a('<span class="btn btn-primary">Materi</span>',['//site/materi','id'=>$model->courseID],['target'=>'_blank'])?>
        </div>
    <?php
        }
    ?>