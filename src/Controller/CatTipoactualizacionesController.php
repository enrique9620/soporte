<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CatTipoactualizaciones Controller
 *
 * @property \App\Model\Table\CatTipoactualizacionesTable $CatTipoactualizaciones
 */
class CatTipoactualizacionesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $catTipoactualizaciones = $this->paginate($this->CatTipoactualizaciones);

        $this->set(compact('catTipoactualizaciones'));
        $this->set('_serialize', ['catTipoactualizaciones']);
    }

    /**
     * View method
     *
     * @param string|null $id Cat Tipoactualizacione id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $catTipoactualizacione = $this->CatTipoactualizaciones->get($id, [
            'contain' => []
        ]);

        $this->set('catTipoactualizacione', $catTipoactualizacione);
        $this->set('_serialize', ['catTipoactualizacione']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $catTipoactualizacione = $this->CatTipoactualizaciones->newEntity();
        if ($this->request->is('post')) {
            $catTipoactualizacione = $this->CatTipoactualizaciones->patchEntity($catTipoactualizacione, $this->request->getData());
            if ($this->CatTipoactualizaciones->save($catTipoactualizacione)) {
                $this->Flash->success(__('The cat tipoactualizacione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cat tipoactualizacione could not be saved. Please, try again.'));
        }
        $this->set(compact('catTipoactualizacione'));
        $this->set('_serialize', ['catTipoactualizacione']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cat Tipoactualizacione id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $catTipoactualizacione = $this->CatTipoactualizaciones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $catTipoactualizacione = $this->CatTipoactualizaciones->patchEntity($catTipoactualizacione, $this->request->getData());
            if ($this->CatTipoactualizaciones->save($catTipoactualizacione)) {
                $this->Flash->success(__('The cat tipoactualizacione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cat tipoactualizacione could not be saved. Please, try again.'));
        }
        $this->set(compact('catTipoactualizacione'));
        $this->set('_serialize', ['catTipoactualizacione']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cat Tipoactualizacione id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $catTipoactualizacione = $this->CatTipoactualizaciones->get($id);
        if ($this->CatTipoactualizaciones->delete($catTipoactualizacione)) {
            $this->Flash->success(__('The cat tipoactualizacione has been deleted.'));
        } else {
            $this->Flash->error(__('The cat tipoactualizacione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
