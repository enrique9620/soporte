<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">
    <meta charset="utf-8">
        <title>
           Sistema de Soporte
        </title>
        <!-- BEGIN META -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="your,keywords">
        <meta name="description" content="Short explanation about this website">
        <!-- <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> -->
        <!-- <link href="templates/AdminLTE/dist/css/AdminLTE.css" rel="stylesheet" type="text/css" /> -->
        <link id='theme' rel='stylesheet' />
        <script src="http://localhost:3000/socket.io/socket.io.js"></script>
        <script>
          var socket = io('http://localhost:3000');
          socket.on('news', function (data) {
            console.log(data);
            socket.emit('my other event', { my: 'data' });
          });
        </script>
        <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css
                            (
                                array
                                    (
                                        'metro-ui/metro.css',
                                        'metro-ui/metro-icons.css',
                                        'metro-ui/metro-responsive.css',
                                        // 'metro-ui/metro-schemes.css',
                                        // 'theme-default/bootstrap.css',
                                        // 'theme-default/materialadmin.css',
                                        'theme-default/font-awesome.min.css',
                                        // 'theme-default/material-design-iconic-font.min.css',
                                        // 'theme-default/libs/toastr/toastr.css',s
                                        'theme-default/libs/DataTables/jquery.dataTables.css',
                                        'theme-default/libs/DataTables/TableTools.css',
                                        'templates/AdminLTE/dist/css/AdminLTE.css',
                                        'chat/tipsy.css',
                                        'chat/chat.css', //Scroll
                                        // 'bootstrap.css',
                                    )
                            );
        echo $this->Html->script
                                (
                                    array
                                        (
                                            'libs/jquery/jquery-3.1.0.min.js',
                                            'metro-ui/metro.js',
                                            'helpers/DataTableGenerator.js',
                                            'helpers/ModalGenerator.js',
                                            'helpers/helper.js',
                                            // 'chat/jquery-1.11.3.min.js',
                                            // 'chat/jquery-ui-1.10.4.custom.min.js',
                                            // 'chat/jquery.slimscroll.min.js',
                                            // 'chat/jquery.tipsy.js',
                                            // 'chat/jquery.main.js',
                                            // 'chat/config.js',
                                            // 'chat/i18n_en.js',
                                        )
                                );

        echo $this->Html->script('libs/DataTables/jquery.dataTables.min.js');
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>
    <body>
        <header id="header">
          <style>
          #header {
            position: absolute;
            left: 0;
            right: 0;
            height: 64px;
            z-index: 1005;
            /*background: #ffffff;*/
            /*color: rgba(49, 53, 52, 0.6);*/
            /*-webkit-box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.33);*/
            /*box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.33);*/
            }
            /*.headerbar {
                 position: relative;
                  min-height: 64px;
              }*/
              /*.headerbar::after {
                   clear: both;
               }*/
               /*.headerbar::before, .headerbar::after {
                 content: " ";
                 display: table;
               }*/
               /*#content {
                position: relative;
                width: 100%;
                left: 0;
                padding-top: 64px;
             }*/
             /*css para el menu*/
             /*#menubar .menubar-scroll-panel {
              position: relative;
              padding-top: 70px;
              z-index: 2;
              min-height: 100%;
              }*/
              /*#menubar:before {
                content: '';
                position: absolute;
                left: 0;
                top: 0;
                bottom: 0;
                width: 100%;
                background: #f2f3f3;
                -webkit-box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.33);
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.33);
              }*/
              /*.gui-controls > li {
                    position: relative;
                    margin-bottom: 12px;
                  }
                  .gui-controls li {
                    list-style: none;
                  }
                  .gui-controls {
                     font-size: 12px;
                   }
                   #menubar.menubar-verde {
                      color: rgba(255, 255, 255, 0.55);
                    }
                    #menubar {
                       color: rgba(12, 12, 12, 0.85);
                     }*/
                     html, body {
                         height: 100%;
                     }
                     body {
                     }
                     .page-content {
                         padding-top: 3.125rem;
                         min-height: 100%;
                         height: 100%;
                     }
                     .table .input-control.checkbox {
                         line-height: 1;
                         min-height: 0;
                         height: auto;
                     }
                     @media screen and (max-width: 800px){
                         #cell-sidebar {
                             flex-basis: 52px;
                         }
                         #cell-content {
                             flex-basis: calc(100% - 52px);
                         }
                     }
             /*css para el menu*/
          </style>
          <body>
              <div class="app-bar fixed-top darcula" data-role="appbar">
                  <a class="app-bar-element branding">Sistema de Soporte</a>
                  <span class="app-bar-divider"></span>
                  <ul class="app-bar-menu">
                    <?php $controlador = $this->request->getParam('controller');
                    //echo $controlador;
                    $session = $this->request->session();
                    $url = $this->request->session()->read('url');
                    ?>
                    <?php if ($controlador === 'Bugs'): ?>
                      <li><a href="<?= $url ?>bugs">Reportes abiertos</a></li>
                      <li><a href="<?= $url ?>bugs/finalizados">Reportes Finalizados</a></li>
                      <li><a href="<?= $url ?>bugs/all">Todos los reportes</a></li>
                    <?php endif; ?>
                    <?php if ($controlador === 'Asignados' || $controlador === 'Sistemas'): ?>
                      <li><a href="<?= $url ?>asignados">Supervisores</a></li>
                      <li><a href="<?= $url ?>sistemas">Sistemas</a></li>
                    <?php endif; ?>
                    <?php if ($controlador === 'Actualizaciones'): ?>
                      <li><a href="<?= $url ?>actualizaciones/recientes">Act. Recientes</a></li>
                      <li><a href="<?= $url ?>actualizaciones/add">Nueva Act.</a></li>
                      <li><a href="<?= $url ?>actualizaciones">Todas las Act.</a></li>
                    <?php endif; ?>
                    <?php if ($controlador === 'Estadisticas'): ?>
                      <li><?php echo  $this->Html->link(
                      'Reportes',array ('controller' => 'estadisticas','action' => 'reportes', '_ext' => 'pdf'),
                    array('escape'=>false,'class'=>'', 'target' => '_blank')); ?></li>
                      <li><a href="<?= $url ?>estadisticas">Gráficas</a></li>
                    <?php endif; ?>
                  </ul>

                  <div class="app-bar-element place-right">
                      <span class="dropdown-toggle">
                        <span class="mif-cog"></span> 
                        <?php
                            $session = $this->request->session();
                            //echo "Bienvenido" . "<br>";
                            echo $session->read('User.username');
                        ?>
                      </span>
                      <div class="app-bar-drop-container padding10 place-right no-margin-top block-shadow fg-dark" data-role="dropdown" data-no-close="true" style="width: 220px">
                        <h5 class="text-light"><?php $session = $this->request->session();?></h5>
                          <ul class="unstyled-list fg-dark">
                            <li>
                              <?php echo $this->Html->link
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
                                                  'escape'=>false,
                                                  'class'=>"fg-white1 fg-hover-yellow"
                                              )
                                      );?>
                              <!-- <a href="" class="fg-white3 fg-hover-yellow">Cambiar Contraseña</a> -->
                            </li>
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
                                                'escape'=>false,
                                                'class'=>"fg-white1 fg-hover-yellow"
                                            )
                                    );
                            ?>
                          </li>
                          </ul>
                      </div>
                  </div>
              </div>

              <div class="page-content">
                  <div class="flex-grid no-responsive-future" style="">
                      <div class="row" style="">
                          <div class="cell size-x200" id="cell-sidebar" style="background-color: #71b1d1;height:100vh; position: fixed;">
                              <ul class="sidebar">
                                  <li><a href="<?= $url ?>Inicio">
                                      <span class="mif-apps icon"></span>
                                      <span class="title">Inicio</span>
                                      <!-- <span class="counter">0</span> -->
                                  </a></li>
                                  <li><a href="<?= $url ?>bugs/all">
                                      <span class="mif-bug icon"></span>
                                      <span class="title">Reportes</span>
                                      <!-- <span class="counter">0</span> -->
                                  </a></li>
                                  <li><a href="<?= $url ?>actualizaciones">
                                      <span class="mif-download2 icon"></span>
                                      <span class="title">Actualizaciones</span>
                                      <!-- <span class="counter">2</span> -->
                                  </a></li>
                                  <li><a href="<?= $url ?>asignados">
                                      <span class="mif-cogs icon"></span>
                                      <span class="title">Configuración</span>
                                      <!-- <span class="counter">0</span> -->
                                  </a></li>
                                  <li><a href="<?= $url ?>estadisticas">
                                      <span class="mif-chart-bars icon"></span>
                                      <span class="title">Estadísticas</span>
                                      <!-- <span class="counter">0</span> -->
                                  </a></li>
                              </ul>
                          </div>
                          <style type="text/css">
                            @media only screen and (max-width: 800px) {
                                #cuerpoSistema {
                                    margin-left: 50px;
                                }
                            }
                            @media only screen and (min-width: 800px) {
                                #cuerpoSistema {
                                    margin-left: 200px;
                                }
                            }
                          </style>
                          <div style=" width: 100%;" id="cuerpoSistema">
                            <?= $this->Flash->render() ?>
                            <?= $this->fetch('content') ?>
                          </div>
                          
                      </div>
                  </div>
              </div>
              
          <!-- </div> -->
        <?php
        echo $this->Html->script
                                (
                                    array
                                        (
                                            'libs/jquery/jquery-3.1.0.min.js',
                                            // 'libs/jquery/jquery-migrate-1.2.1.min.js',
                                            // 'libs/bootstrap/bootstrap.min.js',
                                            // 'libs/spin.js/spin.min.js',
                                            // 'libs/jquery/jquery-3.1.0.min.js',
                                            // 'libs/metro-ui/metro.js',
                                            // 'libs/autosize/jquery.autosize.min.js',
                                            // 'libs/nanoscroller/jquery.nanoscroller.min.js' ,
                                            // 'core/source/App.js',
                                            // 'core/source/AppNavigation.js',
                                            // 'core/source/AppOffcanvas.js',
                                            // 'core/source/AppCard.js',
                                            // 'core/source/AppForm.js',
                                            // 'core/source/AppNavSearch.js',
                                            // 'core/source/AppVendor.js',
                                            // 'libs/toastr/toastr.js',
                                            //'core/demo/Demo.js',
                                        )
                                );
        ?>
    </body>
