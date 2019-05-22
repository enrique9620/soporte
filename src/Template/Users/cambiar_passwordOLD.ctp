<?php
echo $this->Html->css
                            (
                                array
                                    (
                                        'theme-default/libs/bootstrap-multiselect/bootstrap-multiselect.cc',
                                        'theme-default/libs/bootstrap-datepicker/datepicker3.css?1424887858',
                                        'semantic.css',
                                        'multiple-emails.css',
                                        'select2.css'
                                    )
                            );
echo $this->Html->script
                                (
                                    array
                                        (
                                            'libs/bootstrap-multiselect/bootstrap-multiselect.js',
                                            'libs/bootstrap-datepicker/bootstrap-datepicker.js',
                                            'libs/bootstrap-datepicker/locales/bootstrap-datepicker.es.js',
                                            'libs/multiple-mails/semantic.min.js',
                                             'libs/validator/validator.js',
                                            'libs/multiple-mails/multiple-emails.js',
                                            'libs/select2.js',
                                            'helpers/agregarAjax.js'
                                        )
                                );
?>
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
<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>Acciones</strong>
        </div>

        <div class="panel-body">
            <ul class="nav nav-pills nav-stacked">
                <li><?php echo $this->Html->link('<i class="glyphicon glyphicon-list"></i>&nbsp;Volver a reportes', array('controller'=>'Bugs','action' => 'index'),array('escape'=>false)); ?></li>
            </ul>
        </div>
    </div>
</div>
<!-- Formulario -->
<div class="col-md-9">
    <?php echo $this->Form->create($user,array('onsubmit'=>'return checkSubmit();','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form')); ?>
    <fieldset>
        <legend><?php echo __('Cambiar Contraseña de '.$user->username); ?></legend>

        <!-- Contraseña -->
        <div class="form-group">
            <label class="col-sm-2 control-label">Contraseña anterior*</label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('contraseñaAnterior',array('class'=>'form-control js-example-basic-multiple','label'=>'','type'=>'password', 'required'));?>
            </div>
        </div>
        <!-- Contraseña-->

        <!-- Contraseña -->
        <div class="form-group">
            <label class="col-sm-2 control-label">Nueva Contraseña *</label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('pass1',array('class'=>'form-control js-example-basic-multiple','label'=>'','type'=>'password', 'required'));?>
            </div>
        </div>
        <!-- Contraseña-->

        <!-- Confirmar Contraseña -->
        <div class="form-group">
            <label class="col-sm-2 control-label">Confirmar Contraseña* </label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('pass2',array('class'=>'form-control js-example-basic-multiple','label'=>'','type'=>'password', 'required'));?>
            </div>
        </div>
        <!-- Confirmar Contraseña-->

    </fieldset>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo $this->Form->button('Guardar',array('type'=>'submit','class'=>'btn btn-primary', 'style'=>'margin-top:25px;', 'id'=>'btnGuardar','onclick' => 'validar()')); ?>
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
    <!-- formulario -->
    <script type="text/javascript">
      function validar(){
        var contrasenia = document.getElementById('pass1');
        var contraseniados = document.getElementById('pass2');

        //alert(contrasenia.value);
        //alert(contraseniados.value);

        if(contrasenia.value != contraseniados.value){
          alert('Las contraseñas no coinciden');
          contrasenia.value = '';
          contraseniados.value = '';
        }
      }
    </script>
</div>
