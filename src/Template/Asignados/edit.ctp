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

<div class="cell auto-size padding20 bg-white" id="cell-content">
    <h1 class="text-light">Editar asignado <span class="mif-user place-right"></span></h1>
    <hr class="thin bg-grayLighter">
    <?php 
    $session = $this->request->session();
    $url = $this->request->session()->read('url'); 
    ?>
    <button class="button primary" onclick="window.location.href='<?= $url ?>/asignados'" ><span class="mif-menu"></span> Listado</button>

    <hr class="thin bg-grayLighter">

    <table id="bug" class="table">
      <thead>
          <tr class="success">
              <td align="center">
                <?= $this->Form->create($asignado) ?>
                  <fieldset>
                      <legend><?= __('Editar Supervisor') ?></legend>
                       <!-- Grupo -->
                      <!-- <div class="form-group">
                        <div class="">
                          <?php
                          echo $this->Form->control('nombre');
                          echo $this->Form->control('correo');
                            ?>
                        </div>
                      </div> -->

                      <div class="input-control modern text iconic" >
                          <?php echo $this->Form->control('nombre', array('style' => 'height: 40px;')); ?>
                          <span class="label">You login</span>
                          <span class="informer">Please enter you login or email</span>
                          <span class="placeholder"></span>
                          <span class="icon mif-user"></span>
                      </div>

                      <div class="input-control modern text iconic" >
                          <?php echo $this->Form->control('correo', array('style' => 'height: 40px;')); ?>
                          <span class="label">You login</span>
                          <span class="informer">Please enter you login or email</span>
                          <span class="placeholder"></span>
                          <span class="icon mif-mail"></span>
                      </div>
                  </fieldset>
                  <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <?= $this->Form->button('Guardar',array('class'=>'button success')) ?>
                      </div>
                      <?= $this->Form->end() ?>
                  </div>
              </td>
          </tr>
      </thead>
    </table>
</div>