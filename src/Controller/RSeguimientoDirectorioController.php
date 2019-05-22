<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;

/**
 * RSeguimientoDirectorio Controller
 *
 * @property \App\Model\Table\RSeguimientoDirectorioTable $RSeguimientoDirectorio
 */
class RSeguimientoDirectorioController extends AppController
{
      public function initialize()
    {
        parent::initialize();
        $this->loadModel('Directorio');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $rSeguimientoDirectorio = $this->RSeguimientoDirectorio->find('all',['contain'=>['Directorio','Users']]);
        foreach ($rSeguimientoDirectorio as $key => $seguimiento) {
          if ($seguimiento->activo) {
            $seguimiento['acciones'] = "<div data-role='group' data-group-type='one-state' class='group-of-buttons'>";
            $seguimiento['acciones'] .= "<a href='".Router::url(['action'=>'edit',$seguimiento['id']])."' title='Editar' class='button'><i class='fa fa-pencil'></i></a>";
            if ($seguimiento->archivo) {
              $seguimiento['acciones'] .= "<a href='".Router::url(['action'=>'visualizar',$seguimiento['id']])."' title='Visualizar Imagen' target='_blank' class='button'><i class='fa fa-file-o'></i></a>";
            }
            $seguimiento['acciones'] .= "<a href='".Router::url(['action'=>'delete',$seguimiento['id']])."' title='Eliminar'  class='button' onclick='return confirmDel();'><i class='fa fa-trash-o'></i></a>";
            $seguimiento['acciones'] .= "</div>";
          }else{
              $seguimiento['acciones'] = "<div data-role='group' data-group-type='one-state' class='group-of-buttons'>";
              $seguimiento['acciones'] .= "<a href='".Router::url(['action'=>'activar',$seguimiento['id']])."' title='Activar'  class='button'><i class='fa fa-check'></i></a>";
              $seguimiento['acciones'] .= "</div>";
          }

          $seguimiento['activo'] = ($seguimiento['activo'])?'<span class="label label-success" style="font-size:12px;">Si</span>':
                                              '<span class="label label-danger" style="font-size:12px;">No</span>';
        }
        $this->set(compact('rSeguimientoDirectorio'));
        $this->set('_serialize', ['rSeguimientoDirectorio']);
    }

