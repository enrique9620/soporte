<?php
    echo $this->Html->css
                            (
                                array
                                    (

                                        'theme-default/font-awesome.min.css',
                                        'theme-default/libs/DataTables/jquery.dataTables.css',
                                        'theme-default/libs/DataTables/TableTools.css',
                                        'theme-default/libs/fileinput/fileinput.css',
                                        'theme-default/libs/fileinput/fileinput.min.css',
                                    )
                            );

    echo $this->Html->script
                                    (
                                        array
                                            (
                                                'bootstrap/bootstrap.js',
                                                'libs/fileinput/fileinput.js',
                                                'libs/fileinput/fileinput.min.js',
                                                'libs/jquery.validate',
                                            )
                                    );
 ?>
 <style media="screen">
   .modal-backdrop {
     z-index: 0 !important;
   }
   #cell-content{
     width: 100%;
   }
 </style>
 <div class="modal fade" id="mensajes" tabindex="-1" role="dialog" aria-labelledby="titulo" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titulo">Seguimiento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding:1em;">
        <div class="" id="cuadro_seguimiento"></div>
        <?= $this->Form->create('mensajes',array('id'=>'nuevoSeguimiento','role'=>'form','enctype' => 'multipart/form-data'));?>
        <input type="hidden" name="id_directorio" id="id_directorio" value="">
        <div class="form-group" style="margin-right: 40px;">
          <label class="control-label col-sm-2" for="msg">Anotacion:</label>
          <div class="col-sm-10">
            <textarea class="form-control" class="text-uppercase" name="comentario" id="msg" style="max-width:100%;min-width:100%; margin-bottom:1em;" required></textarea>
            <input id="imagen" name="archivo" type="file" style="width:213px" data-show-preview="false">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="border:none;margin-top:3em;">
        <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-top:1em;">Cerrar</button>
        <?php echo $this->Form->button('Guardar seguimiento',array('type'=>'submit','class'=>'btn btn-primary', 'style'=>'margin-top:1em;', 'id'=>'btnGuardar')); ?>
      </div>
      <?php echo $this->Form->end(); ?>
    </div>
  </div>
</div>
 <div class="cell auto-size padding20 bg-white" id="cell-content">
   <hr class="thin bg-grayLighter">
     <h1 class="text-light">Directorio<span class="mif-profile place-right"></span></h1>
     <hr class="thin bg-grayLighter">
         <?php
         echo  $this->Html->link(
           'Nuevo '.$this->Html->tag('span','',array ('class'=>'mif-plus')),array ('action'=>'add'),
         array('escape'=>false,'class'=>'button primary place-right'));
         ?>
     <table id="directorio" class="table striped hovered padding20">
       <thead>
             <tr>
                 <th>Nombre</th>
                 <th>Cargo</th>
                 <th>Estado</th>
                 <th>Municipio</th>
                 <th>Localidad</th>
                 <th>Correo</th>
                 <th>Telefono</th>
                 <th>Activo</th>
                 <th>Actualizado</th>
                 <th></th>
             </tr>
         </thead>
         <tbody>
             <?php foreach ($directorio as $direc): ?>
             <tr>
               <td><?= h(utf8_decode($direc->nombre_completo)) ?></td>
               <td><?= h($direc->cargo) ?></td>
               <!-- edo,mun,loc  -->
               <td class="text-uppercase"><?= h($direc->estado['abrev']) ?></td>
               <td class="text-uppercase"><?= h($direc->municipio['name']) ?></td>
               <td class="text-uppercase"><?= h($direc->localidad['name']) ?></td>
               <!-- edo,mun,loc  -->
               <td style="font-size:10px;font-weight:bold;"><?php echo $direc->correo ?></td>
               <td><?= h($direc->telefono) ?></td>
               <td><?php echo ($direc->activo) ?></td>
               <td class="text-uppercase">Hace: <?= h($direc->actualizado) ?></td>
               <td><?= $direc->acciones ?> </td>
             </tr>
             <?php endforeach; ?>
         </tbody>
     </table>
     </div>
     <script language="Javascript">
     $('#directorio').dataTable({
       "columnDefs": [
           { "width": "100%", "targets": 5 }
         ],
         "language": {
 	        "sProcessing":     "Procesando...",
 	        "sLengthMenu":     "Mostrar _MENU_ registros",
 	        "sZeroRecords":    "No se encontraron resultados",
 	        "sEmptyTable":     "Ningún dato disponible en esta tabla",
 	        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
 	        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
 	        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
 	        "sInfoPostFix":    "",
 	        "sSearch":         "Buscar:",
 	        "sUrl":            "",
 	        "sInfoThousands":  ",",
 	        "sLoadingRecords": "Cargando...",
 	        "oPaginate": {
 	            "sFirst":    "Primero",
 	            "sLast":     "Último",
 	            "sNext":     "Siguiente",
 	            "sPrevious": "Anterior"
 	        },
 	        "oAria": {
 	            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
 	            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
 	        }
        	}
     });
     function confirmDel()
     {
     var agree=confirm("¿Realmente desea eliminarlo? ");
     if (agree) return true ;
     return false;
     }
     </script>
 </div>
 <script language="Javascript">
$("#imagen").fileinput({
    'language':'es',
    overwriteInitial: true,
    showUpload: false,
    showCaption:false,
    browseLabel: '',
    removeLabel: '',
    maxImageWidth: 200,
    maxImageHeight: 150,
    resizePreference: 'height',
    hideThumbnailContent: true,
    resizeImage: true,
    resizeIfSizeMoreThan: 1000,
    initialPreview: [
    ],
    allowedFileExtensions: ["jpg", "png",'jpeg']
});
$(document).ready(function(){
  $('#mensajes').on('show.bs.modal', function (event){
    var button = $(event.relatedTarget) // Button that triggered the modal
    var contenido = button.data('whatever');
    var arreglo_datos = contenido.split("_");
    var id_registro = arreglo_datos[0];
    var nombre_tmp = arreglo_datos[1];
    var nombre = nombre_tmp.replace(/-/g, " ");
    $( "#titulo" ).html("SEGUIMIENTO: "+nombre);
    $('#id_directorio').val(id_registro);
    $.ajax({
      url:getUrl() +"/RSeguimientoDirectorio/seguimientos/?id="+id_registro,
      type: "GET",
      async:true,
      // data: mascota_perdida_id,
      contentType: false,
      processData: false,
      success: function(datos)
      {
        $("#cuadro_seguimiento").html(datos);
        $('#msg').val('');
        $("#imagen").val(null);
      },
      error: function(datos) {
        console.log('algo salio mal');
      }
    });
  });

  $("#nuevoSeguimiento").validate({
      rules: {
          msg: { required: true, minlength: 20},
      },
      messages: {
          msg: "debes agregar un mensaje de al menos 20 caracteres, para poder enviarlo",
      },
      submitHandler: function(form){
        var formData = new FormData($("#nuevoSeguimiento")[0]);
        $.ajax({
          url:getUrl() +"/RSeguimientoDirectorio/agregarSeguimiento",
          type: "POST",
          async:true,
          data: formData,
          contentType: false,
          processData: false,
          success: function(datos)
          {
            $("#cuadro_seguimiento").html(datos);
            $('#mensajes').modal('hide');
            $('#msg').val('');
            $("#imagen").val(null);
          },
          error: function(datos) {
            console.log('algo salio mal');
          }
        });
      }
  });
});
</script>
