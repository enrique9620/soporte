<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">
    <meta charset="utf-8">
    <script type="text/javascript">
        function numeros(e){
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = "0123456789";
        especiales = [8,37,39,46];
        tecla_especial = false;
        for(var i in especiales){
          if(key == especiales[i]){
            tecla_especial = true;
            break;
          }
        }
        if(letras.indexOf(tecla)==-1 && !tecla_especial)
            return false;
      }
    </script>
        <title>
           Sistema de Soporte
        </title>

        <!-- BEGIN META -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="your,keywords">
        <meta name="description" content="Short explanation about this website">

        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css
                            (
                                array
                                    (
                                        'theme-default/bootstrap.css',
                                        'theme-default/materialadmin.css',
                                        'theme-default/font-awesome.min.css',
                                        'theme-default/material-design-iconic-font.min.css',
                                        'theme-default/libs/toastr/toastr.css',
                                        'theme-default/libs/DataTables/jquery.dataTables.css',
                                        'theme-default/libs/DataTables/TableTools.css'
                                    )
                            );
        echo $this->Html->script
                                (
                                    array
                                        (
                                            'libs/jquery/jquery-1.11.2.min.js',
                                            'libs/bootstrap/bootstrap.min.js',
                                            'helpers/DataTableGenerator.js',
                                            'helpers/ModalGenerator.js',
                                            'helpers/helper.js'
                                        )
                                );

        echo $this->Html->script('libs/DataTables/jquery.dataTables.min.js');
        //echo $this->Html->script('*PATH*/dataTables.bootstrap.min.js');
        //echo $this->Html->script('DataTables.cakephp.dataTables.js');
        //echo $this->Html->css('PATH/dataTables.bootstrap.css');

        //echo $this->Html->script(array('jquery'));
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>

    </head>
    <body class="menubar-hoverable header-fixed" oncontextmenu="return false">

        <header id="header" >
            <div class="headerbar">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="headerbar-left">
                    <ul class="header-nav header-nav-options">
                        <li class="header-nav-brand" >
                            <div class="brand-holder">
                                <?php
                                //echo $this->Html->link('<span class="text-lg text-bold text-primary">GESTION</span>','/',array('escape'=>false));
                                echo $this->Html->link($this->Html->image('support.png'),'/bugs',array('escape'=>false));
                                ?>
                            </div>
                        </li>
                        <li>
                            <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                                <i class="fa fa-bars"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="headerbar-right">
                    <ul class="header-nav header-nav-profile">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                                <!-- <img src="../../assets/img/avatar1.jpg?1403934956" alt="" /> -->
                                <span class="profile-info">
                                    <?php
                                    $session = $this->request->session();
                                    echo "Bienvenido" . "<br>";
                                    echo $session->read('User.username');
                                    ?>
                                </span>
                            </a>
                            <ul class="dropdown-menu animation-dock">
                                <!-- <li class="dropdown-header">Config</li> -->
                                <li>
                                    <?php
                                    echo $this->Html->link
                                            (
                                                'Cambiar contrase&ntilde;a',
                                                array
                                                    (
                                                        'controller'=>'Users',
                                                        'action'=>'cambiarPassword',
                                                        $session->read('Auth.User.id')
                                                    ),
                                                array
                                                    (
                                                        'escape'=>false
                                                    )
                                            );
                                    ?>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <?php
                                    echo $this->Html->link
                                            (
                                                '<i class="fa fa-fw fa-power-off text-danger"></i>&nbsp;Cerrar Sesi&oacute;n',
                                                array
                                                    (
                                                        'controller'=>'Users',
                                                        'action'=>'logout'
                                                    ),
                                                array
                                                    (
                                                        'escape'=>false
                                                    )
                                            );
                                    ?>
                                </li>
                            </ul><!--end .dropdown-menu -->
                        </li><!--end .dropdown -->
                    </ul><!--end .header-nav-profile -->
                    <!-- <ul class="header-nav header-nav-toggle">
                        <li>
                            <a class="btn btn-icon-toggle btn-default" href="#offcanvas-search" data-toggle="offcanvas" data-backdrop="false">
                                <i class="fa fa-ellipsis-v"></i>
                            </a>
                        </li>
                    </ul><!-end .header-nav-toggle -->
                </div><!--end #header-navbar-collapse -->
            </div>
            </div>
        </header>

        <div id="base">

            <!-- BEGIN OFFCANVAS LEFT -->
            <div class="offcanvas">
            </div><!--end .offcanvas-->
            <!-- END OFFCANVAS LEFT -->

            <!-- BEGIN CONTENT-->
            <div id="content">
                <section>
                    <!--<div class="section-header">
                        <ol class="breadcrumb">
                            <li><a href="../../html/.html">home</a></li>
                            <li class="active">Blank page</li>
                        </ol>
                    </div><!-end .section-header -->
                    <div class="section-body">
                        <?= $this->Flash->render() ?>
                        <?= $this->fetch('content') ?>
                    </div><!--end .section-body -->
                </section>
            </div>

            <div id="menubar" class="menubar-inverse animate">
                <div class="menubar-fixed-panel">
                    <div>
                        <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>

                </div>
                <div class="menubar-scroll-panel">

                    <!-- BEGIN MAIN MENU -->
                    <ul id="main-menu" class="gui-controls">
                      <li>
                        <?php
                        echo $this->Html->link
                                            (
                                                '<div class="gui-icon"><i class="md md-content-paste"></i></div><span class="title">Reportes</span>',
                                                "/bugs",
                                                array
                                                    (
                                                        'class'=>'dropdown-toggle',
                                                        'data-toggle'=>'dropdown',
                                                        'escape'=>false
                                                    )
                                            );
                         ?>
                      </li>
                      <li>
                        <?php
                        echo $this->Html->link
                                            (
                                                '<div class="gui-icon"><i class="md md-headset-mic"></i></div><span class="title">Supervisores</span>',
                                                "/asignados",
                                                array
                                                    (
                                                        'class'=>'dropdown-toggle',
                                                        'data-toggle'=>'dropdown',
                                                        'escape'=>false
                                                    )
                                            );
                         ?>
                      </li>
                      <li>
                        <?php
                        echo $this->Html->link
                                            (
                                                '<div class="gui-icon"><i class="md md-android"></i></div><span class="title">Sistemas</span>',
                                                "/sistemas",
                                                array
                                                    (
                                                        'class'=>'dropdown-toggle',
                                                        'data-toggle'=>'dropdown',
                                                        'escape'=>false
                                                    )
                                            );
                         ?>
                      </li>
                    </ul><!--end .main-menu -->
                    <!-- END MAIN MENU -->
                </div><!--end .menubar-scroll-panel-->
            </div>

        </div>

        <?php
        echo $this->Html->script
                                (
                                    array
                                        (
                                            'libs/jquery/jquery-migrate-1.2.1.min.js',
                                            'libs/bootstrap/bootstrap.min.js',
                                            'libs/spin.js/spin.min.js',
                                            'libs/autosize/jquery.autosize.min.js',
                                            'libs/nanoscroller/jquery.nanoscroller.min.js' ,
                                            'core/source/App.js',
                                            'core/source/AppNavigation.js',
                                            'core/source/AppOffcanvas.js',
                                            'core/source/AppCard.js',
                                            'core/source/AppForm.js',
                                            'core/source/AppNavSearch.js',
                                            'core/source/AppVendor.js',
                                            'libs/toastr/toastr.js',
                                            //'core/demo/Demo.js',
                                        )
                                );
        ?>

