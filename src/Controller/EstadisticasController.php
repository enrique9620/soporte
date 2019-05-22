<?php
namespace App\Controller;

use App\Controller\AppController;

/** 
 * Actualizaciones Controller
 *
 * @property \App\Model\Table\ActualizacionesTable $Actualizaciones
 */
class EstadisticasController extends AppController
{
    public function initialize()
     {
         parent::initialize();
         $this->loadModel('Actualizaciones');
         $this->loadModel('Bugs');
     }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $bugs = $this->Bugs->find('all', [
            'contain' => ['Sistemas', 'Users']
        ]);

        $bugsAtendidos = $this->Bugs->find('all', [
            'contain' => ['Sistemas', 'Users']
        ])->where(['leido' => 1]);

        $bugsAbiertos = $this->Bugs->find('all', [
            'contain' => ['Sistemas', 'Users']
        ])->where(['activo' => 1]);

        $bugsCerrados = $this->Bugs->find('all', [
            'contain' => ['Sistemas', 'Users']
        ])->where(['activo' => 0]);

        $grafica1 = array(
                        'atendidos' => sizeof($bugsAtendidos->toArray()), 
                        'sinrevisar' => sizeof($bugs->toArray())-sizeof($bugsAtendidos->toArray()), 
                        'total' => sizeof($bugs->toArray()), 
                      );

        $grafica2 = array(
                        'abiertos' => sizeof($bugsAbiertos->toArray()), 
                        'cerrados' => sizeof($bugsCerrados->toArray()), 
                        'total' => sizeof($bugs->toArray()), 
                      );
        $asignados = $this->Bugs->Users->find('list', ['limit' => 200]);
        $this->set(compact('grafica1', 'grafica2', 'asignados', 'bugs'));
    }

    public function reportes()
    {
        //dd("hola");
        $bugs = $this->Bugs->find('all', [
            'contain' => ['Sistemas', 'Users']
        ]);

        $bugsAtendidos = $this->Bugs->find('all', [
            'contain' => ['Sistemas', 'Users']
        ])->where(['leido' => 1]);

        $bugsAbiertos = $this->Bugs->find('all', [
            'contain' => ['Sistemas', 'Users']
        ])->where(['activo' => 1]);

        $bugsCerrados = $this->Bugs->find('all', [
            'contain' => ['Sistemas', 'Users']
        ])->where(['activo' => 0]);

        $this->viewBuilder()
            ->className('Dompdf.Pdf')
            ->layout('Dompdf.default')
            ->options(['config' => [
                'filename' => 'prueba.pdf',
                'render' => 'browser',
                'size' => 'Letter',
                  'paginate' => [
                    'x' => 550,
                    'y' => 750,
                  ]
        ]]);
        $asignados = $this->Bugs->Users->find('list', ['limit' => 200]);
        $this->set(compact('bugs', 'bugsAbiertos', 'bugsCerrados', 'asignados', 'bugsAtendidos'));
        $this->set('_serialize', ['bugs']);
    }

    public function reportesView(){

    }

}
