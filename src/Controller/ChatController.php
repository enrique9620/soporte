<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Chat Controller
 *
 * @property \App\Model\Table\ChatTable $Chat
 */
class ChatController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $chat = $this->paginate($this->Chat);

        $this->set(compact('chat'));
        $this->set('_serialize', ['chat']);
    }

    /**
     * View method
     *
     * @param string|null $id Chat id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $chat = $this->Chat->get($id, [
            'contain' => []
        ]);

        $this->set('chat', $chat);
        $this->set('_serialize', ['chat']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $chat = $this->Chat->newEntity();
        if ($this->request->is('post')) {
            $chat = $this->Chat->patchEntity($chat, $this->request->getData());
            if ($this->Chat->save($chat)) {
                $this->Flash->success(__('The chat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chat could not be saved. Please, try again.'));
        }
        $this->set(compact('chat'));
        $this->set('_serialize', ['chat']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Chat id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $chat = $this->Chat->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $chat = $this->Chat->patchEntity($chat, $this->request->getData());
            if ($this->Chat->save($chat)) {
                $this->Flash->success(__('The chat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chat could not be saved. Please, try again.'));
        }
        $this->set(compact('chat'));
        $this->set('_serialize', ['chat']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Chat id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $chat = $this->Chat->get($id);
        if ($this->Chat->delete($chat)) {
            $this->Flash->success(__('The chat has been deleted.'));
        } else {
            $this->Flash->error(__('The chat could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
