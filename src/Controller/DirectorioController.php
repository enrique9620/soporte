<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Routing\Router;

/**
 * Directorio Controller
 *
 * @property \App\Model\Table\DirectorioTable $Directorio
 */
class DirectorioController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $directorio = $this->Directorio->find('all')->toArray();
        $connection = ConnectionManager::get('voluntarios');
        foreach ($directorio as $key => $direct) {
          $ultima_actualizacion_tmp= new \DateTime($direct['ultima_actualizacion']);
          $fecha_actual = new \DateTime();
          $diferencia = date_diff($ultima_actualizacion_tmp,$fecha_actual);
          $actualizado_hace = $diferencia->format('%d Dias %h Horas %i Minutos');
          $nombre = str_replace(" ", "-", $direct->nombre_completo);
          $nombre = utf8_decode($nombre);
          // obtener nombre de localidad, municipio y estado
          $localidad = $connection->execute('SELECT name , cat_municipio_id  FROM cat_localidades WHERE id ='."'".$direct['id_localidad']."'")->fetchAll('assoc');
          $municipio = $connection->execute('SELECT name , cat_estado_id  FROM cat_municipios WHERE id ='."'".$localidad[0]['cat_municipio_id']."'")->fetchAll('assoc');
          $estado    = $connection->execute('SELECT name , clave, abrev  FROM cat_estados WHERE id ='."'".$municipio[0]['cat_estado_id']."'")->fetchAll('assoc');
          $directorio[$key]['actualizado'] = $actualizado_hace;
          $directorio[$key]['localidad'] = $localidad[0];
          $directorio[$key]['municipio'] = $municipio[0];
          $directorio[$key]['estado'] = $estado[0];
          if ($direct['activo']) {
            $direct['acciones'] = "<div data-role='group' data-group-type='one-state' class='group-of-buttons'>";
            $direct['acciones'] .= "<a href='".Router::url(['action'=>'edit',$direct['id']])."' title='Editar' class='button'><i class='fa fa-pencil'></i></a>";
            $direct['acciones'] .= "<a href='".Router::url(['action'=>'delete',$direct['id']])."' title='Eliminar'  class='button' onclick='return confirmDel();'><i class='fa fa-trash-o'></i></a>";
            $direct['acciones'] .= "<a href='javascript:void(0)' title='Seguimientos' data-toggle='modal' data-target='#mensajes' class='button' data-whatever=".$direct['id']."_".$nombre."><i class='fa fa-tags'></i></a>";
            $direct['acciones'] .= "</div>";
          }else{
            $direct['acciones'] = "<div data-role='group' data-group-type='one-state' class='group-of-buttons'>";
            $direct['acciones'] .= "<a href='".Router::url(['action'=>'activar',$direct['id']])."' title='Activar' class='button'><i class='fa fa-check'></i></a>";            
            $direct['acciones'] .= "</div>";
          }
          $direct['activo'] = ($direct['activo'])?'<span class="label label-success" style="font-size:12px;">Si</span>':
                                              '<span class="label label-danger" style="font-size:12px;">No</span>';

        }

        $this->set(compact('directorio'));
        $this->set('_serialize', ['directorio']);
    }

    public function obtienemunicipios(){
        ini_set('memory_limit', '-1');
        $connection = ConnectionManager::get('voluntarios');
        $id = $_GET['id'];
        // $id = '85055726-f09d-11e7-97a7-00ffb155c11c';
        $municipios = $connection->execute('SELECT id , name  FROM cat_municipios WHERE cat_estado_id ='."'$id'")->fetchAll('assoc');
        foreach ($municipios as $key => $entidad){
              $municipios[$key]['text'] = $entidad['name'];
        }
        echo json_encode($municipios);
        die;
    }

    public function obtienelocalidades(){
      ini_set('memory_limit', '-1');
      $connection = ConnectionManager::get('voluntarios');
      $id = $_GET['id'];
      // $id = 'caf0dcca-f09d-11e7-97a7-00ffb155c11c';
      $localidades = $connection->execute('SELECT id , name  FROM cat_localidades WHERE cat_municipio_id ='."'$id'")->fetchAll('assoc');
      foreach ($localidades as $key => $entidad){
            $localidades[$key]['text'] = $entidad['name'];
      }
      echo json_encode($localidades);
      die;
    }

    /**
     * View method
     *
     * @param string|null $id Directorio id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $directorio = $this->Directorio->get($id, [
            'contain' => []
        ]);

        $this->set('directorio', $directorio);
        $this->set('_serialize', ['directorio']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {   ini_set('memory_limit', '-1');
        $connection = ConnectionManager::get('voluntarios');
        $estados_temp = $connection->execute('SELECT id , name  FROM cat_estados')->fetchAll('assoc');
        $estados = [];
        foreach ($estados_temp as $key => $entidad){
              $estados[$entidad['id']]=$entidad['name']      ;
        }
        $directorio = $this->Directorio->newEntity();
        if ($this->request->is('post')) {
            // $directorio = $this->Directorio->patchEntity($directorio, $this->request->getData());
            $directorio->id_localidad         = $this->request->getData('localidad');
            $directorio->nombre               = $this->eliminar_tildes($this->request->getData('nombre'));
            $directorio->paterno              = $this->eliminar_tildes($this->request->getData('paterno'));
            $directorio->materno              = $this->eliminar_tildes($this->request->getData('materno'));
            $directorio->cargo                = $this->eliminar_tildes($this->request->getData('cargo'));
            $directorio->correo               = strtolower($this->request->getData('correo'));
            $directorio->telefono             = $this->request->getData('telefono');
            $directorio->ultima_actualizacion = date('Y-m-d H:i:s');
            $directorio->activo               = 1;
            if ($this->Directorio->save($directorio)) {
                $this->Flash->success(__('Contacto guardado con éxito'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El contacto no pudo ser guardado, con éxito, por favor intente más tarde'));
        }

        $this->set(compact('directorio','estados'));
        $this->set('_serialize', ['directorio']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Directorio id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $connection = ConnectionManager::get('voluntarios');
        $directorio = $this->Directorio->get($id, [
            'contain' => []
        ]);
        $localidad = $connection->execute('SELECT name , cat_municipio_id  FROM cat_localidades WHERE id ='."'".$directorio['id_localidad']."'")->fetchAll('assoc');
        $municipio = $connection->execute('SELECT name , cat_estado_id, id  FROM cat_municipios WHERE id ='."'".$localidad[0]['cat_municipio_id']."'")->fetchAll('assoc');
        $estado    = $connection->execute('SELECT name , clave, abrev,id  FROM cat_estados WHERE id ='."'".$municipio[0]['cat_estado_id']."'")->fetchAll('assoc');
        $estados_temp = $connection->execute('SELECT id , name  FROM cat_estados')->fetchAll('assoc');
        $directorio['municipio'] = $municipio[0]['id'];
        $directorio['estado'] = $estado[0]['id'];
        $estados = [];
        foreach ($estados_temp as $key => $entidad){
              $estados[$entidad['id']]=$entidad['name']      ;
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $directorio->id_localidad         = $this->request->getData('localidad');
            $directorio->nombre               = $this->eliminar_tildes($this->request->getData('nombre'));
            $directorio->paterno              = $this->eliminar_tildes($this->request->getData('paterno'));
            $directorio->materno              = $this->eliminar_tildes($this->request->getData('materno'));
            $directorio->cargo                = $this->eliminar_tildes($this->request->getData('cargo'));
            $directorio->correo               = strtolower($this->request->getData('correo'));
            $directorio->telefono             = $this->request->getData('telefono');
            if ($this->Directorio->save($directorio)) {
                $this->Flash->success(__('Contacto editado con éxito.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El contacto no pudo ser guardado, por favor intente más tarde'));
        }
        $this->set(compact('directorio','estados'));
        $this->set('_serialize', ['directorio']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Directorio id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        // $this->request->allowMethod(['post', 'delete']);
        $directorio = $this->Directorio->get($id);
        $directorio->activo = 0;
        if ($this->Directorio->save($directorio)) {
            $this->Flash->success(__('Contacto eliminado exitosamente del directorio'));
        } else {
            $this->Flash->error(__('El contacto no pudo ser eliminado del directorio, por favor intente más tarde'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function activar($id = null)
    {
        // $this->request->allowMethod(['post', 'delete']);
        $directorio = $this->Directorio->get($id);
        $directorio->activo = 1;
        if ($this->Directorio->save($directorio)) {
            $this->Flash->success(__('Contacto activado exitosamente para el directorio'));
        } else {
            $this->Flash->error(__('El contacto no pudo ser activado para el directorio, por favor intente más tarde'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
