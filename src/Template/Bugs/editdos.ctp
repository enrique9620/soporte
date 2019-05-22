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

<script type="text/javascript">
var url = window.location.href;
Tbugid = url.split("edit/")[1];
    $(function() {
         $(document).ready(function() {
            $("#guardar").show();
            $("#asignadoId").select2({
                placeholder: "Seleccione un Supervisor",
                allowClear: true
            });
        });

        $("#guardar").click(function(){
            $("#guardar").hide();
            var Tasignadoid = $('#asignadoId').val();
            //AJAX PARA GUARDAR PETICION
            $.ajax({
                            type: "POST",
                            url:   window.server + "bugs/edit_asignado_bugs.php",

                            data: ({
                                bug_id: Tbugid,
                                asignado_id: Tasignadoid,
                            }),
                            cache: false,
                            success: function(data){
                              window.location = getUrl() + "/bugs";
                              data="";
                            }
            });//fin de ajax


        });
    });

</script>

<div class="cell auto-size padding20 bg-white" id="cell-content">
    <h1 class="text-light">Editar asignado <span class="mif-user place-right"></span></h1>
    <hr class="thin bg-grayLighter">
    <?php
    $session = $this->request->session();
    $url = $this->request->session()->read('url');
    ?>
    <!-- <button class="button primary" onclick="window.location.href='<?= $url ?>/bugs/all'" ><span class="mif-menu"></span> Listado</button> -->
    <a class="button primary" href="<?php echo Router::url(['action'=>'all','controller'=>'Bugs'])?>"> <span class="mif-menu"></span> Listado</a>

    <hr class="thin bg-grayLighter">

    <table id="bug" class="table">
      <thead>
          <tr class="success">
              <td align="center">
                <?= $this->Form->create($bug) ?>
                  <fieldset>
                      <legend><?= __('Asignar Supervisor') ?></legend>
                       <!-- Grupo -->
                      <div class="form-group">
                        <!-- <label class="col-sm-2 control-label">Asignado</label> -->
                        <div class="">
                          <?php
                          echo $this->Form->select(
                            'asignadoId',$asignados,
                            array('id'=>'asignadoId','empty'=>true, 'class'=>'form-control', 'required', 'style' => 'width: 100%;'));
                            ?>
                        </div>
                      </div>
                      <!-- Grupo -->
                  </fieldset>
                  <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                          <?php echo $this->Form->button('Guardar',array('type'=>'button','class'=>'button success', 'style'=>'margin-top:25px;', 'id'=>'guardar')); ?>
                      </div>
                      <?= $this->Form->end() ?>
                  </div>
              </td>
          </tr>
      </thead>
    </table>
</div>
