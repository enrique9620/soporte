<?php use Cake\Routing\Router;?>
<?php
/**
  * @var \App\View\AppView $this
  */
        echo $this->Html->css
                            (
                                array
                                    (
                                        // 'theme-default/libs/bootstrap-datepicker/datepicker3.css?1424887858',
                                    )
                            );

        echo $this->Html->script
                                (
                                    array
                                        (
                                            // 'libs/bootstrap-datepicker/locales/bootstrap-datepicker.es.js',
                                        )
                                );
?>

<div class="cell auto-size padding20 bg-white" id="cell-content">
    <h1 class="text-light">Editar actualización<span class="mif-plus place-right"></span></h1>
    <hr class="thin bg-grayLighter">
    <?php
    $session = $this->request->session();
    $url = $this->request->session()->read('url');
     ?>
    <!-- <button class="button primary" onclick="window.location.href='<?= $url ?>actualizaciones'" ><span class="mif-menu"></span> Listado</button> -->
    <a class="button primary" href="<?php echo Router::url(['action'=>'index','controller'=>'Actualizaciones'])?>"> <span class="mif-menu"></span> Listado</a>
    <hr class="thin bg-grayLighter">

    <table id="bug" class="table">
      <thead>
          <tr class="success">
              <td align="center">
                <?= $this->Form->create($actualizacione, array ('data-toggle'=>'validator','enctype' => 'multipart/form-data')); ?>
                  <fieldset>
                      <legend><?= __('Actualización') ?></legend>
                       <!-- Descripcion -->
                        <div class="cell">
                            <label>Descripción</label>
                            <div class="input-control textarea full-size">
                                <?php echo $this->Form->input('descripcion',array('class'=>'','label'=>'','type' => 'textarea','required', 'data-validate-func' => 'required', 'data-validate-hint' => "Este campo es requerido", 'data-validate-hint-position' => 'top'));?>
                            </div>
                        </div>
                        <!-- Descripcion-->

                        <div class="cell">
                            <label>Version anterior</label>
                            <div class="input-control textarea full-size">
                                 <input type="file" name="cpanterior" accept=".jpg,.png," id="imgInp1" onchange="preview(this)">
                              <img src="<?php echo $actualizacione->version_anterior?>" class='img-responsive' style='width:15%; margin-left:12em;'>
                            </div>
                        </div>

                            <label>Version nueva</label>
                            <div class="input-control textarea full-size">
                              <input type="file" name="cpnueva" accept=".jpg,.png" id="imgInp2" onchange="preview2(this)">
                              <img src="<?php echo $actualizacione->version_actual?>" class='img-responsive' style='width:15%; margin-left:12em;'>
                            </div>
                        </div>
                        <!-- Sistema -->
                        <div class="cell">
                            <label>Sistema</label>
                            <div class="input-control select">
                               <?php
                              echo $this->Form->select(
                                  'sistema_id',$Sistemas,
                                  array('id'=>'sistema_id','name'=>'sistema_id','empty'=>false, 'class'=>'','required'));
                                  ?>
                            </div>
                        </div>
                        <!-- Sistema-->

                        <!-- Fecha -->
                        <div class="cell">
                            <label>Fecha</label>
                            <!-- <div class="input-control text full-size">
                               <?php echo $this->Form->input('fecha',array('readonly'=>'readonly',
                                'type'=>'text','label'=>'','empty'=>true,
                                'class'=>'form-control', 'required'));?>
                            </div> -->
                            <div class="input-control text" id="datepicker">
                                <input type="text" name="fecha">
                                <button class="button"><span class="mif-calendar"></span></button>
                            </div>

                            <script>
                                $(function(){
                                    var fecha = '<?php echo $actualizacione->fecha ?>';
                                    if (fecha != null && fecha != '') {
                                      //alert(fecha);
                                      fecha = fecha.replace(/-/g,',');
                                      var myDate=new Date(fecha);
                                      //alert(myDate);
                                      $("#datepicker").datepicker().datepicker("setDate", myDate+1);
                                    }else{
                                       $("#datepicker").datepicker();
                                    }

                                });
                            </script>
                        </div>
                        <!-- Fecha-->

                        <!-- Importancia -->
                        <div class="cell">
                            <label>Importancia</label>
                            <div class="input-control select">
                               <?php
                              echo $this->Form->select(
                                  'cat_importancia_id',$CatImportancias,
                                  array('id'=>'cat_importancia_id','name'=>'cat_importancia_id','empty'=>false, 'class'=>'','required'));
                                  ?>
                            </div>
                        </div>
                        <!-- Importancia-->

                         <!-- Tipo Actualizacion -->
                        <div class="cell">
                            <label>Tipo actualización</label>
                            <div class="input-control select">
                               <?php
                              echo $this->Form->select(
                                  'cat_tipoactualizacion_id',$Cattipoactualizaciones,
                                  array('id'=>'cat_tipoactualizacion_id','name'=>'cat_tipoactualizacion_id','empty'=>false, 'class'=>'','required'));
                                  ?>
                            </div>
                        </div>

                        <!-- Tipo Actualizacion-->
                  </fieldset>
                  <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                          <?php echo $this->Form->button('Guardar',array('type'=>'submit','class'=>'button success', 'style'=>'margin-top:25px;', 'id'=>'guardar')); ?>
                      </div>
                      <?= $this->Form->end() ?>
                  </div>
              </td>
          </tr>
      </thead>
    </table>
</div>

<!-- <script>
$('#fecha').datepicker({
        language: 'es',
        autoclose: true,
        todayHighlight: true,
        format: "dd-mm-yyyy"
      });
</script> -->
