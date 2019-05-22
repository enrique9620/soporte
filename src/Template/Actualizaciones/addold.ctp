<?php use Cake\Routing\Router;?>
<?php
/**
  * @var \App\View\AppView $this
  */
        echo $this->Html->css
                            (
                                array
                                    (
                                        'theme-default/libs/bootstrap-datepicker/datepicker3.css?1424887858',
                                    )
                            );

        echo $this->Html->script
                                (
                                    array
                                        (
                                            'libs/bootstrap-datepicker/locales/bootstrap-datepicker.es.js',
                                            'libs/bootstrap-datepicker/bootstrap-datepicker.js',
                                            // 'libs/bootstrap-datepicker/locales/bootstrap-datepicker.es.js',
                                        )
                                );
?>

<div class="cell auto-size padding20 bg-white" id="cell-content">
    <h1 class="text-light">Nueva actualización<span class="mif-plus place-right"></span></h1>
    <hr class="thin bg-grayLighter">
    <?php
    $session = $this->request->session();
    $url = $this->request->session()->read('url');
     ?>
    <!-- <button class="button primary" onclick="window.location.href='<?= $url ?>actualizaciones'" ><span class="mif-menu"></span> Listado</button> -->
    <a class="button primary" href="<?php echo Router::url(['action'=>'index','controller'=>'Actualizaciones'])?>"> <span class="mif-menu"></span> Listado</a>
    <hr class="thin bg-grayLighter">

    <table id="bug" class="table">
      <thead>
          <tr class="success">
              <td align="center">
                <?= $this->Form->create($actualizacione, array ('data-toggle'=>'validator','enctype' => 'multipart/form-data')); ?>
                  <fieldset>
                      <legend><?= __('Actualización') ?></legend>
                       <!-- Descripcion -->
                        <div class="cell">
                            <label>Descripción</label>
                            <div class="input-control textarea full-size">
                                <?php echo $this->Form->input('descripcion',array('class'=>'','label'=>'','type' => 'textarea','required', 'data-validate-func' => 'required', 'data-validate-hint' => "Este campo es requerido", 'data-validate-hint-position' => 'top'));?>
                            </div>
                        </div>


                        <div class="cell">
                            <label>Captura Versión Anterior</label>
                            <div class="input-control textarea full-size">
                               <input type="file" name="cpanterior" accept=".jpg,.png," id="imgInp1" onchange="preview(this)">
                            </div>
                            <div style="width:25%; height:25%;" id="preview" ></div>
                        </div>


                        <div class="cell">
                            <label>Captura Versión Actual</label>
                            <div class="input-control textarea full-size">
                                 <input type="file" name="cpnueva" accept=".jpg,.png" id="imgInp2" onchange="preview2(this)">
                            </div>
                            <div style="width:25%; height:25%;" id="preview2" ></div>
                        </div>


                        <!-- Fecha -->
                        <div class="cell">
                            <label>Fecha</label>
                            <div class="input-control text full-size">
                               <?php echo $this->Form->input('fecha',array('name'=>'fecha','readonly'=>'readonly',
                                'type'=>'text','label'=>'','empty'=>true,
                                'class'=>'form-control col-sm-4', 'required','style'=>'width: 50%;'));?>
                            </div>
                            <!-- <div class="input-control text" id="datepicker">
                                <input type="text" name="fecha">
                                <button class="button"><span class="mif-calendar"></span></button>
                            </div> -->
                            <script>
                                // $(function(){
                                //     var currentDate = new Date();
                                //     $("#datepicker").datepicker().datepicker("setDate", currentDate);
                                // });
                            </script>
                        </div>
                        <!-- Fecha-->

                        <!-- Importancia -->
                        <div class="cell">
                            <label>Importancia</label>
                            <div class="input-control select">
                               <?php
                              echo $this->Form->select(
                                  'cat_importancia_id',$CatImportancias,
                                  array('id'=>'cat_importancia_id','name'=>'cat_importancia_id','empty'=>false, 'class'=>'','required'));
                                  ?>
                            </div>
                        </div>
                        <!-- Importancia-->

                         <!-- Tipo Actualizacion -->
                        <div class="cell">
                            <label>Tipo actualización</label>
                            <div class="input-control select">
                               <?php
                              echo $this->Form->select(
                                  'cat_tipoactualizacion_id',$Cattipoactualizaciones,
                                  array('id'=>'cat_tipoactualizacion_id','name'=>'cat_tipoactualizacion_id','empty'=>false, 'class'=>'','required'));
                                  ?>
                            </div>
                        </div>
                        <!-- Tipo Actualizacion-->

                        <!-- Sistema -->
                        <div class="cell">
                            <label>Sistema</label>
                            <div class="input-control select">
                               <?php
                              echo $this->Form->select(
                                  'sistema_id',$Sistemas,
                                  array('id'=>'sistema_id','name'=>'sistema_id','empty'=>false, 'class'=>'','required'));
                                  ?>
                            </div>
                        </div>
                        <!-- Sistema-->
                  </fieldset>
                  <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                          <?php echo $this->Form->button('Guardar',array('type'=>'submit','class'=>'button success', 'style'=>'margin-top:25px;', 'id'=>'guardar')); ?>
                      </div>
                      <?= $this->Form->end() ?>
                  </div>
              </td>
          </tr>
      </thead>
    </table>
</div>

<script>
$('#fecha').datepicker({
        language: 'es',
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
      				document.getElementById("preview").innerHTML="<img src='"+e.target.result+"'>";
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
              document.getElementById("preview2").innerHTML="<img src='"+e.target.result+"'>";
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
