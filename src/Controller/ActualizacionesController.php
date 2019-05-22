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

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow('consulta');
        $this->loadModel('ActualizacionesAnexos');

    }

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

        foreach ($actualizaciones as $key => $actualizacion) {
            $CatImportancia = $this->Actualizaciones->CatImportancias->get($actualizacion->cat_importancia_id);
            $actualizacion->cat_importancia_id = $CatImportancia->nombre;

            $Cattipoactualizaciones = $this->Actualizaciones->Cattipoactualizaciones->get($actualizacion->cat_tipoactualizacion_id);
            $actualizacion->cat_tipoactualizacion_id = $Cattipoactualizaciones->nombre;

            $actualizacion['acciones'] = "<div data-role='group' data-group-type='one-state' class='group-of-buttons'>";
            // $actualizacion['acciones'] .= "<a href='actualizacions/view/".$actualizacion['id']."' class='button'><i class='fa fa-eye'  aria-hidden='true'></i></a>";
            $actualizacion['acciones'] .= "<a href='actualizaciones/edit/".$actualizacion->id."' class='button'><i class='fa fa-pencil' aria-hidden='true'></i></a>";
            $actualizacion['acciones'] .= "</div>";
        }

        $this->set(compact('actualizaciones'));
        $this->set('_serialize', ['actualizaciones']);
    }



    public function recientes()
    {
        function check_in_range($start_date, $end_date, $date){
             $start_date = strtotime($start_date);
             $end_date = strtotime($end_date);
             $date = strtotime($date);
             if(($date >= $start_date) && ($date <= $end_date))
                 return true;
             else
                 return false;
        }

        $this->paginate = [
            'contain' => ['CatImportancias', 'CatTipoactualizaciones', 'Sistemas']
        ];
        $actualizaciones = $this->paginate($this->Actualizaciones);

        $fechaAct2 = date('Y-m-d', strtotime('-1 week'));
        $new2 = date('Y-m-d');
        //$cont2 = 0;
        $data2 = array();
        $anioActual2 = date('Y');
        foreach ($actualizaciones as $actualizacione) {
            //CUmple con las condiciones para envío de tarjeta
            $fechaEval2 = $actualizacione->fecha;

            if ($fechaEval2 != null) {
                $date2 = new \DateTime($fechaEval2);

                $dateMD2 = date_format($date2, 'm-d');

                $date2 = date('Y').'-'.$dateMD2;

                if (check_in_range($fechaAct2, $new2, $date2)){
                    $CatImportancia = $this->Actualizaciones->CatImportancias->get($actualizacione->cat_importancia_id);
                    $actualizacione->cat_importancia_id = $CatImportancia->nombre;

                    $Cattipoactualizaciones = $this->Actualizaciones->Cattipoactualizaciones->get($actualizacione->cat_tipoactualizacion_id);
                    $actualizacione->cat_tipoactualizacion_id = $Cattipoactualizaciones->nombre;

                    $actualizacione['acciones'] = "<div data-role='group' data-group-type='one-state' class='group-of-buttons'>";
                    // $actualizacion['acciones'] .= "<a href='actualizacions/view/".$actualizacion['id']."' class='button'><i class='fa fa-eye'  aria-hidden='true'></i></a>";
                    $actualizacione['acciones'] .= "<a href='edit/".$actualizacione->id."' class='button'><i class='fa fa-pencil' aria-hidden='true'></i></a>";
                    $actualizacione['acciones'] .= "</div>";

                    array_push($data2, array(
                                            'nombre' => $actualizacione->descripcion,
                                            'sistema' => $actualizacione->sistema->sistema,
                                            'fecha' => $actualizacione->fecha,
                                            'importancia' => $actualizacione->cat_importancia_id,
                                            'tipo' => $actualizacione->cat_tipoactualizacion_id,
                                            'acciones' => $actualizacione->acciones
                                        ));
                  //$cont2++;
                };
            }

        }
        $actualizaciones = $data2;
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
            'contain' => ['CatImportancias', 'CatTipoactualizaciones']
        ]);

        $this->set('actualizacione', $actualizacione);
        $this->set('_serialize', ['actualizacione']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    // public function add()
    // {
    //   // pr($this->request->getData());
    //   // die;
    //     $actualizacione = $this->Actualizaciones->newEntity();
    //     $actualizacionesAnexo = $this->ActualizacionesAnexos->newEntity();
    //     if ($this->request->is('post')) {
    //         // $data = $this->request->getData();
    //         // $data2 = $this->request->getData();
    //         // if ($this->request->getData()['imagen_nueva']['error'] == 0 &&  $this->request->getData()['imagen_nueva']['size'] > 0){
    //         //     //nueva imagen
    //         //     $archivo                       = $this->request->getData()['imagen_nueva'];
    //         //     $archivotmp                    = $this->request->getData()['imagen_nueva']['tmp_name'];
    //         //     $tamanio          = $this->request->getData()['imagen_nueva']['size'];
    //         //     $tipo             = $this->request->getData()['imagen_nueva']['type'];
    //         //     $nombre           = $this->request->getData()['imagen_nueva']['name'];
    //         //     $fp               = fopen($archivotmp, "rb");
    //         //     $contenido        = fread($fp, $tamanio);
    //         //     $contenido        = addslashes($contenido);
    //         //     fclose($fp);
    //         //     //imagen vieja
    //         //     $archivo2                       = $this->request->getData()['imagen_anterior'];
    //         //     $archivotmp2                    = $this->request->getData()['imagen_anterior']['tmp_name'];
    //         //     $tamanio2          = $this->request->getData()['imagen_anterior']['size'];
    //         //     $tipo2             = $this->request->getData()['imagen_anterior']['type'];
    //         //     $nombre2           = $this->request->getData()['imagen_anterior']['name'];
    //         //     $fp2               = fopen($archivotmp2, "rb");
    //         //     $contenido2        = fread($fp2, $tamanio2);
    //         //     $contenido2        = addslashes($contenido2);
    //         //     fclose($fp2);
    //         //     //fin imagen vieja
    //         //     $archivo = file_get_contents($this->request->getData()['imagen_nueva']['tmp_name']);
    //         //     $archivo2 = file_get_contents($this->request->getData()['imagen_anterior']['tmp_name']);
    //         //     $data['imagen_nueva'] = 'data:' . $tipo . ';base64,' . base64_encode($archivo);
    //         //     $data['imagen_anterior'] = 'data:' . $tipo2 . ';base64,' . base64_encode($archivo2);
    //         //     $data['tipo'] = $tipo;
    //         //     $data['tamano'] = $tamanio;
    //         // }else{
    //         //     $data['imagen_nueva'] = null;
    //         //     $data2['imagen_anterior'] = null;
    //         //     $data['tipo'] = null;
    //         //     $data['tamano'] = null;
    //         // }
    //         // $actualizacionesAnexo = $this->ActualizacionesAnexos->patchEntity($actualizacionesAnexo, $data);
    //         $actualizacione = $this->Actualizaciones->patchEntity($actualizacione, $this->request->getData());
    //         if($this->Actualizaciones->save($actualizacione)){
    //              $this->Flash->success(__('El registro fue guardado satisfactoriamente.'),['params'=>['class'=>'alert alert-success']]);
    //             //return $this->redirect(['action' => 'index'] );   
    //             return $this->redirect(['action' => 'index'] );            
    //         }else{
    //             $this->Flash->error(__('El registro no pudo ser guardado. Por favor, intentelo nuevamente.'),['params'=>['class'=>'alert alert-danger']]);
    //         }
    //     }
    //     $actualizaciones = $this->ActualizacionesAnexos->Actualizaciones->find('list', ['limit' => 200]);
    //     $CatImportancias = $this->Actualizaciones->CatImportancias->find('list', ['limit' => 200]);
    //     $Cattipoactualizaciones = $this->Actualizaciones->CatTipoactualizaciones->find('list', ['limit' => 200]);
    //     $Sistemas = $this->Actualizaciones->Sistemas->find('list', ['limit' => 200]);
    //     $this->set(compact('actualizacione', 'CatImportancias', 'Cattipoactualizaciones', 'Sistemas','actualizacionesAnexo'));
    //     $this->set('_serialize', ['actualizacione']);
    // }
   public function add()
    {
      $actualizacionesAnexo = $this->ActualizacionesAnexos->newEntity();
        $actualizacione = $this->Actualizaciones->newEntity();
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
                // $actualizacione->id;
                // $id= $actualizacione;
                fclose($fp2);
                //fin imagen vieja
                $archivo = file_get_contents($this->request->getData()['imagen_nueva']['tmp_name']);
                $archivo2 = file_get_contents($this->request->getData()['imagen_anterior']['tmp_name']);
                $data['imagen_nueva'] = 'data:' . $tipo . ';base64,' . base64_encode($archivo);
                $data['imagen_anterior'] = 'data:' . $tipo2 . ';base64,' . base64_encode($archivo2);
                $data['tipo'] = $tipo;
                $data['tamano'] = $tamanio;
                // $data['actualizaciones_id'] = $id;
            }else{
                $data['imagen_nueva'] = null;
                $data2['imagen_anterior'] = null;
                $data['tipo'] = null;
                $data['tamano'] = null;
            }
            $actualizacione = $this->Actualizaciones->patchEntity($actualizacione, $this->request->getData());
            $actualizacionesAnexo = $this->ActualizacionesAnexos->patchEntity($actualizacionesAnexo, $data);
            if ($this->Actualizaciones->save($actualizacione)) {
               // obtener id de la actualizacion
              $actualizacionesAnexo['actualizaciones_id'] = $actualizacione->id ;
                $this->ActualizacionesAnexos->save($actualizacionesAnexo);

                $this->Flash->success(__('La actualización ha sido guardada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The actualizacione could not be saved. Please, try again.'));
        }
        $CatImportancias = $this->Actualizaciones->CatImportancias->find('list', ['limit' => 200]);
        $Cattipoactualizaciones = $this->Actualizaciones->CatTipoactualizaciones->find('list', ['limit' => 200]);
        $Sistemas = $this->Actualizaciones->Sistemas->find('list', ['limit' => 200]);
       //para imagenes
        $actualizaciones = $this->ActualizacionesAnexos->Actualizaciones->find('list', ['limit' => 200]);
        $this->set(compact('actualizacione', 'CatImportancias', 'Cattipoactualizaciones', 'Sistemas','actualizaciones'));
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

        // pr($this->request->getData());
        // die;
        if ($this->request->is([ 'post', 'put'])) {

          if(!empty($version_anterior = $this->request->data['cpanterior'])){
            if ($version_anterior['size'] > 0 ) {
                  $im1 = file_get_contents($this->request->data['cpanterior']['tmp_name']);
                  $imdata1 = base64_encode($im1);
                  $actualizacione->version_anterior = "data:image/jpg;base64,".$imdata1;
                }
              }

              if(!empty($version_nueva = $this->request->data['cpnueva'])){
                if ($version_nueva['size'] > 0 ) {
                  $im1 = file_get_contents($this->request->data['cpnueva']['tmp_name']);
                  $imdata1 = base64_encode($im1);
                  $actualizacione->version_actual  = "data:image/jpg;base64,".$imdata1;
                }
              }

                      // pr($actualizacione);
                      // die;
            $actualizacione = $this->Actualizaciones->patchEntity($actualizacione, $this->request->getData());
            if ($this->Actualizaciones->save($actualizacione)) {
                $this->Flash->success(__('La actualización ha sido guardada'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The actualizacione could not be saved. Please, try again.'));
        }
        $CatImportancias = $this->Actualizaciones->CatImportancias->find('list', ['limit' => 200]);
        $Cattipoactualizaciones = $this->Actualizaciones->CatTipoactualizaciones->find('list', ['limit' => 200]);
        $Sistemas = $this->Actualizaciones->Sistemas->find('list', ['limit' => 200]);
        $this->set(compact('actualizacione', 'CatImportancias', 'Cattipoactualizaciones', 'Sistemas'));
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

    public function consulta($sistema = null)
    {
        //Buscar las actualizaciones de la ultima semana del sistema solicitado
        $fechaActual = date('Y-m-d');
        $fechaAnterior = date('Y-m-d',strtotime($fechaActual.' -1 week'));
        $actualizaciones = $this->Actualizaciones->find
                                                    (
                                                        'all'
                                                    )->contain('CatTipoActualizaciones')
                                                    ->contain('CatImportancias')
                                                    ->where(['sistema_id = :sistema AND fecha BETWEEN :start AND :end'])
                                                    ->bind(':sistema', $sistema, 'string')
                                                    ->bind(':start', $fechaAnterior, 'date')
                                                    ->bind(':end',   $fechaActual, 'date');
        $tmp = [];
        $i = 0;
        foreach($actualizaciones as $actualizacion)
        {
            $tmp[$i]['actualizacion'] = $actualizacion->descripcion;
            $tmp[$i]['fecha'] = date('d-m-Y',strtotime($actualizacion->fecha));
            $tmp[$i]['tipo'] = $actualizacion->CatTipoactualizaciones['nombre'];
            $tmp[$i]['importancia'] = $actualizacion->cat_importancia->nombre;
            $i++;
        }
        echo json_encode($tmp);exit;
    }
}
