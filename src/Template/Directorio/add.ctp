<?php
echo $this->Html->css
                            (
                                array
                                    (
                                        'select2.css',
                                    )
                            );
echo $this->Html->script
                                (
                                    array
                                        (
                                            'libs/select2.js',
                                        )
                                );
?>
<script type="text/javascript">
$(document).ready(function() {
    $("#estado").select2({
        allowClear: false,
    });
    var id_municipio;
    function genera_municipio(llave){
      $.getJSON(getUrl() + '/Directorio/obtienemunicipios?id='+llave, function(data, status){
          $("#municipio").select2({
              data: data,
              allowClear: false
          });
          $("#localidad").empty()
          genera_localidad($('#municipio').val());
      });
    }
    var id_estado = $('#estado').val();
    genera_municipio(id_estado);
    $("#estado").change(function(){
        id_estado = $('#estado').val();
        $("#municipio").empty()
        genera_municipio(id_estado);
       });

    function genera_localidad(llave){
      $.getJSON(getUrl() + '/Directorio/obtienelocalidades?id='+llave, function(data, status){
          $("#localidad").select2({
              data: data,
              allowClear: false
          });
      });
    }
    id_municipio = $('#municipio').val();
    genera_localidad(id_municipio);
    $("#municipio").change(function(){
        id_municipio = $('#municipio').val();
        $("#localidad").empty()
        genera_localidad(id_municipio);
       });

});

</script>
<div class="cell auto-size padding20 bg-white" id="cell-content">
    <h1 class="text-light">Nuevo<span class="mif-profile place-right"></span></h1>
    <hr class="thin bg-grayLighter">
    <?php
    echo  $this->Html->link(
      'Listado '.$this->Html->tag('span','',array ('class'=>'mif-menu')),array ('action'=>'index'),
    array('escape'=>false,'class'=>'button primary'));
    ?>    
    <hr class="thin bg-grayLighter">

    <div class="col-md-11">
    <?php echo $this->Form->create($directorio, array('class'=>'form-horizontal','role'=>'form')); ?>
    <fieldset>
        <legend><?php echo __('Agregar nuevo registro'); ?></legend>
        <!-- Nombre -->
        <div class="form-group">
            <label class="col-sm-2 control-label">Nombre</label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('nombre',array('class'=>'form-control text-uppercase','label'=>''));?>
            </div>
        </div>
        <!-- Nombre-->

        <!-- Ap.Paterno -->
        <div class="form-group">
            <label class="col-sm-2 control-label">Ap.Paterno</label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('paterno',array('class'=>'form-control text-uppercase','label'=>''));?>
            </div>
        </div>
        <!-- Ap.Paterno-->


        <!-- Ap.Materno -->
        <div class="form-group">
            <label class="col-sm-2 control-label">Ap.Materno</label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('materno',array('class'=>'form-control text-uppercase','label'=>''));?>
            </div>
        </div>
        <!-- Ap.Materno-->

        <div class="col-md-12">
            <label class="col-sm-2 control-label">Domicilio</label>
          <div class="row">
            <div class="col-md-4">
              <!-- Estado -->
              <div class="form-group">
                <div class="col-sm-10">
                  <label class="col-sm-2 control-label">Estado</label>
                  <?php
                  echo $this->Form->select(
                    'estado',$estados,
                    array('id'=>'estado','name'=>'estado','default'=>'85055726-f09d-11e7-97a7-00ffb155c11c','data-role'=>'select','style'=>'width:100%;','empty'=>false));
                    ?>
                  </div>
                </div>
                <!-- Estado-->
              </div>
              <div class="col-md-4">
                <!-- Municipio -->
                <div class="form-group">
                  <div class="col-sm-10">
                    <label class="col-sm-2 control-label">Municipio</label>
                    <?php
                    echo $this->Form->select(
                      'municipio',[],
                      array('id'=>'municipio','name'=>'municipio','data-role'=>'select','style'=>'width:100%;','empty'=>false,'required'));
                      ?>
                    </div>
                  </div>
                  <!-- Municipio-->
                </div>
                <div class="col-md-4">
                  <!-- Localidad -->
                  <div class="form-group">
                    <div class="col-sm-10">
                      <label class="col-sm-2 control-label">Localidad</label>
                      <?php
                      echo $this->Form->select(
                        'localidad',[],
                        array('id'=>'localidad','name'=>'localidad','default'=>"23",'data-role'=>'select','style'=>'width:100%;','empty'=>false,'required'));
                        ?>
                      </div>
                    </div>
                    <!-- Localidad-->
                  </div>
          </div>
        </div>

        <!-- Cargo -->
        <div class="form-group">
            <label class="col-sm-2 control-label">Cargo</label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('cargo',array('class'=>'form-control text-uppercase','label'=>''));?>
            </div>
        </div>
        <!-- Cargo-->

        <!-- Correo -->
        <div class="form-group">
            <label class="col-sm-2 control-label">Correo</label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('correo',array('class'=>'form-control text-lowercase','type'=>'email','label'=>'','data-validation'=>'email'));?>
                <div id="xmail" class="hide"><h6 class="text-danger">Ingresa un correo valido</h6></div>
            </div>
        </div>
        <!-- Correo-->

        <!-- Telefono -->
        <div class="form-group">
            <label class="col-sm-2 control-label">Telefono</label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('telefono',array('class'=>'form-control','label'=>'','onkeypress'=>'return numeros(event)'));?>
            </div>
        </div>
        <!-- Telefono-->
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
<script type="text/javascript">
function numeros(e){
      key = e.keyCode || e.which;
      tecla = String.fromCharCode(key).toLowerCase();
      letras = "0123456789";
      especiales = [8,37,39,46];
      tecla_especial = false;
      for(var i in especiales){
        if(key == especiales[i]){
          tecla_especial = true;
          break;
        }
      }
      if(letras.indexOf(tecla)==-1 && !tecla_especial)
          return false;
    }
    function caracteresCorreoValido(email, div){
        console.log(email);
        var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
        if (caract.test(email) == false){
            $(div).hide().removeClass('hide').slideDown('fast');
            return false;
        }else{
            $(div).hide().addClass('hide').slideDown('slow');
            return true;
        }
    }
    $('form').find('input[type=email]').blur(function(){
    caracteresCorreoValido($(this).val(), '#xmail')
  });
</script>
