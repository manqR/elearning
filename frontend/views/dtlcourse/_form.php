<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Dtlcoursecategory;
use yii\web\View;

include '../../asset/inc/table.php';

/* @var $this yii\web\View */
/* @var $model frontend\models\Dtlcourse */
/* @var $form yii\widgets\ActiveForm */


$this->registerCss("
    .search, .add, .add-diagnosa, .searchs, .delete{
        cursor:pointer;
    }
    .input2{
        height:16px;
        width: 100%;
    }
    td,
    th {
        border: 1px solid rgb(190, 190, 190);
        padding: 5px 10px;
        font-size:10px;
    }


    table{
        width:100%
    }
    td{
        padding-left: 8px; 
        padding-top: 5px; 
        padding-right: 8px; 
        padding-bottom: 10px;
    }
    td.left {
        width:200px;
    }
    tr {
        border-bottom: 1px solid #EEEEEE;
        line-height:0.8;
    }
");
$this->registerJs("
$(document).ready(function() {    
    $('.summernote').summernote({
        height: 350,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: false                 // set focus to editable area after initializing summernote
    });
    $('input[type=radio]').change(function() {
        // When any radio button on the page is selected,
        // then deselect all other radio buttons.
        $('input[type=radio]:checked').not(this).prop('checked', false);
    });
});


");

$this->registerJs('
    function checkCat(val){              
        val == 1  || val == 3 ? $("#pract").css("display", "block") : $("#pract").css("display", "none");
    }
',VIEW::POS_HEAD);

?>
<div class="mas-claim-view card card-block" style="margin:23px">
    <?= TableCourse($model->isNewRecord ? $_GET['id'] : $model->courseID); ?>
</div>
<hr/>
<div class="dtlcourse-form">
    <div class="col-md-12" style="display:flex">
        <div class="col-md-6 col-xs-6">
        <?php $form = ActiveForm::begin(); ?>            

            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'detailID')-> dropDownList(
			ArrayHelper::map(Dtlcoursecategory::find()->all(),'detailID','dtlCatCourseName'),
			['prompt'=>'- Pilih -','style' => 'width: 100%;height:40px', 'onChange'=>'checkCat(this.value)'])->label('Course Category Detail');  ?>		

            <?= $form->field($model, 'description')->textarea(['rows' => 3,'class'=>'summernote']) ?>

                       
        </div>
        <div class="col-md-6 col-xs-6">
            <?php
                if(!$model->isNewRecord && ($model->detailID == 1 || $model->detailID == 3)){
            ?>
            <div id="pract">
                <h4> Answer </h4>
                <div class="table-responsive">  
                    <table class="table table-bordered" id="dynamic_field">  
                        <?php 
                            for($i = 1;$i <= 5; $i++){                            
                                $cheked = '';
                                $val = '';
                                if(!$model->isNewRecord){ 
                                    if(isset($options[$i-1])){
                                        if($options[$i-1]['iscorrect'] == 1){
                                            $cheked = 'checked';
                                    }
                                    }                           
                                
                                    $val = isset($options[$i-1]['optional']) ? 'value ='.$options[$i-1]['optional'] : '';
                                }
                            echo' <tr>   
                                    <td><input type="radio" '.$cheked.' name="answer'.$i.'" ></td>               
                                    <td><input type="text" '.$val.' name="options'.$i.'" placeholder="Enter your Option" class="form-control name_list" /></td>                                  
                                </tr>' ; 
                            }
                        ?>                   
                    </table>                     
                    <?= $form->field($model, 'poin')->textInput() ?>
                </div>                            
            </div>  
            <?php }else if($model->isNewRecord){
             ?>   
              <div id="pract">
                <h4> Answer </h4>
                <div class="table-responsive">  
                    <table class="table table-bordered" id="dynamic_field">  
                        <?php 
                            for($i = 1;$i <= 5; $i++){                            
                                $cheked = '';
                                $val = '';
                                if(!$model->isNewRecord){ 
                                    if(isset($options[$i-1])){
                                        if($options[$i-1]['iscorrect'] == 1){
                                            $cheked = 'checked';
                                    }
                                    }                           
                                
                                    $val = isset($options[$i-1]['optional']) ? 'value ='.$options[$i-1]['optional'] : '';
                                }
                            echo' <tr>   
                                    <td><input type="radio" '.$cheked.' name="answer'.$i.'" ></td>               
                                    <td><input type="text" '.$val.' name="options'.$i.'" placeholder="Enter your Option" class="form-control name_list" /></td>                                  
                                </tr>' ; 
                            }
                        ?>                   
                    </table>                     
                    <?= $form->field($model, 'poin')->textInput() ?>
                </div>                            
            </div>  
            <?php } else echo "";?>  
            <?= $form->field($model, 'hint')->textInput() ?> 
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success','id'=>'submit']) ?>
            </div>        
        </div>
    </div>    
    <?php ActiveForm::end(); ?>

</div>
