<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Asignados Controller
 *
 * @property \App\Model\Table\AsignadosTable $Asignados
 */
class AsignadosController extends AppController
{


    public function initialize()
     {
         parent::initialize();
         $this->loadModel('Users');
     }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        //$this->layout = 'dashboard';
        $asignados = $this->Asignados->find('all', [
            'contain' => ['users']
        ]);
        // $this->paginate = [
        //     'contain' => ['Users']
        // ];
        // $asignados = $this->paginate($this->Asignados);


         foreach ($asignados as $asignado){
            $asignado['acciones'] = "<div data-role='group' data-group-type='one-state' class='group-of-buttons'>";
            // $asignado['acciones'] .= "<a href='asignados/view/".$asignado['id']."' class='button'><i class='fa fa-eye'></i></a>";
            $asignado['acciones'] .= "<a href='asignados/edit/".$asignado['id']."' class='button'><i class='fa fa-pencil'></i></a>";
            $asignado['acciones'] .= "</div>";
        }



            $this->set(compact('asignados'));
            $this->set('_serialize', ['asignados']);
    }

    /**
     * View method
     *
     * @param string|null $id Asignado id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $asignado = $this->Asignados->get($id, [
            'contain' => ['Users', 'Bugs']
        ]);

        $this->set('asignado', $asignado);
        $this->set('_serialize', ['asignado']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $asignado = $this->Asignados->newEntity();
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            //$asignado = $this->Asignados->patchEntity($asignado, $this->request->getData());
            $user->username = $this->request->getData('username');
            $user->password = $this->request->getData('password');
            if ($this->Users->save($user)) {
                $result = $this->Users->save($user); //Statement as result
                $id =  $result->id;
                $asignado->nombre = $this->request->getData('nombre');
                $asignado->correo = $this->request->getData('correo');
                $asignado->user_id = $id;
                if($this->Asignados->save($asignado)){
                     $this->Flash->success(__('The asignado has been saved.'));

                    return $this->redirect(['action' => 'index']);

                }

            }
            $this->Flash->error(__('The asignado could not be saved. Please, try again.'));
        }
        $users = $this->Asignados->Users->find('list', ['limit' => 200]);
        $this->set(compact('asignado', 'users'));
        $this->set('_serialize', ['asignado']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Asignado id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $asignado = $this->Asignados->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $asignado = $this->Asignados->patchEntity($asignado, $this->request->getData());
            if ($this->Asignados->save($asignado)) {
                $this->Flash->success(__('El registro ha sido actualizado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The asignado could not be saved. Please, try again.'));
        }
        $users = $this->Asignados->Users->find('list', ['limit' => 200]);
        $this->set(compact('asignado', 'users'));
        $this->set('_serialize', ['asignado']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Asignado id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $asignado = $this->Asignados->get($id);
        if ($this->Asignados->delete($asignado)) {
            $this->Flash->success(__('The asignado has been deleted.'));
        } else {
            $this->Flash->error(__('The asignado could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
