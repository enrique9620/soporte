<?php use Cake\Routing\Router;
?>
<?php echo $this->Html->script('calendario.js')?>
<div class="row">
    <div class="col-12">
  <div class="card">
      <div class="card-body wizard-content">
            <?php
    $session = $this->request->session();
    $url = $this->request->session()->read('url');
    ?>    
        <?= $this->Html->link(__('<i class="mdi mdi-file-document-box"></i> Listado'), ['controller'=>'Actualizaciones','action' => 'index'],['escape'=>false, 'class'=>'btn btn-info']) ?>
         <p>
          <h2 class="card-title">Nueva Actualización</h2>
          <h6 class="card-subtitle"></h6>
          <?= $this->Form->create($actualizacione, array ('data-toggle'=>'validator','enctype' => 'multipart/form-data')); ?>
                  <section>
                    <div class="form-group">
                    <!-- <?php //echo $this->Form->input('descripción',array('class'=>'form-control','type' => 'textarea','required', 'data-validate-func' => 'required', 'data-validate-hint' => "Este campo es requerido", 'data-validate-hint-position' => 'top', 'placeholder'=>'Descripción','maxlength'=>'512'));?>  -->
                            <label>Descripción</label>
                           
                               <?php echo $this->Form->input('descripcion',array('class'=>'form-control','label'=>'','type' => 'textarea','required', 'data-validate-func' => 'required', 'data-validate-hint' => "Este campo es requerido", 'data-validate-hint-position' => 'top', 'placeholder'=>'Descripción','maxlength'=>'512','type' => 'textarea'));?>
                     </div>
                        <div class="cell">
                          <label>Fecha</label>
                            <div class="input-control text full-size">
                           <?php
                            echo $this->Form->control('fecha',['type'=>'text','class'=>'datepicker', 'style'=>'width: 250px;' ,'placeholder'=>'aaaa/mm/dd', 'label'=>false]);?>
                            </div>
                        </div> 
          <br>                             
         <div class="form-group">
                   <div class="cell">
                    <label>Importancia</label>
                    <div class="input-control select">
                     <?php echo $this->Form->select('cat_importancia_id',$CatImportancias,
                        array('id'=>'cat_importancia_id','name'=>'cat_importancia_id','empty'=>false, 'class'=>'form-control','required', 'style'=>'width: 250px;'));
                        ?>
                   </div></div></div>
                   <div class="form-group">
                    <div class="cell">
                        <label>Tipo actualización</label>
                            <div class="input-control select">
                      <?php echo $this->Form->select('cat_tipoactualizacion_id',$Cattipoactualizaciones,
                                  array('id'=>'cat_tipoactualizacion_id','name'=>'cat_tipoactualizacion_id','empty'=>false, 'class'=>'form-control','required','style'=>'width: 250px;'));
                                  ?>
                            </div>
                        </div>
                      </div>
                      <div class="cell">
                            <label>Sistema</label>
                            <div class="input-control select">
                               <?php
                              echo $this->Form->select(
                                  'sistema_id',$Sistemas,
                                  array('id'=>'sistema_id','name'=>'sistema_id','empty'=>false, 'class'=>'form-control','required','style'=>'width: 250px;'));
                                  ?>
                            </div>
                        </div>
                        <br>
                      <div class="form-group">
                        <div class="cell">
                            <label><h4>Captura de la Versión Nueva</h4></label>
                            <div class="input-control textarea full-size">
                               <!-- <input type="file" name="cpanterior" accept=".jpg,.png," id="imgInp1" onchange="preview(this)"> -->

                               <!-- <?php //echo $this->Form->input('imagen_anterior',['type'=>'file','accept'=>'.jpg,.png', 'class'=>'form-control-file','onchange'=>'preview(this)', 'label'=>false, 'id'=>'imgInp1']); ?> -->
                                <?php echo $this->Form->control('imagen_nueva', ['label'=>false,'type'=>'file','onchange'=>'preview(this)' , 'accept'=>'.jpeg, .png, .jpg', 'name'=>'imagen_nueva']); ?> 
                            </div>
                            <div style="width:25%; height:25%;" id="preview" ></div>
                        </div>
                      </div>
                      
                        <div class="cell">
                            <label><h4>Captura de la Versión Anterior</h4></label>
                            <div class="input-control textarea full-size">
                                 <!-- <input type="file" name="cpnueva" accept=".jpg,.png" id="imgInp2" onchange="preview2(this)"> -->

                                 <!-- <?php //echo $this->Form->input('imagen_nueva',['type'=>'file','accept'=>'.jpg,.png', 'class'=>'form-control-file','onchange'=>'preview2(this)', 'label'=>false, 'id'=>'imgInp2']); ?> -->
                                  <?php echo $this->Form->control('imagen_anterior', ['label'=>false,'type'=>'file','onchange'=>'preview2(this)', 'accept'=>'.jpeg, .png, .jpg', 'name'=>'imagen_anterior']); ?>
                            </div>
                            <div style="width:25%; height:25%;" id="preview2" ></div>
                        </div>
                      
                  </fieldset>
                   <br>
                   <?= $this->Form->button(__('Guardar'),['class'=>'btn btn-success', 'style'=>'width: 100px;']) ?>
                  </section>
              </div>
          <?= $this->Form->end() ?>
      </div>
  </div>