    /**
     * View method
     *
     * @param string|null $id R Seguimiento Directorio id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rSeguimientoDirectorio = $this->RSeguimientoDirectorio->get($id, [
            'contain' => []
        ]);

        $this->set('rSeguimientoDirectorio', $rSeguimientoDirectorio);
        $this->set('_serialize', ['rSeguimientoDirectorio']);
    }

    public function seguimientos($id = null){
      $id = $_GET["id"];
      // $id = 'c7a09464-29bd-4138-bb60-a1df02d7993e';
      $seguimientos = $this->RSeguimientoDirectorio->find('all',['contain'=>['Users','Directorio']])->where(['id_directorio'=>$id,'RSeguimientoDirectorio.activo'=>1])->order(['RSeguimientoDirectorio.created'=>'ASC']);
      foreach ($seguimientos as $key => $seguimiento) {
        $seguimiento['acciones'] = "<div data-role='group' data-group-type='one-state' class='group-of-buttons'>";
        $seguimiento['acciones'] .= "<a href='".Router::url(['action'=>'visualizar',$seguimiento['id']])."' title='Visualizar' target='_blank' class='button'><i class='fa fa-file-o'></i></a>";
        $seguimiento['acciones'] .= "</div>";
      }
      $this->set(compact('seguimientos'));
    }


    public function visualizar($id){
      $archivo = $this->RSeguimientoDirectorio->get($id);
      $tipo = $archivo->tipo;
      $contenido = stream_get_contents($archivo->archivo);
      header("Content-type: $tipo");
      print $contenido;
      $this->autoRender=false;
    }

    public function agregarSeguimiento(){
      $seguimientos = [];
      if ($this->request->is(['patch', 'post', 'put'])) {
        $rSeguimientoDirectorio = $this->RSeguimientoDirectorio->newEntity();
        $rSeguimientoDirectorio->id_usuario = $this->request->session()->read('Auth.User.id');
        $rSeguimientoDirectorio->id_directorio = $this->request->getData('id_directorio');
        $directorio = $this->Directorio->get($this->request->getData('id_directorio'));
        $directorio->ultima_actualizacion = date('Y-m-d H:i:s');
        $rSeguimientoDirectorio->comentario = $this->eliminar_tildes($this->request->getData('comentario'));
        if ($this->request->data['archivo']['error'] == 0 &&  $this->request->data['archivo']['size'] > 0) {
          $archivotmp                      = $_FILES["archivo"]["tmp_name"];
          $tamanio                         = $_FILES["archivo"]["size"];
          $tipo                            = $_FILES["archivo"]["type"];
          $nombre                          = $_FILES["archivo"]["name"];
          $fp                              = fopen($archivotmp, "rb");
          $contenido                       = fread($fp, $tamanio);
          $contenido                       = addslashes($contenido);
          fclose($fp);
          $rSeguimientoDirectorio->archivo = file_get_contents($this->request->data['archivo']['tmp_name']);
          $rSeguimientoDirectorio->tipo    = $tipo;
        }
        if ($this->RSeguimientoDirectorio->save($rSeguimientoDirectorio)){
          $this->Directorio->save($directorio);
        }
        $seguimientos = $this->RSeguimientoDirectorio->find('all',['contain'=>['Users','Directorio']])->where(['id_directorio'=>$this->request->getData('id_directorio')])->order(['RSeguimientoDirectorio.created'=>'ASC']);
        foreach ($seguimientos as $key => $seguimiento) {
          $seguimiento['acciones'] = "<div data-role='group' data-group-type='one-state' class='group-of-buttons'>";
          $seguimiento['acciones'] .= "<a href='".Router::url(['action'=>'visualizar',$seguimiento['id']])."' title='Visualizar' target='_blank' class='button'><i class='fa fa-file-o'></i></a>";
          $seguimiento['acciones'] .= "</div>";
        }
        }
        $this->set(compact('seguimientos'));
    }


    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rSeguimientoDirectorio = $this->RSeguimientoDirectorio->newEntity();
        if ($this->request->is('post')) {
            $rSeguimientoDirectorio = $this->RSeguimientoDirectorio->patchEntity($rSeguimientoDirectorio, $this->request->getData());
            if ($this->RSeguimientoDirectorio->save($rSeguimientoDirectorio)) {
                $this->Flash->success(__('The r seguimiento directorio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The r seguimiento directorio could not be saved. Please, try again.'));
        }
        $this->set(compact('rSeguimientoDirectorio'));
        $this->set('_serialize', ['rSeguimientoDirectorio']);
    }

    /**
     * Edit method
     *
     * @param string|null $id R Seguimiento Directorio id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rSeguimientoDirectorio = $this->RSeguimientoDirectorio->get($id, [
            'contain' => []
        ]);
        $rSeguimientoDirectorio->comentario = strtoupper(utf8_decode($rSeguimientoDirectorio->comentario));
        $rSeguimientoDirectorio['acciones'] = "<div data-role='group' data-group-type='one-state' class='group-of-buttons'>";
        if ($rSeguimientoDirectorio->archivo) {
          $rSeguimientoDirectorio['acciones'] .= "<a href='".Router::url(['action'=>'visualizar',$rSeguimientoDirectorio['id']])."' title='Visualizar Imagen' target='_blank' class='button '><i class='fa fa-file-o'></i></a>";
        }else{
          $rSeguimientoDirectorio['acciones'] .= "<a href='javascript:void(0)' title='Sin Opciones' class='button primary'><i class='fa fa-ban'></i></a>";
        }
        $rSeguimientoDirectorio['acciones'] .= "</div>";
        if ($this->request->is(['patch', 'post', 'put'])) {
            // $rSeguimientoDirectorio = $this->RSeguimientoDirectorio->patchEntity($rSeguimientoDirectorio, $this->request->getData());
            $rSeguimientoDirectorio->id_usuario = $this->request->getData('id_usuario');
            $rSeguimientoDirectorio->id_directorio = $this->request->getData('id_directorio');
            $rSeguimientoDirectorio->comentario = $this->eliminar_tildes($this->request->getData('comentario'));
            if ($this->request->data['archivo']['error'] == 0 &&  $this->request->data['archivo']['size'] > 0) {
              $archivotmp                      = $_FILES["archivo"]["tmp_name"];
              $tamanio                         = $_FILES["archivo"]["size"];
              $tipo                            = $_FILES["archivo"]["type"];
              $nombre                          = $_FILES["archivo"]["name"];
              $fp                              = fopen($archivotmp, "rb");
              $contenido                       = fread($fp, $tamanio);
              $contenido                       = addslashes($contenido);
              fclose($fp);
              $rSeguimientoDirectorio->archivo = file_get_contents($this->request->data['archivo']['tmp_name']);
              $rSeguimientoDirectorio->tipo    = $tipo;
            }
            if ($this->RSeguimientoDirectorio->save($rSeguimientoDirectorio)) {
                $this->Flash->success(__('Seguimiento editado con éxito'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El seguimiento no pudo ser guardado, por favor intenta más tarde'));
        }
        $this->set(compact('rSeguimientoDirectorio'));
        $this->set('_serialize', ['rSeguimientoDirectorio']);
    }

    /**
     * Delete method
     *
     * @param string|null $id R Seguimiento Directorio id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        // $this->request->allowMethod(['post', 'delete']);
        $rSeguimientoDirectorio = $this->RSeguimientoDirectorio->get($id);
        $rSeguimientoDirectorio->activo = 0;
        if ($this->RSeguimientoDirectorio->save($rSeguimientoDirectorio)) {
            $this->Flash->success(__('El seguimiento fue eliminado con éxito'));
        } else {
            $this->Flash->error(__('El Seguimiento no pudo ser eliminado, por favor intente más tarde.'));
        }
        return $this->redirect(['controller'=>'Directorio','action' => 'index']);
    }

    public function activar($id = null)
    {
        $rSeguimientoDirectorio = $this->RSeguimientoDirectorio->get($id);
        $rSeguimientoDirectorio->activo = 1;
        if ($this->RSeguimientoDirectorio->save($rSeguimientoDirectorio)) {
            $this->Flash->success(__('El seguimiento fue restaurado con éxito'));
        } else {
            $this->Flash->error(__('El Seguimiento no pudo ser restaurado, por favor intente más tarde.'));
        }
        return $this->redirect(['controller'=>'Directorio','action' => 'index']);
    }
}
