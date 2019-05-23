 <?php
/**
  * @var \App\View\AppView $this
  */
?>

<a href="#Modal2" class="btn btn-success" data-toggle="modal"><i class="mdi mdi-plus-circle"></i> <span>Responder</span></a>
<a href="#Modal2" class="btn btn-danger" data-toggle="modal"><i class="mdi mdi-plus-circle"></i> <span>Finalizar</span></a>
<br>
<p>
<div class="alert alert-success">
    <table class="vertical-table">
        <tr <?= h($bug->id) ?>>
            <!-- <th scope="row"><//?= __('Id') ?></th>
            <td><//?= h($bug->id) ?></td> -->
        </tr>
        <tr>
            <th scope="row"><?= __('Sistema') ?></th>
            <td><?= h($bug->sistema->sistema) ?></td> 
        </tr>
        <tr>
            <th scope="row"><?= __('Asunto') ?></th>
            <td><?= h($bug->asunto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descripción') ?></th> 
            <td><?= h($bug->descripcion) ?></td>
        </tr>
        <tr>
        <tr>
            <th scope="row"><?= __('username') ?></th>
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
</div>
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
                    </div>
                    <div class="modal-body">
                    	<label>Captura</label>  
                         <?php echo $this->Form->control('imagen_nueva', ['label'=>[],'type'=>'file']); ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <?= $this->Form->button(__('Enviar'),['class'=>'btn btn-success']) ?>
                    </div> 
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>