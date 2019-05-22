<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Actualizaciones Controller
 *
 * @property \App\Model\Table\ActualizacionesTable $Actualizaciones
 */
class ActualizacionesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CatImportancias', 'CatTipoactualizaciones', 'Sistemas']
        ];
        $actualizaciones = $this->paginate($this->Actualizaciones);

        $this->set(compact('actualizaciones'));
        $this->set('_serialize', ['actualizaciones']);
    }

    /**
     * View method
     *
     * @param string|null $id Actualizacione id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $actualizacione = $this->Actualizaciones->get($id, [
            'contain' => ['CatImportancias', 'CatTipoactualizaciones', 'Sistemas']
        ]);

        $this->set('actualizacione', $actualizacione);
        $this->set('_serialize', ['actualizacione']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $actualizacione = $this->Actualizaciones->newEntity();
        if ($this->request->is('post')) {
            $actualizacione = $this->Actualizaciones->patchEntity($actualizacione, $this->request->getData());
            if ($this->Actualizaciones->save($actualizacione)) {
                $this->Flash->success(__('The actualizacione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The actualizacione could not be saved. Please, try again.'));
        }
        $catImportancias = $this->Actualizaciones->CatImportancias->find('list', ['limit' => 200]);
        $catTipoactualizaciones = $this->Actualizaciones->CatTipoactualizaciones->find('list', ['limit' => 200]);
        $sistemas = $this->Actualizaciones->Sistemas->find('list', ['limit' => 200]);
        $this->set(compact('actualizacione', 'catImportancias', 'catTipoactualizaciones', 'sistemas'));
        $this->set('_serialize', ['actualizacione']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Actualizacione id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $actualizacione = $this->Actualizaciones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $actualizacione = $this->Actualizaciones->patchEntity($actualizacione, $this->request->getData());
            if ($this->Actualizaciones->save($actualizacione)) {
                $this->Flash->success(__('The actualizacione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The actualizacione could not be saved. Please, try again.'));
        }
        $catImportancias = $this->Actualizaciones->CatImportancias->find('list', ['limit' => 200]);
        $catTipoactualizaciones = $this->Actualizaciones->CatTipoactualizaciones->find('list', ['limit' => 200]);
        $sistemas = $this->Actualizaciones->Sistemas->find('list', ['limit' => 200]);
        $this->set(compact('actualizacione', 'catImportancias', 'catTipoactualizaciones', 'sistemas'));
        $this->set('_serialize', ['actualizacione']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Actualizacione id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $actualizacione = $this->Actualizaciones->get($id);
        if ($this->Actualizaciones->delete($actualizacione)) {
            $this->Flash->success(__('The actualizacione has been deleted.'));
        } else {
            $this->Flash->error(__('The actualizacione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
