<?php
    use yii\helpers\Html;


    $this->registerCss("
        .ti-power-off{
            cursor:pointer;
        }
    ");
?>


 <!-- Top Bar Start -->
 <div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <a href="index.html" class="logo">
            <span>
                <img src="../../asset/images/logo.png" alt="">
            </span>
            <i>
                <img src="../../asset/images/logo_sm.png" alt="">
            </i>
        </a>
    </div>

    <nav class="navbar-custom">

        <ul class="list-unstyled topbar-right-menu float-right mb-0">
          

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="false" aria-expanded="false">
                    <img src="../../asset/images/users/avatar-1.jpg" alt="user" class="rounded-circle"> <span class="ml-1"><?= Yii::$app->user->identity->username; ?> <i class="mdi mdi-chevron-down"></i> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="ti-user"></i> <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="ti-settings"></i> <span>Settings</span>
                    </a>
                  
                   
                    <?=				  
                        Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                            '<span style="margin-left: 10px;">Logout</span>',
                            ['class' => 'dropdown-item notify-item ti-power-off']
                        )
                        . Html::endForm()
                    ?>

                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-light waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>
            <li class="hide-phone app-search">
                <form role="search" class="">
                    <input type="text" placeholder="Search..." class="form-control">
                    <a href=""><i class="fa fa-search"></i></a>
                </form>
            </li>
        </ul>

    </nav>

</div>
<!-- Top Bar End -->