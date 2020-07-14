<?php
    namespace frontend\controllers;


    use Yii;
    use yii\web\Response;
    use yii\web\Controller;
    use yii\web\NotFoundHttpException;
    use yii\filters\VerbFilter;
    use frontend\models\Pembayaran;
    use frontend\models\Role;
    use frontend\models\Menus;
    use frontend\models\RolePrivillage;

class ApiController extends Controller{



    public static function allowedDomains(){
		return [
			'*',				
		];
	}
	
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
		return array_merge(parent::behaviors(), [
			'corsFilter'  => [
				'class' => \yii\filters\Cors::className(),
				'cors'  => [					
					'Origin'                           => static::allowedDomains(),					
					'Access-Control-Allow-Credentials' => true,
					'Access-Control-Max-Age'           => 3600,    
				],
			],

		]);
    }


    public function actionListMenu(){
        
        $output = array();         

        if($_POST){

            $arrData = $_POST['data'];

          
            $model = Menus::find()
                    ->where(['flag'=>1])
                    ->all();
            
            $html = '';
           
            $html .='<div id="fontSizeWrapper">
                        <label for="fontSize">Akses Menu</label>                
                    </div>
                    <ul class="tree" style="list-style: none;">';
            $x = 0;
            $d = 0;
            foreach($model as $models):
                $x += 1;
                
                $privileges = RolePrivillage::find()
                    ->where(['like', 'menu_name', $models->nama_menu])
                    ->AndWhere(['description'=>'HEAD'])
                    ->AndWhere(['idrole'=>$arrData[0]])
                    ->One();
                
                if($privileges){
                    $checks = $privileges->flag == 1 ? 'checked':'';
                }else{
                    $checks = '';
                }
              
               

                   
                $html .='
                
                        
                            <li>
                                <input type="checkbox" '.$checks.' name="check" id="c'.$x.'" />
                                <label class="tree_label" for="c'.$x.'">'.$models->nama_menu.'</label>
                               
                            </li>
                            
                       ';
            endforeach;
            $html .=' </ul>';
            return $html;
        }else{

            $data = json_encode($output);
            $data = [
                'data'=>'Method Not Allowed'
            ];
            Yii::$app->response->format = Response::FORMAT_JSON;
		    return $data;
        }
        
	
    }

    public function actionDivision(){
        $model = Role::find()
                ->all();
        
        $output = array();        

        foreach($model as $i => $models):
            $output[$i] = array(
                          $models->role_name,                                              
                          '<i data-id='.$models->idrole.';'.$models->role_name.' class="fa fa-plus add"></i>'
            );


        endforeach;
                
        $data = json_encode($output);
        $data = [
            'data'=>$output
        ];
        
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $data;

    }

    public function actionPostPrivilege(){
        if($_POST){
            
            $head = explode(',',$_POST['master']);            

            $model = Menus::find()
                    ->where(['flag'=>1])
                    ->OrderBy(['idmenu'=>SORT_ASC])
                    ->all();

            

            $del= RolePrivillage::find()
                ->where(['idrole'=>$_POST['role']])
                ->all();
                
                
            if(isset($del)){
                foreach($del as $dels){
                    $dels->delete();
                }
            }
            $x = 0;
            foreach($model as $i => $models):
                         
                $privilege = new RolePrivillage();
                $privilege->idrole = $_POST['role'];
                $privilege->description = 'HEAD';
                $privilege->menu_name = $models->alias;
                $privilege->flag = $head[$i];
                $privilege->save();
                // echo $i;
             
                // var_dump($head[$i]);
            endforeach;
        }else{
            $output = array();
            $data = json_encode($output);
            $data = [
                'data'=>'Method Not Allowed'
            ];
            
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $data;
        }
    }

}

?>
