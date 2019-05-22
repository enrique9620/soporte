
<?= $this->Form->create($actualizacionesAnexo,['type' => 'file']) ?>
                      <div class="form-group">
                        <div class="cell">
                            <label>Captura Versión Actual</label>
                            <div class="input-control textarea full-size">
                               <!-- <input type="file" name="cpanterior" accept=".jpg,.png," id="imgInp1" onchange="preview(this)"> -->
                               <?php echo $this->Form->control('imagen_nueva', ['label'=>[],'type'=>'file', 'name'=>'cpnueva']); ?>
                            </div>
                            <div style="width:25%; height:25%;" id="preview" ></div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="cell">
                            <label>Captura Versión Actual</label>
                            <div class="input-control textarea full-size">
                                 <!-- <input type="file" name="cpnueva" accept=".jpg,.png" id="imgInp2" onchange="preview2(this)"> -->
                                 <?php echo $this->Form->control('imagen_anterior', ['label'=>[],'type'=>'file','name'=>'cpanterior']); ?>
                            </div>
                            <div style="width:25%; height:25%;" id="preview2" ></div>

                        </div>
                      </div> 
                  </fieldset>
                   <br>
                   <?= $this->Form->button(__('Guardar'),['class'=>'btn btn-success', 'style'=>'width: 100px;']) ?>
                  </section>
              </div>
          <?= $this->Form->end() ?>
<script>
   $("imagen-anterior").fileinput({
    showUpload: false,
    allowedFileExtensions: ["jpg", "png","jpeg"]
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
