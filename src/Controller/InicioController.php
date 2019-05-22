<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Inicio Controller
 *
 *
 * @method \App\Model\Entity\Inicio[] paginate($object = null, array $settings = [])
 */
class InicioController extends AppController{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
    	//redirecciona al layout para que sea el principal
      $this->viewBuilder()->setLayout('default');
      //$this->viewBuilder()->setLayout('inicio');
    }
    public function home(){
    	//redirecciona a la vista home
    }

}
