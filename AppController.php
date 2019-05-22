<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    var $components = array('RequestHandler','Session','LdapAuth'=>array
                                            (
                                                'userModel'=>'CoUsuario',
                                                'authenticate' => array
                                                                (
                                                                    'Form' => array
                                                                                (
                                                                                    //Asignacion de campos para el login y la contraseÃƒÆ’Ã‚Â±a, indespensable para el login
                                                                                    'fields' => array('username' => 'login',
                                                                                    'password'=>'password'),
                                                                                    //Modelo que utilizaremos para la autenticacion
                                                                                    'userModel'=>'CoUsuario',
                                                                                    //Condicion de logueo, unicamente se podran loguear los usuarios que esten activos
                                                                                    'scope'=>array('CoUsuario.activo'=>1)
                                                                                )
                                                                ),
                                                //Hacia donde se redirigira para el login
                                                'loginAction'=>array('controller'=>'co_usuarios','action'=>'login'),
                                                //redireccionar
                                                // 'loginRedirect'=>array('controller'=>'Inicio','action'=>'home'),
                                                //Mensaje en caso de login incorrecto
                                                'loginError'=>"Nombre de usuario o contrase&ntilde;a incorrectos"
                                            ));
    var $helpers = array('Ajax');

    public function beforeFilter()
    {
        date_default_timezone_set("America/Bogota");
        //$this->LdapAuth->allow();
        if($this->LdapAuth->loggedIn())
        {
            $this->getMenuBD();
        }
        $this->LdapAuth->authorize = 'Controller';


        $this->obtener_notificaciones();
    }
    // Se Agregan los Logs
    public function registra_logs($controller,$action)
      {
        // usuario y dependencia los puedo recuperar de sesion
        App::import('Model','Logs');
        $thisRegistraLogs = new Logs();
				// $control_cambio = $thisControlAcciones->create();
        //si el usuario tiene el campo "ignora logs" en 1, se ignoran sus movimientos.
        $usuario = $this->Session->read('Auth.User');
        if (isset($usuario)){
          if ($usuario['incognito']) {
            //si esta activada la casilla se ignora, de lo contrario guardamos los movimientos, que este realice
          }else{
            $auditoria = $thisRegistraLogs->create();
            $auditoria['usuario_id'] = $usuario['id'];
            $auditoria['usuario'] = $usuario['login'];
            $auditoria['responsable'] = $usuario['nombre_completo'];
            // print_r(var_dump($usuario['CatArea']['id']));
            // die;
            if ($usuario['CatArea']['id'] != NULL) {
              // si tiene dependencia
              $auditoria['dependencia_id'] = $usuario['CatArea']['id'];
              $auditoria['dependencia'] = $usuario['CatArea']['name'];
            }else {
              // si, no tiene
              $auditoria['dependencia_id'] = NULL;
              $auditoria['dependencia'] = "SIN ÁREA ASIGNADA";
            }
            $auditoria['controlador'] = $controller;
            $auditoria['accion'] = $action;            
            $thisRegistraLogs->save($auditoria);
          }
        }
        // $thisRegistraLogs->save($auditoria);
      }
    // Se Agregan los Logs

    public function obtener_notificaciones()
    {
        //Recuperar id de usuario y direccion
        $co_usuario_id = $this->Session->read('Auth.User.id');
        //Recuperar las notificaciones sin ver
        App::import('Model','NotNotificacione');
        $thisNotNotificacione = new NotNotificacione();
        $thisNotNotificacione->recursive = -1;
        $totalNot = $thisNotNotificacione->find
                (
                    'count',
                    array
                        (
                            'conditions'=>array
                                (
                                    'NotNotificacione.co_usuario_id'=>$co_usuario_id,
                                    'NotNotificacione.visto'=>0,
                                )
                        )
                );
        $notificaciones = $thisNotNotificacione->findAllByCoUsuarioIdAndVisto($co_usuario_id,0,null,'NotNotificacione.id DESC');
        $this->set(compact('notificaciones','totalNot'));
    }

    public function concluir()
    {
        App::import('Model','AudAsunto');
        $thisAudAsunto = new AudAsunto();
        $audAsuntos = $thisAudAsunto->find
                                (
                                    'list',
                                    array
                                        (
                                            'fields'=>array
                                                            (
                                                                'AudAsunto.id',
                                                                'AudAsunto.id',
                                                            ),
                                            'conditions'=>array
                                                            (
                                                                '(SELECT COUNT(*) FROM aud_asuntos_cat_areas WHERE aud_asunto_id = AudAsunto.id) = (SELECT COUNT(*) FROM aud_asuntos_cat_areas WHERE aud_asunto_id = AudAsunto.id AND cat_estado_id = 3)'
                                                            )
                                        )
                                );
        if(!empty($audAsuntos))
        {
            $thisAudAsunto->updateAll(array('AudAsunto.cat_estado_id'=>3),array('AudAsunto.id'=>$audAsuntos));
        }
        //$this->redirect(array('action'=>'index'));
    }

	public function concluir_aud()
    {
        App::import('Model','AudAudiencia');
        $thisAudAsunto = new AudAudiencia();
        $audAsuntos = $thisAudAsunto->find
                                (
                                    'list',
                                    array
                                        (
                                            'fields'=>array
                                                            (
                                                                'AudAudiencia.id',
                                                                'AudAudiencia.id',
                                                            ),
                                            'conditions'=>array
                                                            (
                                                                '(SELECT COUNT(*) FROM aud_asuntos WHERE aud_audiencia_id = AudAudiencia.id) = (SELECT COUNT(*) FROM aud_asuntos WHERE aud_audiencia_id = AudAudiencia.id AND cat_estado_id = 3)'
                                                            )
                                        )
                                );
		pr($audAsuntos);exit;
        if(!empty($audAsuntos))
        {
            $thisAudAsunto->updateAll(array('AudAudiencia.cat_estado_id'=>3),array('AudAudiencia.id'=>$audAsuntos));
        }
        //$this->redirect(array('action'=>'index'));
    }

    public function _getMetodos()
    {
        //Recuperar el nombre del controlador enviado desde el formulario
            $Controlador = 'servicios';
            //Establecer el nombre del controlador para la tabla de permisos
            $controllerName = strtolower($Controlador);
            //Importar el controlador
            App::import('Controller',$Controlador);
            //Agregar el posfilo Controller para instanciar la clase
            $Controlador .= 'Controller';
            //Crear la instancia del objeto
            $thisObjeto = new $Controlador;
            //Recuperar los metodos del objeto
            $metodosControllerTmp = $thisObjeto->methods;
            //Ordenarlos
            sort($metodosControllerTmp,SORT_ASC);
            //Acomodar el arreglo para poder eliminar los metodos del appController
            $metodosController['*'] = '*';
            foreach($metodosControllerTmp as $key => $value)
            {
                $metodosController[$value] = $value;
            }
            //Obtener los metodos del AppController
            $metodosAppController = $this->__getAppMethods();
            //Borrarlos de los metodos del controlador solicitado
            foreach($metodosAppController as $key => $value)
            {
                unset($metodosController[$value]);
            }
        return $metodosController;
    }

    public function isAuthorized()
    {
        return $this->__permitted($this->name,$this->action);
    }

    public function __permitted($controller,$action)
    {
        //Convertimos a minisculas tanto el nombre del controlador como la accion llamada
        $controllerName = strtolower($controller);
        $actionName = strtolower($action);

        //Asignamos los permisos por default para todo los usuarios
        $Permisos = array('inicio:*','pages:display','cousuarios:logout','cousuarios:cambiar_password','cousuarios:verifica_password');

        //Buscar los permisos, si no es que ya estan en la variable de sesion
        if(!$this->Session->check('permisosApp'))
        {
            App::import('Model','VPermisosGrupo');
            $thisVPermisosGrupo = new VPermisosGrupo();
            $permisos = $thisVPermisosGrupo->find
                                                (
                                                    'list',
                                                    array
                                                        (
                                                            'fields'=>array
                                                                            (
                                                                                'VPermisosGrupo.permiso',
                                                                                'VPermisosGrupo.permiso'
                                                                            ),
                                                            'conditions'=>array
                                                                            (
                                                                                'VPermisosGrupo.co_grupo_id'=>$this->Session->read('Auth.User.co_grupo_id')
                                                                            )
                                                        )
                                                );
            $this->Session->write('permisosApp',$permisos);
            $Permisos = array_merge($Permisos,$permisos);
        }
        else
        {
            $Permisos = array_merge($Permisos,$this->Session->read('permisosApp'));
        }

        //Recorremos el listado de los permisos para determinar si la accion esta permitida
        foreach($Permisos as $Permiso)
        {
            if($Permiso == '*:*')
            {
                return true;//Tiene todas las acciones permitidas
            }
            if($Permiso == $controllerName.":*")
            {
                return true;//Todas las acciones permitidas sobre el controlador
            }
            if($Permiso == $controllerName.':'.$actionName)
            {
                return true;//Permiso especifico
            }
        }
        $this->Session->setFlash('<strong>Acceso Denegado</strong>',"default",array('class'=>'alert alert-danger'));
        return false;
    }

    public function getMenuBD()
    {
        if($this->Session->check('menuApp'))
        {
            return;
        }
        else
        {
            App::import('Model','VMenusPrincipalesGrupo');
            $thisVMenusPrincipalesGrupo = new VMenusPrincipalesGrupo();
            $thisVMenusPrincipalesGrupo->hasMany['MenusHijos']['conditions'] = 'MenusHijos.activo = true AND MenusHijos.id IN(SELECT co_menu_id FROM co_grupos_co_menus WHERE co_grupo_id = '.$this->Session->read('Auth.User.co_grupo_id').')';
            $menus = $thisVMenusPrincipalesGrupo->findAllByCoGrupoId
                                                                    (
                                                                        $this->Session->read('Auth.User.co_grupo_id')
                                                                    );
            App::import('Model','CatArea');
            $thisCatArea = new CatArea();
            $id_area_padre = $this->Session->read('Auth.User.CatArea.id');
            if ($id_area_padre != null && $id_area_padre != '') {
                $total_hijos = $thisCatArea->find('count', array('conditions'=>array('CatArea.id_dependencia_padre ='.$id_area_padre)));
                //
                if ($total_hijos == 0) {
                    foreach ($menus as $key => $value) {
                        if ($value['VMenusPrincipalesGrupo']['id'] == 37) {
                            //echo "ok";
                            unset($menus[$key]);
                        }
                    }
                }
            }else{
                foreach ($menus as $key => $value) {
                        if ($value['VMenusPrincipalesGrupo']['id'] == 37) {
                            //echo "ok";
                            unset($menus[$key]);
                        }
                    }
            }
            $this->Session->write('menuApp',$menus);
        }
    }

    public function enviarCorreo($id = null,$asunto,$contenido,$adjuntos = array())
    {
        if(Configure::read('envio_correos'))
        {
            App::import('Model','CoUsuario');
            $thisCoUsuario = new CoUsuario();
            $coUsuarios = $thisCoUsuario->find
                                            (
                                                'list',
                                                array
                                                    (
                                                        'conditions'=>array
                                                                        (
                                                                            'CoUsuario.cat_area_id IN (SELECT id FROM cat_areas AS ca INNER JOIN aud_asuntos_cat_areas AS aaca ON aaca.cat_area_id = ca.id INNER JOIN aud_asuntos AS aa ON aa.id = aaca.aud_asunto_id WHERE aa.aud_audiencia_id = '.$id.')'
                                                                        )
                                                    )
                                            );
            //pr($coUsuarios);exit;
            //Envio de correo
            //Crear el objeto de correo
            $CakeEmail = new CakeEmail();
            //Setear el formato del correo
            $CakeEmail->emailFormat('html');
            //Setear configuracion
            $CakeEmail->config('smtp');
            //Setear destinatarios
            $CakeEmail->to($para);

            //Setear asunto
            $CakeEmail->subject($asunto);
            //Verificar si hay anexos
            /*if(!empty($adjuntos))
            {
                //Agregar anexo al correo
                $CakeEmail->attachments($adjuntos);
                //$contenido .= "<br /><br /><img src='cid:Anexo{$opeCorreo['OpeCorreo']['id']}' />";
            } */
            //Enviar correo
            $url = Router::url(array('controller'=>'co_usuarios','action'=>'login'),true);
            $contenido .= "<br /><br /><strong>PUEDE INGRESAR AL <a href=\"$url\">SISTEMA DE AUDIENCIAS</a> PARA REVISAR EL ASUNTO TURNADO</strong>";
            $CakeEmail->send($contenido);
        }
    }

    public function enviarCorreoPDF($para, $asunto, $id, $contenido)
    {
        if(Configure::read('envio_correos'))
        {
            // App::import('Model','CoUsuario');
            // $thisCoUsuario = new CoUsuario();
            // $coUsuarios = $thisCoUsuario->find
            //                                 (
            //                                     'list',
            //                                     array
            //                                         (
            //                                             'conditions'=>array
            //                                                             (
            //                                                                 'CoUsuario.cat_area_id IN (SELECT id FROM cat_areas AS ca INNER JOIN aud_asuntos_cat_areas AS aaca ON aaca.cat_area_id = ca.id INNER JOIN aud_asuntos AS aa ON aa.id = aaca.aud_asunto_id WHERE aa.aud_audiencia_id = '.$id.')'
            //                                                             )
            //                                         )
            //                                 );
            //pr($coUsuarios);exit;
            //Envio de correo
            //Crear el objeto de correo
            $CakeEmail = new CakeEmail();
            //Setear el formato del correo
            $CakeEmail->emailFormat('html');
            //Setear configuracion
            $CakeEmail->config('smtp');
            //Setear destinatarios
            $CakeEmail->to($para);

            //Setear asunto
            $CakeEmail->subject($asunto);
            //Verificar si hay anexos
            /*if(!empty($adjuntos))
            {
                //Agregar anexo al correo
                $CakeEmail->attachments($adjuntos);
                //$contenido .= "<br /><br /><img src='cid:Anexo{$opeCorreo['OpeCorreo']['id']}' />";
            } */
            //Enviar correo
            $archivo = 'pdf/'.$id.'.pdf';
            $CakeEmail->attachments($archivo);
            //$url = Router::url(array('controller'=>'co_usuarios','action'=>'login'),true);
            //$contenido .= "<br /><br /><strong>Acuse de registro</strong>";
            $CakeEmail->send($contenido);
        }
    }

    public function eliminar_tildes($text){
      /*$cadena = str_replace(
          array('á', 'é', 'í', 'ó', 'ú'),
          array('Á', 'É', 'Í', 'Ó', 'Ú'),
          $cadena
      );*/

      $text = htmlentities($text, ENT_QUOTES, 'UTF-8');
      $text = strtolower($text);
      $patron = array (
          // Espacios, puntos y comas por guion
          //'/[\., ]+/' => ' ',

          // Vocales
          '/\+/' => '',
          '/&agrave;/' => 'a',
          '/&egrave;/' => 'e',
          '/&igrave;/' => 'i',
          '/&ograve;/' => 'o',
          '/&ugrave;/' => 'u',

          '/&aacute;/' => 'a',
          '/&eacute;/' => 'e',
          '/&iacute;/' => 'i',
          '/&oacute;/' => 'o',
          '/&uacute;/' => 'u',

          '/&acirc;/' => 'a',
          '/&ecirc;/' => 'e',
          '/&icirc;/' => 'i',
          '/&ocirc;/' => 'o',
          '/&ucirc;/' => 'u',

          '/&atilde;/' => 'a',
          '/&etilde;/' => 'e',
          '/&itilde;/' => 'i',
          '/&otilde;/' => 'o',
          '/&utilde;/' => 'u',

          '/&auml;/' => 'a',
          '/&euml;/' => 'e',
          '/&iuml;/' => 'i',
          '/&ouml;/' => 'o',
          '/&uuml;/' => 'u',

          '/&auml;/' => 'a',
          '/&euml;/' => 'e',
          '/&iuml;/' => 'i',
          '/&ouml;/' => 'o',
          '/&uuml;/' => 'u',

          // Otras letras y caracteres especiales
          '/&aring;/' => 'a',
          '/&ntilde;/' => 'Ñ',

          // Agregar aqui mas caracteres si es necesario

      );

      $text = preg_replace(array_keys($patron),array_values($patron),$text);

      $text = strtoupper($text);

      return $text;
    }


}
