<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;


/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    public function initialize()
     {
         parent::initialize();
         $this->loadModel('Users');
         $this->loadModel('Asignados');
     }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
              
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
        //$this->set('_serialize', ['users']);
    }
    public function listado()
    {
              
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
        //$this->set('_serialize', ['users']);
    }
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['logout']);//vista hacia donde debe redirigir
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Asignados']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    public function chat(){
      
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //$this->layout = 'dashboard';
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('El usuario ha sido guardado.'));

                return $this->redirect(['action' => 'listado']);
            }
            $this->Flash->error(__('El usuario no pudo ser guardado.Porfavor intente nuevamente.'));
        }
        $this->set(compact('user'));
        //$this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('El usuario ha sido guardado.'));

                return $this->redirect(['action' => 'listado']);
            }
            $this->Flash->error(__('El usuario no pudo ser guardado.Porfavor intente nuevamente.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'listado']);
    }

        public function login()
    {
      $this->viewBuilder()->layout('login');
      if ($this->request->is('post')) {
          
          $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Tu nombre de usuario o contraseña son incorrectos.');
          
          //Cambio de logueo
          /*$nombreU = $this->request->getData('username');
          $ldappass   = $this->request->getData('password');
          $user = $this->Users->find('all')->select(['id','username','created','modified'])->where(['username'=>$nombreU])->first();
          $user = $user->toArray();
          $this->Auth->setUser($user);
          $session = $this->request->session();
          $session->write([
            'User.id' => $user['id'],
            'User.username' => $user['username'],
          ]);
          $asignado = $this->Asignados->find('all')->select(['id','nombre','correo'])->where(['user_id'=>$user['id']])->first();
          $asignado = $asignado->toArray();
          $session->write([
            'User.correo' => $asignado['correo'],
          ]); */

              return $this->redirect($this->Auth->redirectUrl());

          //Logueo con ldap no funciono en mi localhost
          // $nombreU = $this->request->getData('username');
          // $ldaprdn  = "cn=".$nombreU.',cn=Programadores,ou=SM2,dc=ldap,dc=sm2consultores,dc=com';     // ldap rdn or dn
          // $ldappass   = $this->request->getData('password');
          // $ldapconn = ldap_connect("10.0.0.14") or die('No es posible conectarse');
          // ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
          // if ($ldapconn) {
          //   $ldapbind = @ldap_bind($ldapconn, $ldaprdn, $ldappass);
          //           if ($ldapbind) {
          //               $user = $this->Users->find('all')->select(['id','username','created','modified'])->where(['username'=>$nombreU])->first();
          //               if ($user== NULL) {
          //                 $user = false;
          //                 $this->Flash->error(__('Nombre de usuario o contraseña incorrectos'));
          //               }else {
          //                 $user = $user->toArray();
          //                 $this->Auth->setUser($user);
          //                 $session = $this->request->session();
          //                 $session->write([
          //                   'User.id' => $user['id'],
          //                   'User.username' => $user['username'],
          //                 ]);
          //                     return $this->redirect($this->Auth->redirectUrl());
          //               }
          //           } else {
          //               $user = false;
          //               $this->Flash->error(__('Nombre de usuario o contraseña incorrectos'));
          //           }
          // }

      }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function cambiarPassword($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            //pr($this->request->getData());
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Contraseña actualizada.'));

                return $this->redirect($this->Auth->logout());
            }
            $this->Flash->error(__('No se pudo actualizar la contraseña. Por favor, intente nuevamente.'));
          /*$contraseña_anterior = $this->request->getData('contraseñaAnterior');
          $contraseña_nueva = $this->request->getData('nuevaContrasenia');
          $dn  = "cn=".$user->username.',cn=Programadores,ou=SM2,dc=ldap,dc=sm2consultores,dc=com';     // ldap rdn or dn
          $ldapconn = ldap_connect("10.0.0.14", 389) or die('No es posible conectarse');
          ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
          if ($ldapconn) {
              $ldapbind = @ldap_bind($ldapconn, $dn, $contraseña_anterior);
              if ($ldapbind) {
                  // echo "LDAP bind successful...";
              } else {
                  $this->Flash->success(__('Ha ocurrido un error, por favor, intenta de nuevo.'));
              }
              }
            $newEntry = array('userpassword' => "{MD5}".base64_encode(pack("H*",md5($contraseña_nueva))));
            if(ldap_mod_replace($ldapconn, $dn, $newEntry)){
              $this->Flash->error(__('Contraseña cambiada con éxito'));
              return $this->redirect($this->Auth->logout());

            }else{
              $this->Flash->error(__('Ha ocurrido un error, por favor, intenta de nuevo.'));
            } */
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
}
