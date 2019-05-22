<?php use Cake\Routing\Router;?> 
<script type="text/javascript">

//SE OBTIENE URL Y SE DIVIDE PARA OBTENER EL ID DEL REPORTE
var url = window.location.href;
Tbugid = url.split("view/")[1];

var Tuserid =  "";
var Testadoid ="";
var cont = 0;
var Tfinalizadoid = ""; //ID DE ESTADO FINALIZADO EN BD
var Tatendidoid ="";

      $(function() {

        $(document).ready(function(){

            //SE OCULTAN BOTONES EN POR REPORTE CERRADO
            $('#modalBoton').hide();
            $('#cerrarReporte').hide();
            $("#guardarPeticion").show();

            //Tuserid = $("#user_id").val(); //OBTIENE ID DEL USER ACTUAL DE UN INPUT HIDE

            //AJAX PARA OBTENER DATOS DEL REPORTE PRINCIPAL
            $.ajax({
                        url:        window.server + "bugs/view_bugs.php?id=" + Tbugid,
                        data:       "",
                        dataType:   "html",
                        success:    function(data){

                            var obj = $.parseJSON(data);
                            var datos = "";

                            $.each(obj.bugs, function(i,bug){
                                Tasunto = bug.asunto;
                                Tdescripcion = bug.descripcion;
                                Tsistemaoperativo = bug.sistemaoperativo;
                                Tsistema = bug.sistema_id;
                                Tnavegador = bug.navegador;
                                Tusername = bug.username;
                                Tnombre = bug.nombre;
                                Ttelefono = bug.telefono;
                                Tcorreo = bug.correo;
                                if(bug.activo==1){
                                    bug.activo = '<span class="tag success" style="font-size:12px;">Abierto</span>';
                                    $('#modalBoton').show();
                                    $('#cerrarReporte').show();
                                }
                                else{
                                    bug.activo = '<span class="tag alert" style="font-size:12px;">Cerrado</span>';
                                }
                                datos = datos +
                                "<tr class='default' align='center'><td><strong>Asunto: " + bug.asunto + "<br>" +
                                "Usuario: " + bug.username + "<br>"+
                                "Nombre: " + bug.nombre + "<br>"+
                                "Telefono: " + bug.telefono + "<br>"+
                                "Email: " + bug.correo + "<br>"+
                                "Sistema : " + bug.sistema_id + "<br>"+
                                "Sistema operativo : " + bug.sistemaoperativo + "<br>"+
                                "Navegador: " + bug.navegador + "<br>"+
                                bug.activo+ "</strong><br><br></td></tr>";

                            });

                            $("#datosbug").html(datos);

                        }

            });

            //ajax que obtiene id del estado "finalizado"
            $.ajax({
                        url:        window.server + "estadopeticiones/view_estadopeticiones_por_estado.php?estado=FINALIZADO",
                        data:       "",
                        dataType:   "html",
                        success:    function(data){
                            var obj = $.parseJSON(data);
                            var datos = "";

                            $.each(obj.estadopeticiones, function(i,estadopeticion){
                                Tfinalizadoid = estadopeticion.estado_id;
                            });

                        }

            });

             $.ajax({
                        url:        window.server + "estadopeticiones/view_estadopeticiones_por_estado.php?estado=ATENDIDO",
                        data:       "",
                        dataType:   "html",
                        success:    function(data){
                            var obj = $.parseJSON(data);
                            var datos = "";

                            $.each(obj.estadopeticiones, function(i,estadopeticion){
                                Tatendidoid = estadopeticion.estado_id;
                            });

                        }

            });


            //AJAX PARA OBTENER TODAS LAS PETICIONES Y RESPUTESTAS DEL REPORTE PRINCIPAL
            $.ajax({
                        url:        window.server + "peticiones/view_peticiones_por_bug.php?id=" + Tbugid,
                        data:       "",
                        dataType:   "html",
                        success:    function(data){

                            var obj = $.parseJSON(data);
                            var datos = "";
                            cont=0;

                            $.each(obj.peticiones, function(i,peticion){
                                if (cont==0){
                                    Testadoid = peticion.estadopeticion_id; //obtiene ultimo estado
                                }

                               datos = datos +
                                "<tr class='active'><td>Fecha: <strong>" + peticion.created + "</strong><br>" +
                                "Estado: <strong>" + peticion.estado + "</strong><br>" +
                                "Respuesta / Peticion: <strong>" + peticion.descripcion + "</strong><br>";
                                if(peticion.imagen == null){
                                      datos = datos + "<br><br><br></td></tr>";
                                }
                                //else if(peticion.imagen)
                                else {
                                    var tipo = peticion.imagen.split("application");
                                    if(tipo.length == 1){
                                        datos = datos + "Foto adjunta:<br><a target='_blank' href='" + peticion.imagen + "'><img width='200' style='width: 200px;' src='" + peticion.imagen + "'/></a><br><br><br><br></td></tr>";
                                    }
                                    else{
                                        var primera_division = peticion.imagen;
                                        var segunda_division = primera_division.split("/");
                                        var extension = segunda_division[1].split(";");
                                        datos = datos + "Archivo adjunto:<br><a href='"+peticion.imagen+"' class='btn btn-info' download='archivo_adjunto."+extension[0]+"'> Descargar <i class='glyphicon glyphicon-download'></i></a><br><br><br><br></td></tr>";
                                    }

                                }
                                cont++;
                            });
                            cont=0;
                                //alert(datos);
                            $("#showdata").html(datos);
                            //$("#showdata").load(location.href + "#showdata");

                        }

            });




            jQuery('#fotoPersona').on('change', function(e) {
                var Lector,
                oFileInput = this;

                if (oFileInput.files.length === 0) {
                    return;
                };

                Lector = new FileReader();
                Lector.onloadend = function(e) {
                    jQuery('#vistaPrevia').attr('src', e.target.result);
                };
                Lector.readAsDataURL(oFileInput.files[0]);
            });

        });


    // alert(nombreSistema);



     $("#guardarPeticion").click(function(){

        $("#guardarPeticion").hide();
        Tpeticionid = generateUUID();
        Trespuesta = $('#respuesta').val();
        Timagen = jQuery('#vistaPrevia').attr('src');

        if (Trespuesta != '' && Trespuesta != null) {
                    //AJAX PARA GUARDAR PETICION
            $.ajax({
                            type: "POST",
                            url:   window.server + "peticiones/add_peticiones.php",

                            data: ({
                                id: Tpeticionid,
                                bug_id: Tbugid,
                                estadopeticion_id: Tatendidoid,
                                descripcion: Trespuesta,
                                imagen: Timagen,
                            }),
                            cache: false,
                            success: function(data){
                              //location.reload();
                              data="";
                            }
            });//fin de ajax

            var Tleido = 0;
            //Actualiza reporte a no leido
            $.ajax({
                            type: "POST",
                            url:   window.server + "bugs/update_leido_bugs.php",

                            data: ({
                                bug_id: Tbugid,
                                leido:Tleido,
                            }),
                            cache: false,
                            success: function(data){
                                data="";
                            }
            });//fin de ajax

            var nombreSistema;
            $.ajax({
                        url:        window.server + "bugs/view_bugs.php?id=" + Tbugid,
                        data:       "",
                        dataType:   "html",
                        success:    function(data){

                            var obj = $.parseJSON(data);

                            $.each(obj.bugs, function(i,bug){
                                var nombreSistema = bug.sistema_id;
                                var dataString = 'bug_id=' + Tbugid + '&sistema=' + nombreSistema + '&asunto=' + Tasunto + '&descripcion=' + Tdescripcion + '&nombre=' + Tnombre + '&correo=' + Tcorreo + '&telefono=' + Ttelefono + '&tipo=' + "ans" ;

                                $.ajax({
                                      type: "POST",
                                      url: getUrl() + "/Bugs/enviarcorreo/",
                                      data: dataString,
                                      success: function(data) {
                                        alert('Guardado');
                                        location.reload();
                                        if (data == 'ok') {

                                        }else{
                                          //alert(data);
                                        }
                                      }
                                });
                            });

                        }

            });



        }else{
            alert('Porfavor escribe la observacion');
            $("#guardarPeticion").show();
        }



    });


     $("#cerrarReporte").click(function(){
        var agree=confirm("¿Confirma que su problema se resolvió y desea finalizar el reporte? ");

        if(agree){
            Tpeticionid = generateUUID();
            Trespuesta = "REPORTE FINALIZADO POR EL SUPERVISOR";
            Timagen = "";


            //AJAX PARA GUARDAR PETICION
            $.ajax({
                            type: "POST",
                            url:   window.server + "peticiones/add_peticiones.php",

                            data: ({
                                id: Tpeticionid,
                                bug_id: Tbugid,
                                estadopeticion_id: Tfinalizadoid,
                                descripcion: Trespuesta,
                                imagen: Timagen,
                            }),
                            cache: false,
                            success: function(data){
                              //alert(data);
                              data="";
                            }
            });//fin de ajax

            // //marca reporte como no leido
            // $.ajax({
            //                 type: "POST",
            //                 url:   window.server + "bugs/update_leido_bugs.php",

            //                 data: ({
            //                     bug_id: Tbugid,
            //                     leido:Tleido,
            //                 }),
            //                 cache: false,
            //                 success: function(data){
            //                     //alert(data);
            //                     //location.reload();
            //                     data="";
            //                 }
            // });//fin de ajax



            $.ajax({
                            type: "POST",
                            url:   window.server + "bugs/delete_bugs.php?id="+Tbugid,

                            data: ({
                                id: Tbugid,
                            }),
                            cache: false,
                            success: function(data){
                              data="";

                            }
            });//fin de ajax

            var dataString = 'bug_id=' + Tbugid + '&sistema=' + "SISTEMA DE RELACIONES PUBLICAS" + '&asunto=' + Tasunto + '&descripcion=' + Tdescripcion + '&nombre=' + Tnombre + '&correo=' + Tcorreo + '&telefono=' + Ttelefono + '&tipo=' + "del" ;

                    $.ajax({
              type: "POST",
              url: getUrl() + "/Bugs/enviarcorreo/",
              data: dataString,
              success: function(data) {
                window.location = getUrl() + "/bugs";
                if (data == 'ok') {

                }else{
                  //alert(data);
                }
              }
        });

        }

    });



  });