</div>
</div>

<script>
  //   $("imagen-anterior").fileinput({
  //   showUpload: false,
  //   allowedFileExtensions: ["jpg", "png","jpeg"]
  // });
  // $("imagen-nueva").fileinput({
  //   showUpload: false,
  //   allowedFileExtensions: ["jpg", "png","jpeg"]
  // });
$('#fecha').datepicker({
        //language: 'en',
        autoclose: true,
        todayHighlight: true,
        format: "yyyy-mm-dd"
      });
      function preview(e)
      {
        if(e.files && e.files[0])
        {
          // Comprobamos que sea un formato de imagen

          if (e.files[0].type.match('image.*')) {

            // Inicializamos un FileReader. permite que las aplicaciones web lean
            // ficheros (o información en buffer) almacenados en el cliente de forma
            // asíncrona
            // Mas info en: https://developer.mozilla.org/es/docs/Web/API/FileReader
            var reader=new FileReader();
            // El evento onload se ejecuta cada vez que se ha leido el archivo
            // correctamente
            reader.onload=function(e) {
              document.getElementById("preview").innerHTML="<img src='"+e.target.result+"' style='width:300px; height:300px;'>";
            }
            // El evento onerror se ejecuta si ha encontrado un error de lectura
            reader.onerror=function(e) {
              document.getElementById("preview").innerHTML="Error de lectura";
            }
            // indicamos que lea la imagen seleccionado por el usuario de su disco duro
            reader.readAsDataURL(e.files[0]);
          }else{
            // El formato del archivo no es una imagen
            document.getElementById("preview").innerHTML="No es un formato de imagen";
          }
        }
      }


      function preview2(e)
      {
        if(e.files && e.files[0])
        {
          // Comprobamos que sea un formato de imagen

          if (e.files[0].type.match('image.*')) {

            // Inicializamos un FileReader. permite que las aplicaciones web lean
            // ficheros (o información en buffer) almacenados en el cliente de forma
            // asíncrona
            // Mas info en: https://developer.mozilla.org/es/docs/Web/API/FileReader
            var reader=new FileReader();
            // El evento onload se ejecuta cada vez que se ha leido el archivo
            // correctamente
            reader.onload=function(e) {
              document.getElementById("preview2").innerHTML="<img src='"+e.target.result+"' style='width:300px; height:300px;'>";
            }
            // El evento onerror se ejecuta si ha encontrado un error de lectura
            reader.onerror=function(e) {
              document.getElementById("preview2").innerHTML="Error de lectura";
            }
            // indicamos que lea la imagen seleccionado por el usuario de su disco duro
            reader.readAsDataURL(e.files[0]);
          }else{
            // El formato del archivo no es una imagen
            document.getElementById("preview2").innerHTML="No es un formato de imagen";
          }
        }
      }

</script>