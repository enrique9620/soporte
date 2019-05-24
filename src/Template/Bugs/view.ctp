 <?php
/**
  * @var \App\View\AppView $this
  */
?>

<!-- <a href="#Modal2" class="btn btn-success" data-toggle="modal"><i class="mdi mdi-plus-circle"></i> <span>Responder</span></a>
<a href="" class="btn btn-danger" data-toggle="modal"><i class="mdi mdi-plus-circle"></i> <span>Finalizar</span></a>
<br>
<p> -->
<?php if($bug->activo==1){
    echo '<div  class="row">
      <div>
      <a href="#Modal2" class="btn btn-success" data-toggle="modal"><i class="mdi mdi-plus-circle"></i> <span>Responder</span></a>
      </div>
      <div>
      <a href="#finalizar" class="btn btn-danger" data-toggle="modal"><i class="mdi mdi-plus-circle"></i> <span>Finalizar</span></a>
      </div>
      </div>';
}
?>
<br>
<div class="card">
<div class="card-body">
<div class="label label-success ">
    <h3><?= __('DATOS PRINCIPALES DEL REPORTE') ?></h3> 
</div>
<div class="alert alert-secondary ">
<center>
    <table class="vertical-table">
        <tr <?= h($bug->id) ?>>
            <!-- <th scope="row"><//?= __('Id') ?></th>
            <td><//?= h($bug->id) ?></td> -->
        </tr>
        <!--<tr>
            <th scope="row"><//?= __('Estado') ?></th>
            <td><//?= $bug->activo ?></td> 
        </tr> -->
        <tr>
            <th scope="row"><?= __('Asunto') ?></th>
            <td><?= h($bug->asunto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descripción') ?></th> 
            <td><?= h($bug->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sistema') ?></th>
            <td><?= h($bug->sistema->sistema) ?></td> 
        </tr>
        <tr>
        <tr>
            <th scope="row"><?= __('usuario') ?></th>
            <td><?= h($bug->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($bug->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefono') ?></th>
            <td><?= h($bug->telefono) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Correo') ?></th>
            <td><?= h($bug->correo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sistema Operativo') ?></th>
            <td><?= h($bug->sistemaoperativo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Navegador') ?></th>
            <td><?= h($bug->navegador) ?></td>
        </tr>
    </table>
</center>
    <center>
    <br>
                <?php if($bug->activo==1){
                 echo '<span class="label label-success" style="font-size:18px;">Abierto</span>';
                }else{
                echo '<span class="label label-danger" style="font-size:18px; ">Cerrado</span>';
                }
                ?>
    </center>
</div>
<div class="modal fade" id="finalizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <?= $this->Form->create($bug,['type' => 'post', 'url' => ['controller' => 'bugs','action' => 'edit']]) ?>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Finalizar reporte</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3>¿Esta seguro de finalizar el reporte?</h3>
                        <?php echo $this->Form->hidden('activo', ['value' => 0]) ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <?= $this->Form->button(__('Aceptar'),['class'=>'btn btn-primary']) ?>
                    </div> 

                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
<!--finalizar-->
<!--modal para añadir nuevo-->
<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <?= $this->Form->create(null,[ 'enctype' => 'multipart/form-data','type' => 'post', 'url' => ['controller' => 'Respuestas','action' => 'add']]) ?>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Respuesta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    	<label>Descripción</label>
                        <?php echo $this->Form->input('descripcion',array('class'=>'form-control','label'=>'','type' => 'textarea','required', 'data-validate-func' => 'required', 'data-validate-hint' => "Este campo es requerido", 'data-validate-hint-position' => 'top', 'placeholder'=>'Descripción','maxlength'=>'1024','type' => 'textarea'));?>
                    	<label>Captura (opcional)</label>  
                         <?php echo $this->Form->control('imagen_nueva', ['label'=>false,'type'=>'file', 'accept'=>'.jpeg, .png, .jpg']); ?>
                         <?php echo $this->Form->hidden('bug_id', ['value' => $bug->id]) ?>
                         <!--enviar el id del usuario logueado-->
                         <?php $session    = $this->request->session();
                         echo $this->Form->hidden('users_id', ['value' => $session->read('Auth.User.id')]) ?>
                         <!---enviar el id del usuario que tiene asignado el bug -->
                          <!-- <//?php echo $this->Form->hidden('users_id', ['value' => $bug->user->id]) ?> -->
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <?= $this->Form->button(__('Enviar'),['class'=>'btn btn-success']) ?>
                    </div> 

                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
<!--mostrar las respuestas-->
<div class="label label-info">
    <h3><?= __('RESPUESTAS') ?></h3>
</div>
<div class="alert alert-info"> 
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descripción') ?></th>
            <!-- <td></?= h($respuesta->bug->descripcion) ?></td> -->
        </tr>
        <tr>
            <th scope="row"><?= __('Asignado') ?></th>
            <!-- <td></?= h($respuesta->bug->descripcion) ?></td> -->
        </tr>
        <tr>
            <th scope="row"><?= __('Captura (opcional)') ?></th>
            <!-- <td></?= h($respuesta->bug->descripcion) ?></td> -->
        </tr>
    </table>
</div>
<!--fin mostrar--->
</div>
</div>