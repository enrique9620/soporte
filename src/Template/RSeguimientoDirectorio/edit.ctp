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
                                            )
                                    );
 ?>
<div class="cell auto-size padding20 bg-white" id="cell-content">
  <h1 class="text-light">Editar<span class="mif-tags place-right"></span></h1>
  <hr class="thin bg-grayLighter">
  <?php
  echo  $this->Html->link(
    'Listado '.$this->Html->tag('span','',array ('class'=>'mif-menu')),array ('action'=>'index'),
  array('escape'=>false,'class'=>'button primary'));
  ?>
  <hr class="thin bg-grayLighter">
    <?php echo $this->Form->create($rSeguimientoDirectorio, array('class'=>'form-horizontal','role'=>'form','enctype' => 'multipart/form-data','accept-charset'=>'UTF-8')); ?>
    <fieldset>
        <legend><?= __('Editar Seguimiento') ?></legend>
        <?php
            echo $this->Form->control('id_usuario',['type'=>"hidden"]);
            echo $this->Form->control('id_directorio',['type'=>"hidden"]);
        ?>
        <div class="form-group" style="margin-right: 40px;">
          <label class="control-label col-sm-2" for="msg">Anotacion:</label>
          <div class="col-sm-10">
            <textarea class="form-control text-uppercase" name="comentario" id="msg" style="max-width:100%;min-width:100%; margin-bottom:1em;" required>
            </textarea>
              <input id="imagen" name="archivo" type="file" style="width:213px" data-show-preview="false">
              <div class="place-right">
              <?php echo $rSeguimientoDirectorio->acciones ?>
            </div>

          </div>
        </div>
    </fieldset>
    <?php echo $this->Form->button('Guardar',array('type'=>'submit','class'=>'btn btn-primary', 'style'=>'margin-top:1em;', 'id'=>'btnGuardar')); ?>
    <?= $this->Form->end() ?>
</div>
<script type="text/javascript">
$(document).ready(function(){
  $('#msg').val(<?php echo "'".$rSeguimientoDirectorio->comentario."'" ?>);
});
$("#imagen").fileinput({
    'language':'es',
    overwriteInitial: true,
    showUpload: false,
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
</script>
