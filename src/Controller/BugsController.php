<?php
namespace App\Controller; 

use App\Controller\AppController;
 
/** 
 * Bugs Controller
 *
 * @property \App\Model\Table\BugsTable $Bugs
 */
class BugsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */

    public function initialize()
    {
        parent::initialize();
        //$this->loadModel('Asignados');
        $this->loadModel('Users');
        $this->loadModel('Respuestas');
    }

    public function index()
    {
        $session    = $this->request->session();
        $usuario_id = $session->read('Auth.User.id');
        //$asignado   = $this->Asignados->find()->where(['user_id' => $usuario_id])->first();
        $user = $this->Users->find()->where(['id' => $usuario_id])->first();
        
        //if($usuario_id == '0804e668-b01f-49ec-9107-34006bdc3324'){

         if($usuario_id == 'afcb9208-c3d0-47dd-bf42-da034ed497a9'){
          $bugs = $this->Bugs->find('all', [
            'contain' => ['Sistemas', 'Users']
          ])
          ->where(['activo' => 1]);
        }
        else{
          $bugs = $this->Bugs->find('all', [
            'contain' => ['Sistemas', 'Users']
          ])
          ->where(['activo' => 1, 'users_id' => $user->id]);
        }

        foreach ($bugs as $bug){
            $bug['activo'] = ($bug['activo'])?'<span class="label label-success" style="font-size:12px;">Abierto</span>':
                                                '<span class="label label-danger" style="font-size:12px;">Cerrado</span>';
            if ($bug['leido']==2) {
                $bug['activo'] .= '<span class="label label-warning" style="font-size:12px;">Nuevo</span>';
            }

            $bug['acciones'] = "<div data-role='group' data-group-type='one-state' class='group-of-buttons'>";
            $bug['acciones'] .= "<a href='bugs/view/".$bug['id']."' class='button'><i class='fa fa-eye'  aria-hidden='true'></i></a>";
            $bug['acciones'] .= "<a href='bugs/edit/".$bug['id']."' class='button'><i class='fa fa-user' aria-hidden='true'></i></a>";
            $bug['acciones'] .= "</div>";


        }
        //$asignados = $this->Bugs->Asignados->find('list', ['limit' => 200]);
        $users = $this->Bugs->Users->find('list', ['limit' => 200]);
        $this->set(compact('bugs'));
        $this->set('_serialize', ['bugs']);
    }

    public function all()
    {
        $session    = $this->request->session();
        $usuario_id = $session->read('Auth.User.id');
        // $asignado   = $this->Asignados->find()->where(['user_id' => $usuario_id])->first();
         $users   = $this->Users->find()->where(['id' => $usuario_id])->first();
        if($usuario_id == 'afcb9208-c3d0-47dd-bf42-da034ed497a9'){
          $bugs = $this->Bugs->find('all', [
            'contain' => ['Sistemas', 'Users']
          ]);
        }
        else{
          $bugs = $this->Bugs->find('all', [
            'contain' => ['Sistemas', 'Users']
          ])
          ->where(['users_id' => $users->id]);
        }

        foreach ($bugs as $bug){
            $bug['activo'] = ($bug['activo'])?'<span class="label label-success" style="font-size:12px;">Abierto</span>':
                                                '<span class="label label-danger" style="font-size:12px;">Cerrado</span>';
            if ($bug['leido']==2) {
                $bug['activo'] .= '<span class="label label-warning" style="font-size:12px;">Nuevo</span>';
            }
            $bug['acciones'] = "<div data-role='group' data-group-type='one-state' class='group-of-buttons'>";
            $bug['acciones'] .= "<a href='view/".$bug['id']."' class='button'><i class='fa fa-eye'  aria-hidden='true'></i></a>";
            $bug['acciones'] .= "<a href='edit/".$bug['id']."' class='button'><i class='fa fa-user' aria-hidden='true'></i></a>";
            $bug['acciones'] .= "</div>";


        }
        $asignados = $this->Bugs->Users->find('list', ['limit' => 200]);
        $this->set(compact('bugs'));
        $this->set('_serialize', ['bugs']);
    }

    public function finalizados()
    { 
        
        $session    = $this->request->session();
        $usuario_id = $session->read('Auth.User.id');
        // $asignado   = $this->Asignados->find()->where(['user_id' => $usuario_id])->first();
        $users   = $this->Users->find()->where(['id' => $usuario_id])->first();
        if($usuario_id == 'afcb9208-c3d0-47dd-bf42-da034ed497a9'){
          $bugs = $this->Bugs->find('all', [
              'contain' => ['Sistemas', 'Users']
          ])
          ->where(['activo' => 0]);
        }
        else{
          $bugs = $this->Bugs->find('all', [
            'contain' => ['Sistemas', 'Users']
          ])
          ->where(['activo' => 0, 'users_id' => $users->id]);
        }

        foreach ($bugs as $bug){
            $bug['activo'] = ($bug['activo'])?'<span class="label label-success" style="font-size:12px;">Abierto</span>':
                                                '<span class="label label-danger" style="font-size:12px;">Cerrado</span>';

            $bug['acciones'] = "<div data-role='group' data-group-type='one-state' class='group-of-buttons'>";
            $bug['acciones'] .= "<a href='view/".$bug['id']."' class='button'><i class='fa fa-eye'></i></a>";
            $bug['acciones'] .= "<a href='edit/".$bug['id']."' class='button'><i class='fa fa-user'></i></a>";
            $bug['acciones'] .= "</div>";
        }
        $users = $this->Bugs->Users->find('list', ['limit' => 200]);
        $this->set(compact('bugs'));
        $this->set('_serialize', ['bugs']);
    }

    /**
     * View method
     *
     * @param string|null $id Bug id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    { 
        $bug = $this->Bugs->get($id, [
            'contain' => ['Sistemas', 'Users', 'Respuestas']
        ]);

        foreach ($bug as $value){
            $value['activo'] = ($value['activo'])?'<span class="tag success" style="font-size:12px;">Abierto</span>':
                                                '<span class="tag alert" style="font-size:12px;">Cerrado</span>';
        }

        $this->set('bug', $bug);
        $this->set('_serialize', ['bug']);
    } 
 
    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bug = $this->Bugs->newEntity();
        if ($this->request->is('post')) {
            $bug = $this->Bugs->patchEntity($bug, $this->request->getData());
            if ($this->Bugs->save($bug)) {
                $this->Flash->success(__('The bug has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bug could not be saved. Please, try again.'));
        }
        $sistemas = $this->Bugs->Sistemas->find('list', ['limit' => 200]);
        $asignados = $this->Bugs->Asignados->find('list', ['limit' => 200]);
        $this->set(compact('bug', 'sistemas', 'asignados'));
        $this->set('_serialize', ['bug']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Bug id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bug = $this->Bugs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bug = $this->Bugs->patchEntity($bug, $this->request->getData());
            if ($this->Bugs->save($bug)) {
                $this->Flash->success(__('The bug has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bug could not be saved. Please, try again.'));
        }
        $sistemas = $this->Bugs->Sistemas->find('list', ['limit' => 200]);
        $users = $this->Bugs->Users->find('list', ['limit' => 200]);
        $this->set(compact('bug', 'sistemas', 'users'));
        $this->set('_serialize', ['bug']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Bug id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bug = $this->Bugs->get($id);
        if ($this->Bugs->delete($bug)) {
            $this->Flash->success(__('The bug has been deleted.'));
        } else {
            $this->Flash->error(__('The bug could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function asignar($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        // $bug = $this->Bugs->get($id);
        // if ($this->Bugs->delete($bug)) {
        //     $this->Flash->success(__('The bug has been deleted.'));
        // } else {
        //     $this->Flash->error(__('The bug could not be deleted. Please, try again.'));
        // }

        // return $this->redirect(['action' => 'index']);
    }

    public function enviarcorreo($id = null)
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Max-Age: 1000');
        header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
        $bug_id = $_POST['bug_id'];
        $sistema = $_POST['sistema'];
        $asunto = $_POST['asunto'];
        $descripcion = $_POST['descripcion'];
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $tipo = $_POST['tipo'];

        if ($tipo == "del"){
             $username = 'aplicacionescjqroo@gmail.com';
            $password = 'Tr1bunal11';
              // }
            $para = $correo;
            $de = $username;
            $subject = 'Reporte finalizado: ' .$asunto. ' en '.$sistema;
             $message = "DATOS DEL REPORTE: \nAsunto: ".$asunto. "\nDescripción: " .$descripcion. "\nGenerado por: " .$nombre. "\nTeléfono: " .$telefono."\n\n Reporte finalizado.";
            if($this->sendEmail($username, $password, $para, $de, $subject, $message)){
                //echo "ok";
            }else{
                echo "Error al enviar email";
            }
        }
        else {
            $username = 'aplicacionescjqroo@gmail.com';
            $password = 'Tr1bunal11';
              // }
            $para = $correo;
            $de = $username;
            $subject = 'Respuesta de supervisor, reporte: ' .$asunto. ' en '.$sistema;
              $message = "DATOS DEL REPORTE: \nAsunto: ".$asunto. "\nDescripción: " .$descripcion. "\nGenerado por: " .$nombre. "\nTeléfono: " .$telefono."\n\n Favor de iniciar sesión en el sistema para visualizar respuesta.";
            if($this->sendEmail($username, $password, $para, $de, $subject, $message)){
                //echo "ok";
            }else{
                echo "Error al enviar email";
            }
        }
        $this->autoRender = false;
        //return $this->redirect(['action' => 'index']);

    }
}
