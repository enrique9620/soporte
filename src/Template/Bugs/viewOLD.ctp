

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
                                Tnavegador = bug.navegador;
                                Tusername = bug.username;
                                Tnombre = bug.nombre;
                                Ttelefono = bug.telefono;
                                Tcorreo = bug.correo;
                                if(bug.activo==1){
                                    bug.activo = '<span class="label label-success" style="font-size:12px;">Abierto</span>';
                                    $('#modalBoton').show();
                                    $('#cerrarReporte').show();
                                }
                                else{
                                    bug.activo = '<span class="label label-danger" style="font-size:12px;">Cerrado</span>';
                                }
                                datos = datos +
                                "<tr class='default' align='center'><td><strong>Asunto: " + bug.asunto + "<br>" +
                                "Usuario: " + bug.username + "<br>"+
                                "Nombre: " + bug.nombre + "<br>"+
                                "Telefono: " + bug.telefono + "<br>"+
                                "Email: " + bug.correo + "<br>"+
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
                                        datos = datos + "Foto adjunta:<br><a target='_blank' href='" + peticion.imagen + "'><img width='200' src='" + peticion.imagen + "'/></a><br><br><br><br></td></tr>";
                                    }
                                    else{
                                        datos = datos + "Archivo adjunto:<br><a href='"+peticion.imagen+"' class='btn btn-info'>Download <i class='glyphicon glyphicon-download'></i></a><br><br><br><br></td></tr>";
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

     $("#guardarPeticion").click(function(){
        $("#guardarPeticion").hide();
        Tpeticionid = generateUUID();
        Trespuesta = $('#respuesta').val();
        Timagen = jQuery('#vistaPrevia').attr('src');
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
                            //alert(data);
                            //location.reload();
                            data="";
                        }
        });//fin de ajax

        var dataString = 'bug_id=' + Tbugid + '&sistema=' + "SISTEMA DE RELACIONES PUBLICAS" + '&asunto=' + Tasunto + '&descripcion=' + Tdescripcion + '&nombre=' + Tnombre + '&correo=' + Tcorreo + '&telefono=' + Ttelefono + '&tipo=' + "ans" ;

        $.ajax({
              type: "POST",
              url: getUrl() + "/Bugs/enviarcorreo/",
              data: dataString,
              success: function(data) {
                 //alert(data);
                location.reload();
                if (data == 'ok') {
                    
                }else{
                  //alert(data);
                }
              }
        });
        

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



          /**********************************************************************/
          /**********************************************************************/
          /**********************************************************************/
          /**********************************************************************/
          /**********************************************************************/


          //MÉTODO SÓLO PARA GUARDAR AL ALUMNO, SE PUEDE REUTILIZAR MUCHO CÓDIGO CON EL MÉTODO CONTINUAR
           

  }); 


</script>
<!-- <div class="col-md-2">
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
<div class="col-md-12">
<div class="text-right" style="margin-bottom: 10px;">
    <?php echo $this->Html->link('<i class="glyphicon glyphicon-list"></i>&nbsp;Listado', array('action' => 'index'),array('escape'=>false)); ?>
  <button type="button" id="modalBoton" class='btn btn-success' style="margin-left: 10px; position:relative;" data-toggle="modal" data-target="#respuestaModal">Responder</button>
  <button type="button" id="cerrarReporte" class='btn btn-danger' style="margin-left: 10px; position:relative;">Cerrar Reporte</button>
</div>
<table id="bug" class="table table-bordered">
    <thead>
            <tr class="success">
                <td align="center"><strong>DATOS PRINCIPALES DEL REPORTE</strong></td>
            </tr>
        </thead>

        <tbody id="datosbug">
            <!-- <tr class="warning" id="showdata2">
                <th> hey</th>
                <th> hey</th>
                <th> hey</th>
            </tr> -->
        </tbody>
</table>
 <table id="peticiones" class="table table-striped table-hover table-bordered">
        <thead>
            <tr class="info">
                <td><strong>RESPUESTAS Y PETICIONES</strong></td>
            </tr>
        </thead>

        <tbody id="showdata">
            <!-- <tr class="warning" id="showdata2">
                <th> hey</th>
                <th> hey</th>
                <th> hey</th>
            </tr> -->
        </tbody>

       <!--  <div class="form-group">
            <div class="col-sm-10">
                 <?php 
                    $input = "<input hidden='true' id ='user_id' value='" . $users->id . "'/>";
                    echo $input;
                    $input = "<input hidden='true' id ='username' value='" . $users->username . "'/>";
                    echo $input;
                    $input = "<input hidden='true' id ='nombre' value='" . $users->nombre . " " . $users->apellido . "'/>";
                    echo $input;
                    $input = "<input hidden='true' id ='telefono' value='" . $users->telefono . "'/>";
                    echo $input;
                    $input = "<input hidden='true' id ='correo' value='" . $users->email . "'/>";
                    echo $input;
                ?>
            </div>
        </div> -->
        <!-- <tbody>
                <?php foreach ($bug->peticiones as $peticiones): ?>
            <tr>
                <td>Fecha: <?= h($peticiones->created) ?><br>
                Estado: <?= h($peticiones->estadopeticion_id) ?><br>
                Respuesta / Peticion: <?= h($peticiones->descripcion) ?><br><br><br></td>
            </tr>
            <?php endforeach; ?>
        </tbody> -->
        <!-- <div class="form-group">
            <div class="col-sm-10">

                <?php $user_id = $this->request->session()->read('User.id');
                    $user_id = "<input hidden='true' id ='user_id' value='" . $user_id . "'/>";
                    echo $user_id;
                ?>
            </div>
        </div> -->
</table>
<div id="respuestaModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Responder a reporte</h3>
            </div>

            <div class="modal-body">

                <form name="formulario" class="form-horizontal" data-toggle="validator" method="POST">

                    <!-- Nombre -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Respuesta</label>
                        <div class="col-sm-10">
                            <?php echo $this->Form->input('respuesta',array('id'=>'respuesta','maxlength' => '1000', 'class'=>'form-control','label'=>'','type' => 'textarea','required', 'autofocus'));?>
                        </div>
                    </div>
                    <!-- Nombre-->
                    <br>
                    <label>Puede adjuntar un archivo o una foto del problema. (1MB Max.) **Opcional**</label>
                    <br>
                    <!-- FOTO -->
                    <br>
                    <div class="input-row">
                      <input type="file" name="fotoPersona" placeholder="Suba una foto" id="fotoPersona" />
                    </div>
                    <!-- FOTO -->

                    <!-- VISTA PREVIA DE FOTO -->
                    <div>
                        <img width="200" id="vistaPrevia" /><br/>
                    </div>
                    <!-- VISTA PREVIA DE FOTO -->

                    <div class="modal-footer" style="margin-top:50px;">
                            <?php echo $this->Form->button('Enviar',array('type'=>'button','class'=>'btn btn-primary', 'style'=>'margin-top:25px;', 'id'=>'guardarPeticion')); ?>
                    </div>

                </form>
                <!-- formulario -->
            </div>
        </div>
    </div>
</div>
<!-- Modal titulos -->