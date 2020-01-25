<?php
    use frontend\models\RolePrivillage;   
    use frontend\models\Role;
    use frontend\models\Menus;
    use frontend\models\MenuDetail;
    use yii\widgets\Menu;
?>

<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="user-details">
        <div class="pull-left">
            <img src="../../assets/images/users/avatar-1.jpg" alt="" class="thumb-md rounded-circle">
        </div>
        <div class="user-info">
            <a href="#"><?= isset(Yii::$app->user->identity->username)  ? Yii::$app->user->identity->username : 'Guest !' ?></a>            
        </div>
    </div>

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
      
            <?php
    
                $model = Menus::find()
                        ->where(['flag'=>1])
                        ->all();

                $x = 0; 
                $output = [];   
                
                $output[] = array(
                    'label' => '<li class="menu-title">Navigation</li>',                                                            
                );  
                $output[] = array(
                    'label' => '<i class="ti-home"></i><span>Dashboard</span>',
                    'url'=> Yii::$app->HomeUrl,                    
                    
                );  
                foreach($model as $models):
                    
                    $x += 1;
                    $privileges = RolePrivillage::find()
                        ->where(['like', 'menu_name', $models->nama_menu])
                        ->AndWhere(['description'=>'HEAD'])
                        ->AndWhere(['idrole'=>1])
                        ->One();
                    
                    if($privileges){
                        if($privileges->flag == 1){                    
                            $output[] = array(
                                'label' => '<i class="ti-'.$models->icon.'"></i><span>'. $models->nama_menu . '</span>',
                                'url'=> '?r='.$models->link,
                                'active' => $this->context->route == $models->link,
                                
                            );
                            
                        }
                    }
                endforeach;  
                
            
                echo Menu::widget([
                    'encodeLabels' => false,
                    // 'activeCssClass'=>'active',
                    'options' => array( 'class' => 'metismenu','id'=>'side-menu'),
                    'items' => $output,               
                    
                ]);
                    
            ?>
            
        

    </div>
    <!-- Sidebar -->
    <div class="clearfix"></div>

</div>
<!-- Left Sidebar End -->