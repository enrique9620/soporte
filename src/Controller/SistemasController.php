<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sistemas Controller
 *
 * @property \App\Model\Table\SistemasTable $Sistemas
 */
class SistemasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {    
        // $this->layout = 'dashboard';
        $sistemas = $this->Sistemas->find('all');

        // foreach ($sistemas as $sistema){
        //     $sistema['acciones'] .= "<div data-role='group' data-group-type='one-state' class='group-of-buttons'>";
        //     // $sistema['acciones'] .= "<a href='sistemas/view/".$sistema['id']."' class='button'><i class='fa fa-eye'></i></a>";
        //     $sistema['acciones'] .= "<a href='sistemas/edit/".$sistema['id']."' class='button'><i class='fa fa-pencil'></i></a>";
        //     $sistema['acciones'] .= "</div>";
        // }

        $this->set(compact('sistemas'));
        $this->set('_serialize', ['sistemas']);

    }

    /**
     * View method
     *
     * @param string|null $id Sistema id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sistema = $this->Sistemas->get($id, [
            'contain' => ['Bugs']
        ]);

        $this->set('sistema', $sistema);
        $this->set('_serialize', ['sistema']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sistema = $this->Sistemas->newEntity();
        if ($this->request->is('post')) {
            $sistema = $this->Sistemas->patchEntity($sistema, $this->request->getData());
            if ($this->Sistemas->save($sistema)) {
                $this->Flash->success(__('El sistema ha sido guardado'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sistema could not be saved. Please, try again.'));
        }
        $this->set(compact('sistema'));
        $this->set('_serialize', ['sistema']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sistema id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        //$this->layout = 'defaultold';
        $sistema = $this->Sistemas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sistema = $this->Sistemas->patchEntity($sistema, $this->request->getData());
            if ($this->Sistemas->save($sistema)) {
                $this->Flash->success(__('El sistema ha sido actualizado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sistema could not be saved. Please, try again.'));
        }
        $this->set(compact('sistema'));
        $this->set('_serialize', ['sistema']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sistema id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sistema = $this->Sistemas->get($id);
        if ($this->Sistemas->delete($sistema)) {
            $this->Flash->success(__('The sistema has been deleted.'));
        } else {
            $this->Flash->error(__('The sistema could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
