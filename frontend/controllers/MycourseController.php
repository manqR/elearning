<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Dtlcourse;
use frontend\models\Course;
use frontend\models\Usercourse;
use frontend\models\Dtlcourseopt;
use frontend\models\Tbloption;
use frontend\models\Resultcourse;
use frontend\models\Coursecategory;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\BadRequestHttpException;
use yii\web\Response;

include 'asset/inc/auth.php';
class MycourseController extends \yii\web\Controller
{
    public function beforeAction($action){
                
        if(!getAuth()){
           return true; 
        }                
    }
    public function actionIndex()
    {        
        $sql = "SELECT c.* , a.*, b.img, b.title
                FROM usercourse a 
                JOIN course b ON a.courseID = b.courseID 
                JOIN coursecategory c ON b.categoryID = c.categoryID 
                WHERE a.userID = ".Yii::$app->user->identity->id." AND (a.detailID = 1 OR a.detailID = 3)";

        $model = Yii::$app->db->createCommand($sql)->queryAll();
        
        $query = "SELECT DISTINCT c.categoryName
                FROM usercourse a 
                JOIN course b ON a.courseID = b.courseID 
                JOIN coursecategory c ON b.categoryID = c.categoryID 
                WHERE a.userID = ".Yii::$app->user->identity->id." AND (a.detailID = 1 OR a.detailID = 3)";

        $exec = Yii::$app->db->createCommand($query)->queryAll();
        // var_dump($model);
        // echo $query;
        // die;
        return $this->render('index',[
            'model'=>$model,
            'exec' => $exec
        ]);
    }
    public function actionDetailCourse($id){
         $sql = "SELECT *
                FROM usercourse a 
                JOIN course b ON a.courseID = b.courseID 
                JOIN coursecategory c ON b.categoryID = c.categoryID 
                WHERE a.userID = ".Yii::$app->user->identity->id." AND a.urutan = ".$id."";

        $model = Yii::$app->db->createCommand($sql)->queryOne();
        
        return $this->render('detail',[
            'model'=>$model
        ]);
    }
    public function actionQuiz($courseID, $userID, $dtl = 1, $r=0, $type){
        if($userID == Yii::$app->user->identity->id){        
            $title = "";
            $title = $type == 1 ? 'Tes Formatif 1' : 'Tes Formatif 2';
            $lastCourse = Usercourse::findOne(['userID'=>$userID,'courseID'=>$courseID,'detailID'=>$type]);          
            $model = Dtlcourse::find()                    
                    ->Where(['courseID'=>$courseID])
                    ->AndWhere(['detailID'=>$type])
                    ->orderBy(['iddetailcourse'=>SORT_ASC])
                    ->One();
            if($model){                
                $no = 1;
                if($lastCourse && $lastCourse->isFinish == 1){                                       
                    $delDetail = Resultcourse::findAll(['urutan'=>$lastCourse->urutan]);
                    foreach($delDetail as $delDetails):
                        // var_dump($delDetails);
                        $delDetails->delete();
                    endforeach;
                    $lastCourse->delete();                    
                    // die;
                    $r = 1;
                }
                $lastCourse = Usercourse::findOne(['userID'=>$userID,'courseID'=>$courseID,'detailID'=>$type]);          
                if($lastCourse){                    
                   
                    $last =  Resultcourse::find()
                            ->where(['urutan'=>$lastCourse->urutan])
                            ->orderBy(['id'=>SORT_DESC])
                            ->One();

                    $no =  Resultcourse::find()
                            ->where(['urutan'=>$lastCourse->urutan])                        
                            ->Count();
                    $no = $no+1;
                    $model = Dtlcourse::find()
                            ->where(['>','iddetailcourse',$last->iddetailcourse])
                            ->AndWhere(['courseID'=>$courseID])
                            ->AndWhere(['detailID'=>$type])
                            ->One();
                    if(!$model){                          
                        $lastCourse->isFinish = 1;
                        $lastCourse->endDate = date('Y-m-d H:i:s');                     
                        $lastCourse->save();
                        if($r==0){
                            Yii::$app->session->setFlash('success', '<strong>Finished !</strong> Course is Finished !');
                            return $this->redirect(['index','courseid'=>$courseID,'usr'=>$userID]);
                        }
                        
                    }
                }            
                $course = Course::findOne(['courseID'=>$courseID]);
                $option = Dtlcourseopt::find()
                        ->joinWith('opt')
                        ->where(['iddtlcourse'=>$model->iddetailcourse])
                        ->AndWhere(['courseID'=>$model->courseID])
                        ->orderBy(['optID'=>SORT_ASC])
                        ->all();  
                return $this->render('question',[
                    'model'=>$model,
                    'course' =>$course,
                    'title' => $title,
                    'dtl'=>$type,
                    'no' => $no,
                    'option' => $option
                ]);
            }else{
                throw new BadRequestHttpException('Tes Tidak Tersedia di modul ini');
            }
        }
        throw new NotFoundHttpException('The requested page does not exist.');
       
    }
    public function actionPractice($courseID, $userID,$dtl = 2,$r=0,$type){
        if($userID == Yii::$app->user->identity->id){  
            $title = "";
            $title = $type == 2 ? 'Latihan 1' : 'Latihan 2';
            $course = Course::findOne(['courseID'=>$courseID]);
            $lastCourse = Usercourse::findOne(['userID'=>$userID,'courseID'=>$courseID,'detailID'=>$type]);

            $model = Dtlcourse::find()                    
                    ->Where(['courseID'=>$courseID])
                    ->AndWhere(['detailID'=>$type])
                    ->orderBy(['iddetailcourse'=>SORT_ASC])
                    ->One();
            if($model){
                $no = 1;
                if($lastCourse && $lastCourse->isFinish == 1){                                       
                    $delDetail = Resultcourse::findAll(['urutan'=>$lastCourse->urutan]);
                    foreach($delDetail as $delDetails):
                        // var_dump($delDetails);
                        $delDetails->delete();
                    endforeach;
                    $lastCourse->delete();                                        
                    $r = 1;
                }
                $lastCourse = Usercourse::findOne(['userID'=>$userID,'courseID'=>$courseID,'detailID'=>$type]);
                if($lastCourse){
                    $last =  Resultcourse::find()
                            ->where(['urutan'=>$lastCourse->urutan])
                            ->orderBy(['id'=>SORT_DESC])
                            ->One();
                    
                    $no =  Resultcourse::find()
                            ->where(['urutan'=>$lastCourse->urutan])                        
                            ->Count();
                    $no = $no+1;
                    $model = Dtlcourse::find()
                            ->where(['>','iddetailcourse',$last->iddetailcourse])
                            ->AndWhere(['courseID'=>$courseID])
                            ->AndWhere(['detailID'=>$type])
                            ->One();
                    if(!$model){
                        $lastCourse->isFinish = 1;
                        $lastCourse->endDate = date('Y-m-d H:i:s');                     
                        $lastCourse->save();
                        if($r==0){
                            Yii::$app->session->setFlash('success', '<strong>Finished !</strong> Course is Finished !');
                            return $this->redirect(['index','courseid'=>$courseID,'usr'=>$userID]);
                        }
                    }
                }          
                $option = Dtlcourseopt::find()
                        ->joinWith('opt')
                        ->where(['iddtlcourse'=>$model->iddetailcourse])
                        ->AndWhere(['courseID'=>$model->courseID])
                        ->orderBy(['optID'=>SORT_ASC])
                        ->all();  

                return $this->render('question',[
                    'model'=>$model,
                    'title' => $title,
                    'course' =>$course,
                    'dtl' => $type,
                    'no' => $no,
                    'option' => $option
                ]);
            }else{
                throw new BadRequestHttpException('Tes Tidak Tersedia di Modul ini');
            }
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionCheckAnswer(){
        if($_POST){                        
            $findAnswer = Dtlcourse::findOne(['courseID'=>$_POST['courseID'],'iddetailcourse'=>$_POST['iddetailcourse'],'detailID'=>$_POST['dtl']]);
            $correct= 0;
            $output = array();
            $poin = 0;
           
            if($findAnswer->correctAnswer == $_POST['optID']){
                $correct = 1;
                $poin = $findAnswer->poin;
            }
            $opt = Tbloption::findOne(['id'=>$findAnswer->correctAnswer]);
            $sum = Dtlcourse::find()
                    ->where(['courseID'=>$_POST['courseID']])                    
                    ->andWhere(['detailID'=>$findAnswer->detailID])
                    ->sum('poin');

            
            $model = Usercourse::findOne(['userID'=>Yii::$app->user->identity->id, 'courseID'=>$_POST['courseID'],'detailID'=>$_POST['dtl']]);
            if($model){
                
                $lastScore = ($_POST['type'] == 2|| $_POST['type'] == 4 ? 0: ($model->score / 100) * $sum);                
                $model->score = ($_POST['type'] == 2 || $_POST['type'] == 4 ? 0: (($lastScore + $poin) / $sum ) * 100);                
                $model->endDate = date('Y-m-d H:i:s');
                $model->save(false);
            }else{
                $model = new Usercourse;                
                $model->userID = Yii::$app->user->identity->id;
               
                $model->score = ($sum != 0 ? ($poin / $sum) * 100 :0);
                $model->courseID = $_POST['courseID'];
                $model->startDate = date('Y-m-d H:i:s');
                $model->endDate = date('Y-m-d H:i:s');
                $model->duration = 0;
                $model->isFinish = 0;
                $model->detailID = $_POST['dtl'];
                $model->save(false);
                
            }
            $modelDtl = new Resultcourse;  
            $modelDtl->urutan = $model->urutan;
            $modelDtl->answer = $_POST['optID'];
            $modelDtl->iddetailcourse = $_POST['iddetailcourse'];
            $modelDtl->save(false);

            $totalQuestion = Dtlcourse::find()
                ->where(['courseID'=>$_POST['courseID']])                
                ->andWhere(['detailID'=>$findAnswer->detailID])
                ->count();

            $totalAnswer = Resultcourse::find()
                ->where(['urutan'=>$model->urutan])                
                ->count();
            $isFinish = false;

            if($totalQuestion == $totalAnswer){
                $isFinish = true;
            }

            $output = array(
                'answer'=>($correct == 1 ? 'correct': ''),
                // 'correctAnswer'=>($_POST['type'] == 1 ? 'A' :$opt->alias),
                'isFinish'=>$isFinish,
                'score'=> $model->score
             );
          
            $data = [
                $output
            ];
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $data;      
        }else{
            throw new BadRequestHttpException('Please check your correct answer !');
        }
    }

}
