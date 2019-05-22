<?php
/**
  * @var \App\View\AppView $this
  */
        echo $this->Html->css
                            (
                                array
                                    (
                                        'tags.css',
                                        'theme-default/libs/bootstrap-multiselect/bootstrap-multiselect.cc',
                                        'theme-default/libs/bootstrap-datepicker/datepicker3.css?1424887858',
                                        'select2.css'
                                    )
                            );

        echo $this->Html->script
                                (
                                    array
                                        (
                                            'libs/select2.js'
                                        )
                                );
?>
<div class="row">
    <div class="col-12">
  <div class="card">
      <div class="card-body wizard-content">  
    <h1>Cambiar Contraseña <span class="mif-pencil place-right"></span></h1>
    <!-- <button class="button primary" onclick="window.location.href='/soporteRemake/asignados'" ><span class="mif-menu"></span> Listado</button> -->

    <table id="bug" class="table">
      <thead>
          <tr class="success">
              <!-- <td align="center"> -->
                <td>
                <?php echo $this->Form->create($user,array('class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form')); ?>
                  <fieldset>
                      <legend><?= __('Datos') ?></legend>
                       <!-- Grupo -->
                      <!-- <div class="form-group">
                        <div class="">
                          <?php
                          echo $this->Form->control('nombre');
                          echo $this->Form->control('correo');
                            ?>
                        </div>
                      </div> -->

                       <div class="form-group">
                          <!-- <?php echo $this->Form->control('nombre', array('style' => 'height: 40px;')); ?> -->
                          <label>Contraseña Anterior</label>
                          <?php echo $this->Form->control('contraseñaAnterior',array('style' => 'height: 40px;', 'type'=>'password', 'required', 'label'=>false));?>
                          <!-- <span class="label">You login</span>
                          <span class="informer">Please enter you login or email</span> -->
                          <span class="placeholder"></span>
                          <span class="icon mif-chevron-left"></span>
                      </div> 

                       <div class="form-group">
                          <!-- <?php echo $this->Form->control('correo', array('style' => 'height: 40px;')); ?> -->
                          <label>Nueva Contraseña</label>
                          <?php echo $this->Form->input('password',array('label'=>false, 'type'=>'password', 'required', 'style' => 'height: 40px;'));?>
                          <!-- <span class="label">You login</span>
                          <span class="informer">Please enter you login or email</span> -->
                          <span class="placeholder"></span>
                          <span class="icon mif-key"></span>
                      </div>

                      <div class="form-group">
                          <!-- <?php echo $this->Form->control('correo', array('style' => 'height: 40px;','label'=>false)); ?> -->
                          <label>Confirma Contraseña</label>
                          <?php echo $this->Form->input('confirmaContrasenia',array('type'=>'password', 'required', 'style' => 'height: 40px;' , 'label'=>false));?>
                          
                          <!-- <span class="label">You login</span>
                          <span class="informer">Please enter you login or email</span> -->
                          <span class="placeholder"></span>
                          <span class="icon mif-redo"></span>
                      </div>
                  </fieldset>
                  <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <!-- <?= $this->Form->button('Guardar',array('class'=>'button success')) ?> -->
                        <?php echo $this->Form->button('Guardar',array('type'=>'submit','class'=>'btn btn-success', 'onclick' => 'validar()')); ?>

                      </div>
                      <?= $this->Form->end() ?>
                  </div>
              </td>
          </tr>
      </thead>
    </table>
</div>
</div>
</div>
</div>


<script type="text/javascript">
      function validar(){
        var contrasenia = document.getElementById('nuevacontrasenia');
        var contraseniados = document.getElementById('confirmacontrasenia');

        //alert(contrasenia.value);
        //alert(contraseniados.value);

        if(contrasenia.value != contraseniados.value){
          alert('Las contraseñas no coinciden');
          contrasenia.value = '';
          contraseniados.value = '';
        }
      }
    </script>