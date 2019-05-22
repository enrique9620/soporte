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
            

    //     $("#guardar").click(function(){
    //         Tpeticionid = generateUUID();
    //         Trespuesta = $('#respuesta').val();
    //         Timagen = jQuery('#vistaPrevia').attr('src');
    //         //AJAX PARA GUARDAR PETICION
    //         $.ajax({
    //                         type: "POST", 
    //                         url:   window.server + "peticiones/add_peticiones.php",
                            
    //                         data: ({
    //                             id: Tpeticionid,
    //                             bug_id: Tbugid,
    //                             estadopeticion_id: Tatendidoid,
    //                             descripcion: Trespuesta,
    //                             imagen: Timagen,
    //                         }),
    //                         cache: false,
    //                         success: function(data){
    //                           location.reload();
    //                           data="";
    //                         }
    //     });//fin de ajax
    // });

</script>
<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>Acciones</strong>
        </div>

        <div class="panel-body">
            <ul class="nav nav-pills nav-stacked">
                <li><?php echo $this->Html->link('<i class="glyphicon glyphicon-list"></i>&nbsp;Listado', array('action' => 'index'),array('escape'=>false)); ?></li>
            </ul>
        </div>
    </div>
</div>

<div class="col-md-9">
    <?= $this->Form->create($bug) ?>
    <fieldset>
        <legend><?= __('Asignar Supervisor') ?></legend>
         <!-- Grupo -->
        <div class="form-group">
          <label class="col-sm-2 control-label">Asignado</label>
          <div class="col-sm-10">
            <?php
            echo $this->Form->select(
              'asignadoId',$asignados,
              array('id'=>'asignadoId','empty'=>true, 'class'=>'form-control', 'required'));
              ?>
          </div>
        </div>
        <!-- Grupo -->
    </fieldset>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo $this->Form->button('Guardar',array('type'=>'button','class'=>'btn btn-primary', 'style'=>'margin-top:25px;', 'id'=>'guardar')); ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
