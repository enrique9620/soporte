<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Respuestas Controller
 *
 * @property \App\Model\Table\RespuestasTable $Respuestas
 *
 * @method \App\Model\Entity\Respuesta[] paginate($object = null, array $settings = [])
 */
class RespuestasController extends AppController
{
        public function initialize()
    {
        parent::initialize();
        $this->loadModel('Bugs');
        $this->loadModel('RespuestaAnexos');

    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Bugs', 'Estadopeticiones', 'Users']
        ];
        $respuestas = $this->paginate($this->Respuestas);

        $this->set(compact('respuestas'));
        $this->set('_serialize', ['respuestas']);
    }

    /**
     * View method
     *
     * @param string|null $id Respuesta id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $respuesta = $this->Respuestas->get($id, [
            'contain' => ['Bugs', 'Estadopeticiones', 'Users', 'RespuestaAnexos']
        ]);

        $this->set('respuesta', $respuesta);
        $this->set('_serialize', ['respuesta']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    // public function add()
    // {
    //     $respuesta = $this->Respuestas->newEntity();
    //     if ($this->request->is('post')) {
    //         $respuesta = $this->Respuestas->patchEntity($respuesta, $this->request->getData());;
    //         if ($this->Respuestas->save($respuesta)) {
    //             $this->Flash->success(__('The respuesta has been saved.'));
                 
    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The respuesta could not be saved. Please, try again.'));
    //     }
    //     $bugs = $this->Respuestas->Bugs->find('list', ['limit' => 200]);
    //     $estadopeticiones = $this->Respuestas->Estadopeticiones->find('list', ['limit' => 200]);
    //     $users = $this->Respuestas->Users->find('list', ['limit' => 200]);
    //     $this->set(compact('respuesta', 'bugs', 'estadopeticiones', 'users'));
    //     $this->set('_serialize', ['respuesta']);
    // }

    //     public function add()
    // {
    //     $respuestaAnexo = $this->RespuestaAnexos->newEntity();
    //     $respuesta = $this->Respuestas->newEntity();
    //     if ($this->request->is('post')) {
    //         $data = $this->request->getData();
    //         if ($this->request->getData()['imagen_nueva']['error'] == 0 &&  $this->request->getData()['imagen_nueva']['size'] > 0){

    //             $archivo                       = $this->request->getData()['imagen_nueva'];
    //             $archivotmp                    = $this->request->getData()['imagen_nueva']['tmp_name'];
    //             $tamanio          = $this->request->getData()['imagen_nueva']['size'];
    //             $tipo             = $this->request->getData()['imagen_nueva']['type'];
    //             $nombre           = $this->request->getData()['imagen_nueva']['name'];
    //             $fp               = fopen($archivotmp, "rb");
    //             $contenido        = fread($fp, $tamanio);
    //             $contenido        = addslashes($contenido);
    //             fclose($fp);
    //             //datos que se guardaran
    //             $archivo = file_get_contents($this->request->getData()['imagen_nueva']['tmp_name']);
    //             $data['imagen_nueva'] = 'data:' . $tipo . ';base64,' . base64_encode($archivo);
    //             $data['tipo'] = $tipo;
    //             $data['tamano'] = $tamanio;
    //         }
    //         else{
    //             $data['imagen_nueva'] = null;
    //             $data['tipo'] = null;
    //             $data['tamano'] = null;
    //         }

    //         $respuesta = $this->Respuestas->patchEntity($respuesta, $this->request->getData());
    //         $respuestaAnexo = $this->Respuestas->patchEntity($respuestaAnexo, $data);
    //         if ($this->Respuestas->save($respuesta)) {
    //             //obtener id de la respuesta y guardar en respuestaAnexo
    //             $respuestaAnexo['respuesta_id'] = $respuesta->id ;
    //             $this->RespuestaAnexos->save($respuestaAnexo);

    //             $this->Flash->success(__('The respuesta has been saved.'));
                 
    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The respuesta could not be saved. Please, try again.'));
    //     }
    //     $bugs = $this->Respuestas->Bugs->find('list', ['limit' => 200]);
    //     $estadopeticiones = $this->Respuestas->Estadopeticiones->find('list', ['limit' => 200]);
    //     $users = $this->Respuestas->Users->find('list', ['limit' => 200]);
    //     //para imagenes
    //     $respuestas = $this->RespuestaAnexos->Respuestas->find('list', ['limit' => 200]);
    //     $this->set(compact('respuesta', 'bugs', 'estadopeticiones', 'users', 'respuestas'));
    //     $this->set('_serialize', ['respuesta']);
    // }
public function add()
    {
        $respuestaAnexos = $this->RespuestaAnexos->newEntity();
        $respuesta = $this->Respuestas->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
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
                $archivo = file_get_contents($this->request->getData()['imagen_nueva']['tmp_name']);
                $data['imagen'] = 'data:' . $tipo . ';base64,' . base64_encode($archivo);
                $data['tipo'] = $tipo;
                $data['tamano'] = $tamanio;
                // $data['actualizaciones_id'] = $id;
            }else{
                $data['imagen'] = null;
                $data['tipo'] = null;
                $data['tamano'] = null;
            }
            $respuesta = $this->Respuestas->patchEntity($respuesta, $this->request->getData());
            //$respuestaAnexo = $this->RespuestaAnexos->patchEntity($respuestaAnexo, $data);
            $respuestaAnexos = $this->RespuestaAnexos->patchEntity($respuestaAnexos, $data);
            if ($this->Respuestas->save($respuesta)) {
               // obtener id de la actualizacion
              $respuestaAnexos['respuesta_id'] = $respuesta->id ;
                $this->RespuestaAnexos->save($respuestaAnexos);

                $this->Flash->success(__('La Respuesta ha sido guardada.'));

                //return $this->redirect(['action' => 'index']);
                return $this->redirect(['controller' => 'Inicio','action' => 'home']);
            }else{
            $this->Flash->error(__('La Respuesta no pudo ser guardada. Porfavor, Intente nuevamente.'));
            }
        }
        $bugs = $this->Respuestas->Bugs->find('list', ['limit' => 200]);
        $estadopeticiones = $this->Respuestas->Estadopeticiones->find('list', ['limit' => 200]);
        $users = $this->Respuestas->Users->find('list', ['limit' => 200]);
       //para imagenes
        $respuestas = $this->RespuestaAnexos->Respuestas->find('list', ['limit' => 200]);
        $this->set(compact('respuesta', 'bugs', 'estadopeticiones', 'users','respuestas'));
        $this->set('_serialize', ['respuesta']);
    }
    /**
     * Edit method
     *
     * @param string|null $id Respuesta id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $respuesta = $this->Respuestas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $respuesta = $this->Respuestas->patchEntity($respuesta, $this->request->getData());
            if ($this->Respuestas->save($respuesta)) {
                $this->Flash->success(__('The respuesta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The respuesta could not be saved. Please, try again.'));
        }
        $bugs = $this->Respuestas->Bugs->find('list', ['limit' => 200]);
        $estadopeticiones = $this->Respuestas->Estadopeticiones->find('list', ['limit' => 200]);
        $users = $this->Respuestas->Users->find('list', ['limit' => 200]);
        $this->set(compact('respuesta', 'bugs', 'estadopeticiones', 'users'));
        $this->set('_serialize', ['respuesta']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Respuesta id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $respuesta = $this->Respuestas->get($id);
        if ($this->Respuestas->delete($respuesta)) {
            $this->Flash->success(__('The respuesta has been deleted.'));
        } else {
            $this->Flash->error(__('The respuesta could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
