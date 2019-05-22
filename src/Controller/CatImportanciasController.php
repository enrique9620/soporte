<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CatImportancias Controller
 *
 * @property \App\Model\Table\CatImportanciasTable $CatImportancias
 */
class CatImportanciasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $catImportancias = $this->paginate($this->CatImportancias);

        $this->set(compact('catImportancias'));
        $this->set('_serialize', ['catImportancias']);
    }

    /**
     * View method
     *
     * @param string|null $id Cat Importancia id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $catImportancia = $this->CatImportancias->get($id, [
            'contain' => []
        ]);

        $this->set('catImportancia', $catImportancia);
        $this->set('_serialize', ['catImportancia']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $catImportancia = $this->CatImportancias->newEntity();
        if ($this->request->is('post')) {
            $catImportancia = $this->CatImportancias->patchEntity($catImportancia, $this->request->getData());
            if ($this->CatImportancias->save($catImportancia)) {
                $this->Flash->success(__('The cat importancia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cat importancia could not be saved. Please, try again.'));
        }
        $this->set(compact('catImportancia'));
        $this->set('_serialize', ['catImportancia']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cat Importancia id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $catImportancia = $this->CatImportancias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $catImportancia = $this->CatImportancias->patchEntity($catImportancia, $this->request->getData());
            if ($this->CatImportancias->save($catImportancia)) {
                $this->Flash->success(__('The cat importancia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cat importancia could not be saved. Please, try again.'));
        }
        $this->set(compact('catImportancia'));
        $this->set('_serialize', ['catImportancia']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cat Importancia id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $catImportancia = $this->CatImportancias->get($id);
        if ($this->CatImportancias->delete($catImportancia)) {
            $this->Flash->success(__('The cat importancia has been deleted.'));
        } else {
            $this->Flash->error(__('The cat importancia could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
