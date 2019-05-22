<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Mailer\Email;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'loginRedirect' => [
              'controller' => 'Inicio',
              'action' => 'home'
            ],
            'authError' => 'Careces de permisos necesarios para realizar la acción seleccionada',
            'logoutRedirect' => [
              'controller' => 'Users',
              'action' => 'login',
              'home'
            ]
        ]);

        $session = $this->request->session();
        $session->write([
          'url' => 'http://localhost/soporteRemake/',
        ]);

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

     public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['login']);
    }

    public function sendEmail($username, $password, $para, $de, $subject, $message){
      Email::configTransport('mail', [
        'host' => 'ssl://smtp.gmail.com', //servidor smtp con encriptacion ssl
        'port' => 465, //puerto de conexion
        //'tls' => true, //true en caso de usar encriptacion tls

        //cuenta de correo gmail completa desde donde enviaran el correo
        // 'username' => 'aplicacionescjqroo@gmail.com',
        // 'password' => 'Tr1bunal11', //contrasena

        'username' => $username,
        'password' => $password, //contrasena

        //Establecemos que vamos a utilizar el envio de correo por smtp
        'className' => 'Smtp',

        //evitar verificacion de certificado ssl ---IMPORTANTE---
        'context' => [
          'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
          ]
        ]
      ]);

      $correo = new Email(); //instancia de correo
      $correo
        ->transport('mail') //nombre del configTrasnport que acabamos de configurar
        ->to($para) //correo para
        ->from($de) //correo de
        ->subject($subject);
        //->setAttachments(ROOT.'/webroot/invitacion.pdf'); //asunto;
      //Si se envía el correo reportar como enviado a la bd
      if($correo->send($message)){
          return true;
      }else{
          return false;
      }
    }

    public function eliminar_tildes($cadena){
      //Codificamos la cadena en formato utf8 en caso de que nos de errores
      $cadena = utf8_encode($cadena);
      // //Ahora reemplazamos las letras
      $cadena = str_replace(
          array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
          array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
          $cadena
      );

      $cadena = str_replace(
          array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
          array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
          $cadena );

      $cadena = str_replace(
          array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
          array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
          $cadena );

      $cadena = str_replace(
          array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
          array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
          $cadena );

      $cadena = str_replace(
          array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
          array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
          $cadena );

      $cadena = str_replace(
          array('ñ', 'Ñ', 'ç', 'Ç'),
          array('n', 'N', 'c', 'C'),
          $cadena
      );
      $cadena = str_replace(
          array('á', 'é', 'í', 'ó', 'ú'),
          array('Á', 'É', 'Í', 'Ó', 'Ú'),
          $cadena
      );
      $cadena = strtoupper($cadena);
      return $cadena;
    }

}
