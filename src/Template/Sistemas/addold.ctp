<?php use Cake\Routing\Router;?>
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
    <h1 class="text-light">Agregar sistema <span class="mif-phonelink place-right"></span></h1>
    <hr class="thin bg-grayLighter">
    <?php
    $session = $this->request->session();
    $url = $this->request->session()->read('url');
    ?>
    <a class="button primary" href="<?php echo Router::url(['action'=>'index','controller'=>'Sistemas'])?>"> <span class="mif-menu"></span> Listado</a>
    <!-- <button class="button primary" onclick="window.location.href='<?= $url ?>/sistemas'" ><span class="mif-menu"></span> Listado</button> -->

    <hr class="thin bg-grayLighter">

    <table id="bug" class="table">
      <thead>
          <tr class="success">
              <td align="center">
                <?= $this->Form->create($sistema) ?>
                  <fieldset>
                      <legend><?= __('Editar Sistema') ?></legend>
                       <!-- Grupo -->
                      <!-- <div class="form-group">
                        <div class="">
                          <?php
                          echo $this->Form->control('nombre');
                          echo $this->Form->control('correo');
                            ?>
                        </div>
                      </div> -->

                      <div class="input-control modern text iconic" style="width: 90%;">
                          <?php echo $this->Form->control('sistema', array('style' => 'height: 40px; width: 100%;')); ?>
                          <span class="label">You login</span>
                          <span class="informer">Please enter you login or email</span>
                          <span class="placeholder"></span>
                          <span class="icon mif-phonelink"></span>
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
<!-- nuevo-->
  <div class="card">
      <div class="card-body wizard-content">
          <h4 class="card-title">Nuevo Sistema</h4>
          <h6 class="card-subtitle"></h6>
          <form id="example-form" action="#" class="m-t-40">
              <div>
                  <h5>listado</h5>
                  <section>
                      <label for="userName">User name *</label>
                      <input id="userName" name="userName" type="text" class="required form-control">
                  </section>
              </div>
          </form>
      </div>
  </div>