<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tablaprueba Controller
 *
 * @property \App\Model\Table\TablapruebaTable $Tablaprueba
 */
class TablapruebaController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->layout = 'dashboard';
        $tablaprueba = $this->paginate($this->Tablaprueba);

        $this->set(compact('tablaprueba'));
        $this->set('_serialize', ['tablaprueba']);
    }

    /**
     * View method
     *
     * @param string|null $id Tablaprueba id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tablaprueba = $this->Tablaprueba->get($id, [
            'contain' => []
        ]);

        $this->set('tablaprueba', $tablaprueba);
        $this->set('_serialize', ['tablaprueba']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tablaprueba = $this->Tablaprueba->newEntity();
        if ($this->request->is('post')) {
            $tablaprueba = $this->Tablaprueba->patchEntity($tablaprueba, $this->request->getData());
            if ($this->Tablaprueba->save($tablaprueba)) {
                $this->Flash->success(__('The tablaprueba has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tablaprueba could not be saved. Please, try again.'));
        }
        $this->set(compact('tablaprueba'));
        $this->set('_serialize', ['tablaprueba']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tablaprueba id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tablaprueba = $this->Tablaprueba->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tablaprueba = $this->Tablaprueba->patchEntity($tablaprueba, $this->request->getData());
            if ($this->Tablaprueba->save($tablaprueba)) {
                $this->Flash->success(__('The tablaprueba has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tablaprueba could not be saved. Please, try again.'));
        }
        $this->set(compact('tablaprueba'));
        $this->set('_serialize', ['tablaprueba']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tablaprueba id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tablaprueba = $this->Tablaprueba->get($id);
        if ($this->Tablaprueba->delete($tablaprueba)) {
            $this->Flash->success(__('The tablaprueba has been deleted.'));
        } else {
            $this->Flash->error(__('The tablaprueba could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
