<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ActualizacionesAnexos Controller
 *
 * @property \App\Model\Table\ActualizacionesAnexosTable $ActualizacionesAnexos
 */
class ActualizacionesAnexosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Actualizaciones']
        ];
        $actualizacionesAnexos = $this->paginate($this->ActualizacionesAnexos);

        $this->set(compact('actualizacionesAnexos'));
        $this->set('_serialize', ['actualizacionesAnexos']);
    }

    //metodo para subir imagen


    /**
     * View method
     *
     * @param string|null $id Actualizaciones Anexo id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $actualizacionesAnexo = $this->ActualizacionesAnexos->get($id, [
            'contain' => ['Actualizaciones']
        ]);

        $this->set('actualizacionesAnexo', $actualizacionesAnexo);
        $this->set('_serialize', ['actualizacionesAnexo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    // public function add()
    // {
    //     $actualizacionesAnexo = $this->ActualizacionesAnexos->newEntity();
    //     if ($this->request->is('post')) {
    //         $actualizacionesAnexo = $this->ActualizacionesAnexos->patchEntity($actualizacionesAnexo, $this->request->getData());
    //         if ($this->ActualizacionesAnexos->save($actualizacionesAnexo)) {
    //             $this->Flash->success(__('The actualizaciones anexo has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The actualizaciones anexo could not be saved. Please, try again.'));
    //     }
    //     $actualizaciones = $this->ActualizacionesAnexos->Actualizaciones->find('list', ['limit' => 200]);
    //     $this->set(compact('actualizacionesAnexo', 'actualizaciones'));
    //     $this->set('_serialize', ['actualizacionesAnexo']);
    // }
    public function add()
    {
        $actualizacionesAnexo = $this->ActualizacionesAnexos->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data2 = $this->request->getData();
            if ($this->request->getData()['imagen_nueva']['error'] == 0 &&  $this->request->getData()['imagen_nueva']['size'] > 0){
                //nueva imagen
                $archivo                       = $this->request->getData()['imagen_nueva'];
                $archivotmp                    = $this->request->getData()['imagen_nueva']['tmp_name'];
                $tamanio          = $this->request->getData()['imagen_nueva']['size'];
                $tipo             = $this->request->getData()['imagen_nueva']['type'];
                $nombre           = $this->request->getData()['imagen_nueva']['name'];
                $fp               = fopen($archivotmp, "rb");
                $contenido        = fread($fp, $tamanio);
                $contenido        = addslashes($contenido);
                fclose($fp);
                //imagen vieja
                $archivo2                       = $this->request->getData()['imagen_anterior'];
                $archivotmp2                    = $this->request->getData()['imagen_anterior']['tmp_name'];
                $tamanio2          = $this->request->getData()['imagen_anterior']['size'];
                $tipo2             = $this->request->getData()['imagen_anterior']['type'];
                $nombre2           = $this->request->getData()['imagen_anterior']['name'];
                $fp2               = fopen($archivotmp2, "rb");
                $contenido2        = fread($fp2, $tamanio2);
                $contenido2        = addslashes($contenido2);
                fclose($fp2);
                //fin imagen vieja
                $archivo = file_get_contents($this->request->getData()['imagen_nueva']['tmp_name']);
                $archivo2 = file_get_contents($this->request->getData()['imagen_anterior']['tmp_name']);
                $data['imagen_nueva'] = 'data:' . $tipo . ';base64,' . base64_encode($archivo);
                $data['imagen_anterior'] = 'data:' . $tipo2 . ';base64,' . base64_encode($archivo2);
                $data['tipo'] = $tipo;
                $data['tamano'] = $tamanio;
            }else{
                $data['imagen_nueva'] = null;
                $data2['imagen_anterior'] = null;
                $data['tipo'] = null;
                $data['tamano'] = null;
            }
            $actualizacionesAnexo = $this->ActualizacionesAnexos->patchEntity($actualizacionesAnexo, $data);
            if($this->ActualizacionesAnexos->save($actualizacionesAnexo)){
                 $this->Flash->success(__('El registro fue guardado satisfactoriamente.'),['params'=>['class'=>'alert alert-success']]);
                //return $this->redirect(['action' => 'index'] );   
                return $this->redirect(['action' => 'index'] );            
            }else{
                $this->Flash->error(__('El registro no pudo ser guardado. Por favor, intentelo nuevamente.'),['params'=>['class'=>'alert alert-danger']]);
            }
        }
            ///parte del metodo
        $actualizaciones = $this->ActualizacionesAnexos->Actualizaciones->find('list', ['limit' => 200]);
        $this->set(compact('actualizacionesAnexo', 'actualizaciones'));
        $this->set('_serialize', ['actualizacionesAnexo']);
    }
    /**
     * Edit method
     *
     * @param string|null $id Actualizaciones Anexo id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $actualizacionesAnexo = $this->ActualizacionesAnexos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $actualizacionesAnexo = $this->ActualizacionesAnexos->patchEntity($actualizacionesAnexo, $this->request->getData());
            if ($this->ActualizacionesAnexos->save($actualizacionesAnexo)) {
                $this->Flash->success(__('The actualizaciones anexo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The actualizaciones anexo could not be saved. Please, try again.'));
        }
        $actualizaciones = $this->ActualizacionesAnexos->Actualizaciones->find('list', ['limit' => 200]);
        $this->set(compact('actualizacionesAnexo', 'actualizaciones'));
        $this->set('_serialize', ['actualizacionesAnexo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Actualizaciones Anexo id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $actualizacionesAnexo = $this->ActualizacionesAnexos->get($id);
        if ($this->ActualizacionesAnexos->delete($actualizacionesAnexo)) {
            $this->Flash->success(__('The actualizaciones anexo has been deleted.'));
        } else {
            $this->Flash->error(__('The actualizaciones anexo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
