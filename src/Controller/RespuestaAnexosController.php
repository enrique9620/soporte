<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RespuestaAnexos Controller
 *
 * @property \App\Model\Table\RespuestaAnexosTable $RespuestaAnexos
 *
 * @method \App\Model\Entity\RespuestaAnexo[] paginate($object = null, array $settings = [])
 */
class RespuestaAnexosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Respuestas']
        ];
        $respuestaAnexos = $this->paginate($this->RespuestaAnexos);

        $this->set(compact('respuestaAnexos'));
        $this->set('_serialize', ['respuestaAnexos']);
    }

    /**
     * View method
     *
     * @param string|null $id Respuesta Anexo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $respuestaAnexo = $this->RespuestaAnexos->get($id, [
            'contain' => ['Respuestas']
        ]);
        $this->set('respuestaAnexo', $respuestaAnexo);
        $this->set('_serialize', ['respuestaAnexo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $respuestaAnexo = $this->RespuestaAnexos->newEntity();
        if ($this->request->is('post')) {
            $respuestaAnexo = $this->RespuestaAnexos->patchEntity($respuestaAnexo, $this->request->getData());
            if ($this->RespuestaAnexos->save($respuestaAnexo)) {
                $this->Flash->success(__('The respuesta anexo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The respuesta anexo could not be saved. Please, try again.'));
        }
        $respuestas = $this->RespuestaAnexos->Respuestas->find('list', ['limit' => 200]);
        $this->set(compact('respuestaAnexo', 'respuestas'));
        $this->set('_serialize', ['respuestaAnexo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Respuesta Anexo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $respuestaAnexo = $this->RespuestaAnexos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $respuestaAnexo = $this->RespuestaAnexos->patchEntity($respuestaAnexo, $this->request->getData());
            if ($this->RespuestaAnexos->save($respuestaAnexo)) {
                $this->Flash->success(__('The respuesta anexo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The respuesta anexo could not be saved. Please, try again.'));
        }
        $respuestas = $this->RespuestaAnexos->Respuestas->find('list', ['limit' => 200]);
        $this->set(compact('respuestaAnexo', 'respuestas'));
        $this->set('_serialize', ['respuestaAnexo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Respuesta Anexo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $respuestaAnexo = $this->RespuestaAnexos->get($id);
        if ($this->RespuestaAnexos->delete($respuestaAnexo)) {
            $this->Flash->success(__('The respuesta anexo has been deleted.'));
        } else {
            $this->Flash->error(__('The respuesta anexo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
