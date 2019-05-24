<?php use Cake\Routing\Router;?>
<div class="row">
    <div class="col-12">
  <script type="text/javascript">
var url = window.location.href;
Tbugid = url.split("edit/")[1];
    $(function() {
         $(document).ready(function() {
            $("#guardar").show();
            $("#users_id").select2({
                placeholder: "Seleccione un Supervisor",
                allowClear: true
            });
        });

        $("#guardar").click(function(){
            $("#guardar").hide();
            var Tasignadoid = $('#users_id').val();
            //AJAX PARA GUARDAR PETICION
            $.ajax({
                            type: "POST",
                            url:   window.server + "bugs/edit_users_bugs.php",

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
  <div class="card"> 
      <div class="card-body wizard-content">
            <?php 
    $session = $this->request->session();
    $url = $this->request->session()->read('url');
    ?>    
        <?= $this->Html->link(__('<i class="mdi mdi-file-document-box"></i> Listado'), ['controller'=>'Bugs','action' => 'all'],['escape'=>false, 'class'=>'btn btn-info']) ?>
         <p>
          <h4 class="card-title">Asignar Supervisor</h4>
          <br>
          <h6 class="card-subtitle"></h6>
          <?= $this->Form->create($bug) ?>
              <div>
                  <section>
                    <div class="form-group">
                        <!-- <label class="col-sm-2 control-label">Asignado</label> -->
                        <div class="">
                          <?php
                          echo $this->Form->select(
                            'users_id',$users,
                            array('id'=>'users_id','empty'=>true, 'class'=>'form-control', 'required', 'style' => 'width: 100%;', 'placeholder'=>'Seleccione un Supervisor'));
                            ?>
                            <!--estado ABIERTO al asignar usuario-->
                            <!-- <//?php echo $this->Form->hidden('estadopeticiones_id', ['value' => $estadopeticione->id]) ?> -->
                        </div>
                      </div> 
                   <br>
                   <?= $this->Form->button(__('Guardar'),['class'=>'btn btn-success']) ?>
                  </section>
              </div>
          <?= $this->Form->end() ?>
      </div>
  </div>

</div>
</div>