<?php use Cake\Routing\Router;?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="">
    <title>Sistema de Soporte</title>
    <!-- Custom CSS -->
    <!-- <link href="../../assets/libs/flot/css/float-chart.css" rel="stylesheet"> -->
    <?php echo $this->Html->meta('icon'); ?>
    <?= $this->Html->css('dashboard/float-chart.css') ?>
    <!-- Custom CSS -->
    <!-- <link href="../../dist/css/style.min.css" rel="stylesheet"> -->
    <?= $this->Html->css('dashboard/style.min.css') ?>
      <!--calendario-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="images/apoyo-tecnico.png" alt="homepage" class="light-logo" />
                           
                        </b>
                        <!--End Logo icon -->
                         <!-- Logo text -->
                        <span class="logo-text">
                             <!-- dark Logo text -->
                             <img src="images/logo-text.png" alt="homepage" class="light-logo" />
                            
                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                            
                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="img/usuario.png" alt="user" class="rounded-circle" width="31"></a>
                            <?php $session = $this->request->session();?>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <!-- <a class="dropdown-item" href="<?php //echo Router::url(['action'=>'logout','controller'=>'Users'])?>"><i class="ti-settings m-r-5 m-l-5"></i>Cambiar Contraseña</a> -->
                                <a class="dropdown-item" href="<?php echo Router::url(['action'=>'cambiarPassword','controller'=>'Users', $session->read('Auth.User.id')])?> "><i class="fg-white1 mdi mdi-settings"></i>Cambiar Contraseña</a>
                                <div class="dropdown-divider">
                                </div>

                                <a class="dropdown-item" href="<?php echo Router::url(['action'=>'logout','controller'=>'Users'])?> "><i class="fa mdi mdi-logout"></i> Cerrar Sesión</a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo Router::url(['action'=>'home','controller'=>'Inicio'])?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">INICIO</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">SUPERVISORES</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo Router::url(['action'=>'listado','controller'=>'Users'])?>" class="sidebar-link"><i class="mdi mdi-file-document-box"></i><span class="hide-menu">Listado</span></a>
                                
                                </li>
                                <li class="sidebar-item"><a href="<?php echo Router::url(['action'=>'add','controller'=>'Users'])?>" class="sidebar-link"><i class="mdi mdi-account-multiple-plus"></i><span class="hide-menu">Nuevo</span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-sync"></i><span class="hide-menu">ACTUALIZACIONES</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo Router::url(['action'=>'index','controller'=>'Actualizaciones'])?>" class="sidebar-link"><i class="mdi mdi-file-document-box"></i><span class="hide-menu">Listado</span></a></li>
                                <li class="sidebar-item"><a href="<?php echo Router::url(['action'=>'add','controller'=>'Actualizaciones'])?>" class="sidebar-link"><i class="mdi mdi-plus-circle"></i><span class="hide-menu">Nueva Act.</span></a></li>
                                <li class="sidebar-item"><a href="<?php echo Router::url(['action'=>'recientes','controller'=>'Actualizaciones'])?>" class="sidebar-link"><i class="mdi mdi-auto-upload"></i><span class="hide-menu">Act. Reciente</span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-laptop-windows"></i><span class="hide-menu">OPERACIONES</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo Router::url(['action'=>'all','controller'=>'bugs'])?>" class="sidebar-link"><i class="mdi mdi-file-document-box"></i><span class="hide-menu">Todos los reportes</span></a></li>
                                <li class="sidebar-item"><a href="<?php echo Router::url(['action'=>'index','controller'=>'bugs'])?>" class="sidebar-link"><i class="mdi mdi-file-document"></i><span class="hide-menu">Reportes Abiertos</span></a></li>
                                <li class="sidebar-item"><a href="<?php echo Router::url(['action'=>'finalizados','controller'=>'bugs'])?>" class="sidebar-link"><i class="mdi mdi-file-excel"></i><span class="hide-menu">Reportes Cerrados</span></a></li>
                                <li class="sidebar-item"><a href="<?php echo Router::url(['action'=>'chat','controller'=>'users'])?>" class="sidebar-link"><i class="mdi mdi-message-draw"></"></i><span class="hide-menu">chats</span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-television-guide"></i><span class="hide-menu">SISTEMAS</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo Router::url(['action'=>'index','controller'=>'sistemas'])?>" class="sidebar-link"><i class="mdi mdi-file-document-box"></i><span class="hide-menu">Listado</span></a></li>
                                <li class="sidebar-item"><a href="<?php echo Router::url(['action'=>'add','controller'=>'sistemas'])?>" class="sidebar-link"><i class="mdi mdi-plus-circle"></i><span class="hide-menu">Nuevo</span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-chart-pie"></i><span class="hide-menu">ESTADÍSTICAS</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo Router::url(['action'=>'reportes','controller'=>'estadisticas','_ext' => 'pdf'],['escape'=>false,'class'=>'', 'target' => '_blank'] )?>" class="sidebar-link"><i class="mdi mdi-file"></i><span class="hide-menu">Reportes</span></a></li>

                                <li class="sidebar-item"><a href="<?php echo Router::url(['action'=>'index','controller'=>'estadisticas'])?>" class="sidebar-link"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Gráficas</span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-flag-triangle"></i><span class="hide-menu">CENTRO DE ATENCIÓN</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo Router::url(['action'=>'reportes','controller'=>'estadisticas'])?>" class="sidebar-link"><i class="mdi mdi-account-box"></i><span class="hide-menu">Directorio</span></a></li>
                                <li class="sidebar-item"><a href="<?php echo Router::url(['action'=>'index','controller'=>'estadisticas'])?>" class="sidebar-link"><i class="mdi mdi-account-check"></i><span class="hide-menu">Seguimiento</span></a></li>
                            </ul>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">

            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
             <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>

              
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <?php echo $this->Html->script([
     'dashboard/jquery.min.js',
     'dashboard/popper.min.js',
     'dashboard/bootstrap.min.js',
     'dashboard/perfect-scrollbar.jquery.min.js',
     'dashboard/sparkline.js',
     'dashboard/waves.js',
     'dashboard/sidebarmenu.js',
     'dashboard/custom.min.js',
     'dashboard/excanvas.js',
     'dashboard/jquery.flot.js',
     'dashboard/jquery.flot.pie.js',
     'dashboard/jquery.flot.time.js',
     'dashboard/jquery.flot.stack.js',
     'dashboard/jquery.flot.crosshair.js',
     'dashboard/jquery.flot.tooltip.min.js',
     'dashboard/chart-page-init.js',
     'dashboard/datatables.min.js',
     'dashboard/datatable-checkbox-init.js',
     'dashboard/jquery.multicheck.js'
    ]);?>
        <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>

</body>

</html>