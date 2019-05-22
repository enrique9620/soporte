<?php use Cake\Routing\Router;?>
<div class="row">
    <div class="col-12">
  <div class="card">
      <div class="card-body wizard-content">
            <?php
    $session = $this->request->session();
    $url = $this->request->session()->read('url');
    ?>    
        <?= $this->Html->link(__('<i class="mdi mdi-file-document-box"></i> Listado'), ['controller'=>'sistemas','action' => 'index'],['escape'=>false, 'class'=>'btn btn-info']) ?>
         <p>
          <h4 class="card-title">Nuevo Sistema</h4>
          <h6 class="card-subtitle"></h6>
          <?= $this->Form->create($sistema) ?>
              <div>
                  <section>
                   <?= $this->Form->text('sistema',['class'=>'required form-control','placeholder'=>'Nombre','maxlength'=>'100']) ?>
                   <br>
                   <?= $this->Form->button(__('Añadir'),['class'=>'btn btn-success']) ?>
                  </section>
              </div>
          <?= $this->Form->end() ?>
      </div>
  </div>

</div>
</div>