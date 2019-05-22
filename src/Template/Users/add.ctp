<div class="row">
    <div class="col-12">
  <div class="card">
      <div class="card-body wizard-content">    
        <?= $this->Html->link(__('<i class="mdi mdi-file-document-box"></i> Listado'), ['controller'=>'sistemas','action' => 'index'],['escape'=>false, 'class'=>'btn btn-info']) ?>
         <p>
          <h2 class="card-title">Nuevo Supervisor</h2>
          <h6 class="card-subtitle"></h6>
          <?= $this->Form->create($user) ?>
              <div>
                  <section>
                   <label>Nombre</label>
                   <?php echo $this->Form->text('nombre',['class'=>'required form-control','placeholder'=>'Nombre']); ?>
                   <label>Correo</label>
                   <?php echo $this->Form->text('correo',['class'=>'required form-control','placeholder'=>'user@gmail.com']); ?>
                   <?php echo $this->Form->control('username',['class'=>'required form-control','placeholder'=>'User']);
                          echo $this->Form->control('password',['class'=>'required form-control']);
                    ?>       
                   <br>
                   <?= $this->Form->button(__('Añadir'),['class'=>'btn btn-success']) ?>
                  </section>
              </div>
          <?= $this->Form->end() ?>
      </div>
  </div>
 
</div>
</div>