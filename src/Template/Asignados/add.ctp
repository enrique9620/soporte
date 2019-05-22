<script type="text/javascript">
var statSend = false;
function checkSubmit()
{
    if (!statSend)
    {
        statSend = true;
        document.getElementById('btnGuardar').disabled = true;
        return true;
    }
    else
    {
        alert("El formulario ya se esta enviando...");
        return false;
    }
}
</script>
<!-- <div class="col-md-3">
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
</div> -->
<!-- Formulario -->
<div class="cell auto-size padding20 bg-white" id="cell-content">

    <h1 class="text-light">Nuevo supervisor! <span class="mif-user place-right"></span></h1>
    <hr class="thin bg-grayLighter">
    <?php 
    $session = $this->request->session();
    $url = $this->request->session()->read('url'); 
    ?>
    <button class="button primary" onclick="window.location.href='<?= $url ?>/asignados'" ><span class="mif-menu"></span> Listado</button>

    <hr class="thin bg-grayLighter">

    <!-- <section style="background-image: url('<?php echo $this->request->webroot; ?>img/login_soporte.jpg');background-size: 100% 100%;background-repeat: no-repeat;height:100%";></section> -->

    <div class="col-md-11">
    <?php echo $this->Form->create('User', array('onsubmit'=>'return checkSubmit();','class'=>'form-horizontal','role'=>'form')); ?>
    <fieldset>
        <legend><?php echo __('Nuevo Supervisor'); ?></legend>

        <!-- Usuario -->
        <div class="form-group">
            <label class="col-sm-2 control-label">Usuario</label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('username',array('class'=>'form-control','label'=>''));?>
            </div>
        </div>
        <!-- Usuario-->

        <!-- Contraseña -->
        <div class="form-group">
            <label class="col-sm-2 control-label">Contraseña</label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('password',array('class'=>'form-control','label'=>'','type'=>'password'));?>
            </div>
        </div>
        <!-- Contraseña-->
        <!-- Nombre -->
        <div class="form-group">
            <label class="col-sm-2 control-label">Nombre</label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('nombre',array('class'=>'form-control','label'=>''));?>
            </div>
        </div>
        <!-- Nombre-->
        <!-- Correo -->
        <div class="form-group">
            <label class="col-sm-2 control-label">Correo</label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('correo',array('class'=>'form-control','label'=>''));?>
            </div>
        </div>
        <!-- Correo-->
    </fieldset>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo $this->Form->button('Guardar',array('type'=>'submit','class'=>'btn btn-primary', 'style'=>'margin-top:25px;', 'id'=>'btnGuardar')); ?>
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
    <!-- formulario -->
</div>
</div>