</script>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

<div class="cell auto-size padding20 bg-white" id="cell-content">
    <h1>Datos del reporte <span class="mif-bug place-right"></span></h1>
    <hr class="thin bg-grayLighter">
    <?= $this->Html->link(__('<i class="mdi mdi-file-document-box"></i> Listado'), ['controller'=>'Bugs','action' => 'all'],['escape'=>false, 'class'=>'btn btn-info']) ?>
    <button class="button success" onclick="metroDialog.toggle('#dialog1')" id="modalBoton"><span class="mif-bubble"></span> Responder</button>
    <button class="btn btn-danger" onclick="" id="cerrarReporte"><span class="mif-loop2"></span> Cerrar reporte</button><!--
    <button class="button alert" onclick="pushMessage('alert')">Stop all machines</button>
    <a class="button success" onclick="metroDialog.toggle('#dialog1')">Responder <span class="mif-plus" aria-hidden="true"></span></a> -->
    <div data-role="dialog" id="dialog1" style="border: solid 2px gray;" class="" data-overlay="true" data-overlay-color="op-dark" data-overlay-click-close="true">
        <form name="formulario" class="form-horizontal" data-toggle="validator" method="POST">
            <h5>&nbsp;&nbsp;Responder al reporte</h5>
            <hr class="bg-grayLight">
            <div class="grid condensed" style="width:30vw;">
              <!-- Dependientes -->
              <div class="row cells5 padding10  no-padding-top no-padding-bottom">
                <div class="cell colspan2 padding10 no-padding-left no-padding-right no-padding-bottom"><label>Respuesta</label></div>
                <!-- <div class="cell"></div> -->
                <!-- <div class="cell"></div> -->
                <div class="cell colspan2">
                  <div class="input-control select">
                    <?php echo $this->Form->input('respuesta',array('id'=>'respuesta','maxlength' => '1000', 'class'=>'form-control','label'=>'','type' => 'textarea','required' => true, 'autofocus', 'style' => 'resize: none;'));?>
                  </div>
                </div>
                <!-- <div class="cell"></div> -->
              </div>
              <!-- Dependientes -->
              <!-- fecha de Inicio -->
              <div class="row cells5" style="padding-top: 100px; padding-left: 8px;">
                <div class="cell colspan2 no-padding-left no-padding-right no-padding-bottom"><label>Foto (opcional)</label></div>
                <div class="cell colspan3">
                    <div class="input-control file" data-role="input">
                        <input type="file" name="fotoPersona" placeholder="Suba una foto" id="fotoPersona" />
                        <!-- <button class="button"><span class="mif-folder"></span></button> -->
                        <div>
                            <img width="0" id="vistaPrevia" /><br/>
                        </div>
                    </div>
                </div>
              </div>
              <!-- fecha de Inicio -->
              <!-- Monto -->
              <!-- Botones -->
              <hr class="bg-grayLight">
              <div data-role="group" class="place-right padding10 no-padding-top no-padding-bottom no-padding-left">
                <!-- <button class="button" onclick=""> Guardar </button> -->
                <?php echo $this->Form->button('Enviar',array('type'=>'button','class'=>'btn btn-success', 'style'=>'', 'id'=>'guardarPeticion')); ?>
                <button class="btn btn-danger" onclick="metroDialog.close('#dialog1')"> Cancelar </button>
              </div>
              <!-- Botones -->
            </div>
        </form>
    </div>

    <hr class="thin bg-grayLighter">

    <table id="bug" class="table table-bordered">
    <thead>
            <tr class="success">
                <td align="center"><strong>DATOS PRINCIPALES DEL REPORTE</strong></td>
            </tr>
        </thead>
 
        <tbody id="datosbug">
        </tbody>
    </table>

     <table id="peticiones" class="table striped hovered cell-hovered border bordered">
            <thead>
                <tr class="info">
                    <td><strong>RESPUESTAS Y PETICIONES</strong></td>
                </tr>
            </thead>

            <tbody id="showdata">
            </tbody>
    </table>
</div>
</div>
</div>
</div>
</div>