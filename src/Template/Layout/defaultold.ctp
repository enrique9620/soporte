<?php use Cake\Routing\Router;?>
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
                                        // 'metro-ui/metro.css',
                                        'metro-ui/metroBootstrap.css',
                                        'metro-ui/metro-icons.css',
                                        // 'metro-ui/metro-responsive.css',
                                        'metro-ui/metro-responsive-bootstrap.css',
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
                                        'bootstrap.css',
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
                                            //chat
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
                    <!-- <?php Router::url(['action'=>'view',$mascota['id']])?> -->
                    <?php $controlador = $this->request->getParam('controller');
                    //echo $controlador;
                    $session = $this->request->session();
                    $url = $this->request->session()->read('url');
                    ?>
                    <?php if ($controlador === 'Bugs'): ?>
                      <li><a href="<?php echo Router::url(['action'=>'index','controller'=>'Bugs'])?>">Reportes abiertos</a></li>
                      <li><a href="<?php echo Router::url(['action'=>'finalizados','controller'=>'Bugs'])?>">Reportes Finalizados</a></li>
                      <li><a href="<?php echo Router::url(['action'=>'all','controller'=>'Bugs'])?>">Todos los reportes</a></li>
                    <?php endif; ?>
                    <?php if ($controlador === 'Asignados' || $controlador === 'Sistemas'): ?>
                      <li><a href="<?php echo Router::url(['action'=>'index','controller'=>'Asignados'])?>">Supervisores</a></li>
                      <li><a href="<?php echo Router::url(['action'=>'index','controller'=>'Sistemas'])?>">Sistemas</a></li>
                    <?php endif; ?>
                    <?php if ($controlador === 'Actualizaciones'): ?>
                      <li><a href="<?php echo Router::url(['action'=>'recientes','controller'=>'Actualizaciones'])?>">Act. Recientes</a></li>
                      <li><a href="<?php echo Router::url(['action'=>'add','controller'=>'Actualizaciones'])?>">Nueva Act.</a></li>
                      <li><a href="<?php echo Router::url(['action'=>'index','controller'=>'Actualizaciones'])?>">Todas las Act.</a></li>
                    <?php endif; ?>
                    <?php if ($controlador === 'Estadisticas'): ?>
                      <li><?php echo  $this->Html->link(
                      'Reportes',array ('controller' => 'estadisticas','action' => 'reportes', '_ext' => 'pdf'),
                    array('escape'=>false,'class'=>'', 'target' => '_blank')); ?></li>
                      <li><a href="<?php echo Router::url(['action'=>'index','controller'=>'Estadisticas'])?>">Gráficas</a></li>
                    <?php endif; ?>

                    <?php if ($controlador === 'Directorio' || $controlador === 'RSeguimientoDirectorio'): ?>
                      <li><a href="<?php echo Router::url(['action'=>'index','controller'=>'Directorio'])?>">Directorio</a></li>
                      <li><a href="<?php echo Router::url(['action'=>'index','controller'=>'RSeguimientoDirectorio'])?>">Seguimientos</a></li>
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
                                  <li><a href="<?php echo Router::url(['action'=>'index','controller'=>'Inicio'])?>">
                                      <span class="mif-apps icon"></span>
                                      <span class="title">Inicio</span>
                                      <!-- <span class="counter">0</span> -->
                                  </a></li>
                                  <li><a href="<?php echo Router::url(['action'=>'all','controller'=>'Bugs'])?>">
                                      <span class="mif-bug icon"></span>
                                      <span class="title">Reportes</span>
                                      <!-- <span class="counter">0</span> -->
                                  </a></li>
                                  <li><a href="<?php echo Router::url(['action'=>'index','controller'=>'Actualizaciones'])?>">
                                      <span class="mif-download2 icon"></span>
                                      <span class="title">Actualizaciones</span>
                                      <!-- <span class="counter">2</span> -->
                                  </a></li>
                                  <li><a href="<?php echo Router::url(['action'=>'index','controller'=>'Asignados'])?>">
                                      <span class="mif-cogs icon"></span>
                                      <span class="title">Configuración</span>
                                      <!-- <span class="counter">0</span> -->
                                  </a></li>
                                  <li><a href="<?php echo Router::url(['action'=>'index','controller'=>'Estadisticas'])?>">
                                      <span class="mif-chart-bars icon"></span>
                                      <span class="title">Estadísticas</span>
                                      <!-- <span class="counter">0</span> -->
                                  </a></li>
                                  <li><a href="<?php echo Router::url(['action'=>'index','controller'=>'Directorio'])?>">
                                      <span class="mif-profile icon"></span>
                                      <span class="title">Directorio</span>
                                      <!-- <span class="counter">0</span> -->
                                  </a></li>
                              </ul>
                          </div>
                          <style type="text/css">
                            @media only screen and (max-width: 800px) {
                                #cuerpoSistema {
                                    margin-left: 55px;
                                }
                            }
                            @media only screen and (min-width: 800px) {
                                #cuerpoSistema {
                                    margin-left: 215px;
                                }
                            }
                          </style>
                          <div style=" width: 100%;" id="cuerpoSistema">
                            <?= $this->Flash->render() ?>
                            <?= $this->fetch('content') ?>

                            <script type="text/javascript">
                              $(document).on('click', '.panel-heading span.icon_minim', function (e) {
                                  var $this = $(this);
                                  if (!$this.hasClass('panel-collapsed')) {
                                      $this.parents('.panel').find('.panel-body').slideUp();
                                      $this.addClass('panel-collapsed');
                                      $this.removeClass('glyphicon-minus').addClass('glyphicon-plus');
                                      // $('.panel-footer').hide();
                                      $this.parents('.panel').find('.panel-footer').hide();
                                  } else {
                                      $this.parents('.panel').find('.panel-body').slideDown();
                                      $this.removeClass('panel-collapsed');
                                      $this.removeClass('glyphicon-plus').addClass('glyphicon-minus');
                                      // $('.panel-footer').show();
                                      $this.parents('.panel').find('.panel-footer').show();
                                  }
                              });
                              $(document).on('focus', '.panel-footer input.chat_input', function (e) {
                                  var $this = $(this);
                                  if ($('#minim_chat_window').hasClass('panel-collapsed')) {
                                      $this.parents('.panel').find('.panel-body').slideDown();
                                      $('#minim_chat_window').removeClass('panel-collapsed');
                                      $('#minim_chat_window').removeClass('glyphicon-plus').addClass('glyphicon-minus');
                                  }
                              });
                              $(document).on('click', '#new_chat', function (e) {
                                  var size = $( ".chat-window:last-child" ).css("margin-left");
                                   size_total = parseInt(size) + 400;
                                  alert(size_total);
                                  var clone = $( "#chat_window_1" ).clone().appendTo( ".container" );
                                  clone.css("margin-left", size_total);
                              });
                              $(document).on('click', '.icon_close', function (e) {
                                  //$(this).parent().parent().parent().parent().remove();
                                  $( "#chat_window_1" ).remove();
                              });


                            </script>

                            <style type="text/css">
                              #chat{
                                  /*height:400px;*/
                                  position: fixed;
                                  bottom: 0;
                                  right: 0;
                              }
                              .col-md-2, .col-md-10{
                                  padding:0;
                              }
                              .panel{
                                  margin-bottom: 0px;
                                  margin-right: 0px;
                              }
                              .chat-window{
                                  bottom:0;
                                  right: 0;
                                  position:fixed;
                                  float:right;
                                  margin-left:10px;
                              }
                              .chat-window > div > .panel{
                                  border-radius: 5px 5px 0 0;
                              }
                              .icon_minim{
                                  padding:2px 10px;
                              }
                              .msg_container_base{
                                background: #e5e5e5;
                                margin: 0;
                                padding: 0 10px 10px;
                                max-height:300px;
                                overflow-x:hidden;
                              }
                              .top-bar {
                                background: #666;
                                color: white;
                                padding: 10px;
                                position: relative;
                                overflow: hidden;
                              }
                              .msg_receive{
                                  padding-left:0;
                                  margin-left:0;
                              }
                              .msg_sent{
                                  padding-bottom:20px !important;
                                  margin-right:0;
                              }
                              .messages {
                                background: white;
                                padding: 10px;
                                border-radius: 2px;
                                box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
                                max-width:100%;
                              }
                              .messages > p {
                                  font-size: 13px;
                                  margin: 0 0 0.2rem 0;
                                }
                              .messages > time {
                                  font-size: 11px;
                                  color: #ccc;
                              }
                              .msg_container {
                                  padding: 10px;
                                  overflow: hidden;
                                  display: flex;
                              }
                              img {
                                  display: block;
                                  width: 100%;
                              }
                              .avatar {
                                  position: relative;
                              }
                              .base_receive > .avatar:after {
                                  content: "";
                                  position: absolute;
                                  top: 0;
                                  right: 0;
                                  width: 0;
                                  height: 0;
                                  border: 5px solid #FFF;
                                  border-left-color: rgba(0, 0, 0, 0);
                                  border-bottom-color: rgba(0, 0, 0, 0);
                              }

                              .base_sent {
                                justify-content: flex-end;
                                align-items: flex-end;
                              }
                              .base_sent > .avatar:after {
                                  content: "";
                                  position: absolute;
                                  bottom: 0;
                                  left: 0;
                                  width: 0;
                                  height: 0;
                                  border: 5px solid white;
                                  border-right-color: transparent;
                                  border-top-color: transparent;
                                  box-shadow: 1px 1px 2px rgba(black, 0.2); // not quite perfect but close
                              }

                              .msg_sent > time{
                                  float: right;
                              }



                              .msg_container_base::-webkit-scrollbar-track
                              {
                                  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
                                  background-color: #F5F5F5;
                              }

                              .msg_container_base::-webkit-scrollbar
                              {
                                  width: 12px;
                                  background-color: #F5F5F5;
                              }

                              .msg_container_base::-webkit-scrollbar-thumb
                              {
                                  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
                                  background-color: #555;
                              }

                              .btn-group.dropup{
                                  position:fixed;
                                  left:0px;
                                  bottom:0;
                              }
                            </style>

                            <?php
                            $sistema = 'admin';
                            $user = $this->request->session()->read('User.username');
                            $date = new DateTime();
                            $date = $date->format('Y-m-d H:i:s');
                            $chats = array();
                            $aux = array(
                              'id' => '001',
                              'from' => 'Ceci',
                              'type' => 'receive',
                              'msj' => 'Hola!',
                              'datetime' => $date,
                            );
                            array_push($chats, $aux);
                            $aux = array(
                              'id' => '002',
                              'from' => 'Ceci',
                              'type' => 'sent',
                              'msj' => 'Si dime...',
                              'datetime' => $date,
                            );
                            array_push($chats, $aux);
                            $aux = array(
                              'id' => '003',
                              'from' => 'Nataly',
                              'type' => 'receive',
                              'msj' => 'Buenas noches',
                              'datetime' => $date,
                            );
                            array_push($chats, $aux);
                            $aux = array(
                              'id' => '004',
                              'from' => 'Nataly',
                              'type' => 'sent',
                              'msj' => 'Hola que tal nat',
                              'datetime' => $date,
                            );
                            array_push($chats, $aux);
                            // print_r($chats);
                            // echo "<br>";

                            if (isset($chats[0]['from'])) {
                              $from = $chats[0]['from'];
                            }

                            $aux = array();
                            $chatFinal = array();
                            foreach ($chats as $key => $chat) {
                              if ($from == $chat['from']) {
                                array_push($aux, $chat);
                              }else{
                                array_push($chatFinal, $aux);
                                $aux = array();
                                array_push($aux, $chat);
                                $from = $chat['from'];
                              }
                            }
                            array_push($chatFinal, $aux);

                            // print_r($chatFinal);
                             ?>
                            <div class="container" id="chat" style="display: none;">
                              <?php
                              $cont = 1;
                              foreach ($chatFinal as $key => $chat) {
                                if ($cont == 1) {
                                   $espace = 10;
                                 }elseif ($cont == 2) {
                                   $espace = 280;
                                 }elseif ($cont == 3) {
                                   $espace = 550;
                                 }elseif ($cont == 4) {
                                   $espace = 820;
                                 } ?>
                                <div class="row chat-window col-xs-5 col-md-3" id="chat_window_<?= $cont; ?>" style="margin-right:<?= $espace; ?>px;">
                                  <div class="col-xs-12 col-md-12">
                                    <div class="panel panel-default">
                                          <div class="panel-heading top-bar">
                                              <div class="col-md-8 col-xs-8">
                                                  <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Chat - <?= $chat[0]['from']; ?></h3>
                                              </div>
                                              <div class="col-md-4 col-xs-4" style="text-align: right;">
                                                  <a href="javascript:;"><span id="minim_chat_window" class="glyphicon icon_minim panel-collapsed glyphicon-plus"></span></a>
                                                  <a href="#"><span class="glyphicon glyphicon-remove icon_close" data-id="chat_window_1"></span></a>
                                              </div>
                                          </div>
                                          <div class="panel-body msg_container_base" style="display: none;">

                                              <?php foreach ($chat as $key => $message) {
                                                    if ($message['type'] == 'sent') { ?>
                                                       <div class="row msg_container base_sent">
                                                          <div class="col-md-10 col-xs-10">
                                                              <div class="messages msg_sent">
                                                                  <p><?= $message['msj']; ?></p>
                                                                  <time datetime="<?= $message['datetime']; ?>">Enviado • <?= $message['datetime']; ?></time>
                                                              </div>
                                                          </div>
                                                          <div class="col-md-2 col-xs-2 avatar">
                                                              <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                                                          </div>
                                                      </div>
                                                     <?php }else{ ?>
                                                        <div class="row msg_container base_receive">
                                                          <div class="col-md-2 col-xs-2 avatar">
                                                              <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                                                          </div>
                                                          <div class="col-md-10 col-xs-10">
                                                              <div class="messages msg_receive">
                                                                  <p><?= $message['msj']; ?></p>
                                                                  <time datetime="<?= $message['datetime']; ?>">Enviado • <?= $message['datetime']; ?></time>
                                                              </div>
                                                          </div>
                                                      </div>
                                                     <?php } ?>

                                              <?php } ?>

                                          </div>
                                          <div class="panel-footer" style="display: none;">
                                              <div class="input-group">
                                                  <input id="btn-input" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." />
                                                  <span class="input-group-btn">
                                                  <button class="btn btn-primary btn-sm" id="btn-chat">Send</button>
                                                  </span>
                                              </div>
                                          </div>
                                  </div>
                                  </div>
                                </div>
                              <?php
                                $cont++;
                              } ?>
                            </div>
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
