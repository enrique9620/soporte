<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Estadopeticiones Controller
 *
 * @property \App\Model\Table\EstadopeticionesTable $Estadopeticiones
 */
class EstadopeticionesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $estadopeticiones = $this->paginate($this->Estadopeticiones);

        $this->set(compact('estadopeticiones'));
        $this->set('_serialize', ['estadopeticiones']);
    }

    /**
     * View method
     *
     * @param string|null $id Estadopeticione id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $estadopeticione = $this->Estadopeticiones->get($id, [
            'contain' => []
        ]);

        $this->set('estadopeticione', $estadopeticione);
        $this->set('_serialize', ['estadopeticione']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $estadopeticione = $this->Estadopeticiones->newEntity();
        if ($this->request->is('post')) {
            $estadopeticione = $this->Estadopeticiones->patchEntity($estadopeticione, $this->request->getData());
            if ($this->Estadopeticiones->save($estadopeticione)) {
                $this->Flash->success(__('The estadopeticione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estadopeticione could not be saved. Please, try again.'));
        }
        $this->set(compact('estadopeticione'));
        $this->set('_serialize', ['estadopeticione']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Estadopeticione id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $estadopeticione = $this->Estadopeticiones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $estadopeticione = $this->Estadopeticiones->patchEntity($estadopeticione, $this->request->getData());
            if ($this->Estadopeticiones->save($estadopeticione)) {
                $this->Flash->success(__('The estadopeticione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estadopeticione could not be saved. Please, try again.'));
        }
        $this->set(compact('estadopeticione'));
        $this->set('_serialize', ['estadopeticione']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Estadopeticione id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $estadopeticione = $this->Estadopeticiones->get($id);
        if ($this->Estadopeticiones->delete($estadopeticione)) {
            $this->Flash->success(__('The estadopeticione has been deleted.'));
        } else {
            $this->Flash->error(__('The estadopeticione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
