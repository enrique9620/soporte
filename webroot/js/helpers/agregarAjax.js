function agregarDireccionesFuncionario(){
    countDireccionAdicional = countDireccionAdicional + 1;
    campo =
        "<div class='panel panel-default' id='direccionAdicional" + countDireccionAdicional + "'>" +
            "<div class='panel-heading'>" +
                "<h3 class='panel-title pull-left'>DIRECCIÓN ADICIONAL (DE FUNCIONARIO)</h3>" +
                "<button type='button' class='btn btn-default pull-right' onclick='eliminarDireccion();'>" +
                  "<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>" +
                "</button>" +
                "<div class='clearfix'></div>" +
            "</div>" +

            "<!-- CP -->" +
            "<div class='form-group' style='margin-right: 40px;'>" +
                "<label class='col-sm-2 control-label'>Código Postal *</label>" +
                "<div class='col-sm-10'>" +
                    "<div class='row'>" +
                      "<div class='col-md-2'>" +
                        "<input type='text' name='cp[]' id='cp" + (++countDireccionFuncionario) + "' onkeypress='return numeros(event)' maxlength='5' class='form-control'>" +
                      "</div>" +
                      "<div class='col-md-3'>" +
                        "<input type='text' name='estado[]' id='estado" + countDireccionFuncionario + "' class='form-control' placeholder='Estado' disabled>" +
                      "</div>" +
                      "<div class='col-md-3'>" +
                        "<input type='text' name='municipio[]' id='municipio" + countDireccionFuncionario + "' class='form-control' placeholder='Municipio' disabled>" +
                      "</div>" +
                      "<div class='col-md-3'>" +
                        "<input type='text' name='ciudad[]' id='ciudad" + countDireccionFuncionario + "' class='form-control' placeholder='Ciudad' disabled>" +
                      "</div>" +
                    "</div>" +
                "</div>" +
            "</div>" +
            "<!-- CP -->" +

            "<!-- Colonia -->" +
            "<div class='form-group required' style='margin-right: 40px;'>" +
                "<label class='col-sm-2 control-label'>Colonia</label>" +
                "<div class='col-sm-10'>" +
                    "<select name='colonia[]' id='colonia" + countDireccionFuncionario + "' empty='true' class='form-control js-example-basic-multiple' required disabled>"+
                    "</select>"+
                "</div>"+
            "</div>"+
            "<!-- Colonia -->"+

            "<!-- Calle -->" +
            "<div class='form-group' style='margin-right: 40px;'>" +
                "<label class='col-sm-2 control-label'>Calle *</label>" +
                "<div class='col-sm-10'>" +
                    "<input type='text' name='calle[]' id='calle" + countDireccionFuncionario + "' class='form-control' required >" +
                "</div>" +
            "</div>" +
            "<!-- Calle -->" +

            "<!-- Exterior -->" +
            "<div class='form-group' style='margin-right: 40px;'>" +
                "<label class='col-sm-2 control-label'>Número Exterior</label>" +
                "<div class='col-sm-10'>" +
                    "<input type='text' name='exterior[]' id='exterior" + countDireccionFuncionario + "'  class='form-control'>" +
                "</div>" +
            "</div>" +
            "<!-- Exterior -->" +

            "<!-- Interior -->" +
            "<div class='form-group' style='margin-right: 40px;'>" +
                "<label class='col-sm-2 control-label'>Número Interior</label>" +
                "<div class='col-sm-10'>" +
                    "<input type='text' name='interior[]' id='interior" + countDireccionFuncionario + "' class='form-control'>" +
                "</div>" +
            "</div>" +
            "<!-- Interior -->" +

            "<!-- Cruzamientos -->" +
            "<div class='form-group' style='margin-right: 40px;'>" +
                "<label class='col-sm-2 control-label'>Cruzamientos</label>" +
                "<div class='col-sm-10'>" +
                    "<input type='text' name='cruzamientos[]' id='cruzamientos" + countDireccionFuncionario + "' class='form-control'>" +
                "</div>" +
            "</div>" +
            "<!-- Cruzamientos -->" +

            "<!-- Referencia -->" +
            "<div class='form-group' style='margin-right: 40px;'>" +
                "<label class='col-sm-2 control-label'>Referencia</label>" +
                "<div class='col-sm-10'>" +
                    "<input type='text' name='referencia[]' id='referencia" + countDireccionFuncionario + "' class='form-control'>" +
                "</div>" +
            "</div>" +
            "<!-- Referencia -->" +

            "<!-- Tipo de Dirección -->"+
            "<div class='form-group required' style='margin-right: 40px;'>"+
                "<label class='col-sm-2 control-label'>Tipo de Dirección *</label>"+
                "<div class='col-sm-10'>"+
                    "<select name='tipodireccion[]' id='tipodireccion" + countDireccionFuncionario + "' empty='true' class='form-control js-example-basic-multiple' required>"+
                    "</select>"+
                "</div>"+
            "</div>"+
            "<!-- Tipo de Dirección-->"+
        "</div>";

    $("#direccionesAdicionales").append(campo);

    /*
    $.getJSON(getUrl() + '/colonias/getajax', function(data, status){
          $("#colonia"+countDireccionFuncionario).select2({
              placeholder: "Seleccione una colonia",
              data: data,
              allowClear: true
          });
    });
    */

    $(document).ready(function(){
        $("#cp"+countDireccionFuncionario).change(function(){
            var texto = "";
            var tag = $("#cp"+countDireccionFuncionario).val();
            $.getJSON("http://magistradogabino.com/API/cpv1/GetCP.php/"+tag, function(resultado){
                $.each(resultado, function(i, datos){
                    $("#cp"+countDireccionFuncionario).val(datos.CodigoPostal);
                    $("#estado"+countDireccionFuncionario).val(datos.Estado);
                    $("#municipio"+countDireccionFuncionario).val(datos.Municipio);
                    $("#ciudad"+countDireccionFuncionario).val(datos.Ciudad);
                    $("#colonia"+countDireccionFuncionario).select2({
                        placeholder: "Seleccione una colonia",
                        data: datos.Colonias,
                        allowClear: true,
                        disabled:false
                    });
                });
            });
            $("#colonia"+countDireccionFuncionario).empty();
        });
    });

    $.getJSON(getUrl() + '/tipodirecciones/getajax', function(data, status){
        $("#tipodireccion"+countDireccionFuncionario).select2({
            placeholder: "Seleccione un tipo de dirección",
            data: data,
            allowClear: true
        });
    });
}

function eliminarDireccion(){
    $("#direccionAdicional"+countDireccionAdicional).remove();
    countDireccionAdicional = countDireccionAdicional - 1;
}

function agregarTelefonosFuncionario() {
    countTelefonoAdicional = countTelefonoAdicional + 1;
    campo =
        "<div class='panel panel-default' id='telefonoAdicional" + countTelefonoAdicional + "'>" +
          "<div class='panel-heading'>" +
                "<h3 class='panel-title pull-left'>TELÉFONO ADICIONAL (DE FUNCIONARIO)</h3>" +
                "<button type='button' class='btn btn-default pull-right' onclick='eliminarTelefono();'>" +
                  "<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>" +
                "</button>" +
                "<div class='clearfix'></div>" +
          "</div>" +
            "<!-- Teléfono -->" +
            "<div class='form-group' style='margin-right: 40px;'>" +
                "<label class='col-sm-2 control-label'>Teléfono *</label>" +
                "<div class='col-sm-10'>" +
                    "<input type='input' name='telefono[]' id='telefono" + (++countTelefonoFuncionario) + "' onkeypress='return numeros(event)' maxlength='10' class='form-control' required>" +
                "</div>" +
            "</div>" +
            "<!-- Teléfono -->" +

            "<!-- Extensión -->" +
            "<div class='form-group' style='margin-right: 40px;'>" +
                "<label class='col-sm-2 control-label'>Extensión</label>" +
                "<div class='col-sm-10'>" +
                    "<input type='input' name='extension[]' id='extension" +countTelefonoFuncionario + "' onkeypress='return numeros(event)' maxlength='5' class='form-control'>" +
                "</div>" +
            "</div>" +
            "<!-- Extensión -->" +

            "<!-- Tipo de Teléfono -->" +
            "<div class='form-group required' style='margin-right: 40px;'>" +
                "<label class='col-sm-2 control-label'>Tipo de Teléfono *</label>" +
                "<div class='col-sm-10'>" +
                  "<select name='tipotelefono[]'  id='tipotelefono" +countTelefonoFuncionario + "' class='form-control js-example-basic-multiple' required>" +
                   "</select>" +
                "</div>" +
            "</div>" +
            "<!-- Tipo de Teléfono-->" +
        "</div>";

    $("#telefonosFuncionario").append(campo);

    $.getJSON(getUrl() + '/tipotelefonos/getajax', function(data, status){
        $("#tipotelefono"+countTelefonoFuncionario).select2({
            placeholder: "Seleccione un Tipo de teléfono",
            data: data,
            allowClear: true
        });
    });
}

function eliminarTelefono(){
    $("#telefonoAdicional"+countTelefonoAdicional).remove();
    countTelefonoAdicional = countTelefonoAdicional - 1;
}

function agregarContactos(){
    countContactoAdicional = countContactoAdicional + 1;
    campo =
        "<div class='panel panel-default' id='contactoAdicional" + countContactoAdicional + "'>" +
            "<div class='panel-heading'>" +
                "<h3 class='panel-title pull-left'>AGREGAR CONTACTO</h3>" +
                "<button type='button' class='btn btn-default pull-right' onclick='eliminarContacto();'>" +
                  "<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>" +
                "</button>" +
                "<div class='clearfix'></div>" +
            "</div>" +

            "<!-- Título -->" +
            "<div class='form-group' style='margin-right: 40px; margin-top: 20px;'>" +
                "<label class='col-sm-2 control-label'>Título *</label>" +
                "<div class='col-sm-10'>" +
                    "<select name='tituloContacto[]'  id='tituloContacto" + (++countContacto) + "' class='form-control js-example-basic-multiple' required>" +
                    "</select>" +
                "</div>" +
            "</div>" +
            "<!-- Título -->" +

            "<!-- Nombre -->" +
            "<div class='form-group' style='margin-right: 40px;'>" +
                "<label class='col-sm-2 control-label'>Nombre *</label>" +
                "<div class='col-sm-10'>" +
                    "<input type='input' name='nombreContacto[]' id='nombreContacto" + countContacto + "' class='form-control' required>" +
                "</div>" +
            "</div>" +
            "<!-- Nombre -->" +

            "<!-- Apellido -->" +
            "<div class='form-group' style='margin-right: 40px;'>" +
                "<label class='col-sm-2 control-label'>Apellido *</label>" +
                "<div class='col-sm-10'>" +
                    "<input type='input' name='apellidoContacto[]' id='apellidoContacto" + countContacto + "' class='form-control' required>" +
                "</div>" +
            "</div>" +
            "<!-- Apellido -->" +

            "<!-- Tipo de relación -->" +
            "<div class='form-group required' style='margin-right: 40px;'>" +
                "<label class='col-sm-2 control-label'>Relación con el funcionario *</label>" +
                "<div class='col-sm-10'>" +
                  "<select name='tiporelacionContacto[]' id='tiporelacionContacto" + countContacto + "' class='form-control js-example-basic-multiple' required>" +
                   "</select>" +
                "</div>" +
            "</div>" +
            "<!-- Tipo de relación-->" +

            "<!-- Correo -->" +
            "<div class='form-group' style='margin-right: 40px;'>" +
                "<label class='col-sm-2 control-label'>Correo</label>" +
                "<div class='col-sm-10'>" +
                    "<input type='input' name='correoContacto[]' id='correoContacto" + countContacto + "'  class='form-control'>" +
                "</div>" +
            "</div>" +
            "<!-- Correo -->" +

            "<!-- Teléfono -->" +
            "<div class='form-group' style='margin-right: 40px;'>" +
                "<label class='col-sm-2 control-label'>Teléfono</label>" +
                "<div class='col-sm-10'>" +
                    "<input type='input' name='telefonoContacto[]' id='telefonoContacto" + countContacto + "' onkeypress='return numeros(event)' maxlength='10' class='form-control'>" +
                "</div>" +
            "</div>" +
            "<!-- Teléfono -->" +

            "<!-- Extensión -->" +
            "<div class='form-group' style='margin-right: 40px;'>" +
                "<label class='col-sm-2 control-label'>Extensión</label>" +
                "<div class='col-sm-10'>" +
                    "<input type='input' name='extensionContacto[]' id='extensionContacto" + countContacto + "' onkeypress='return numeros(event)' maxlength='5' class='form-control'>" +
                "</div>" +
            "</div>" +
            "<!-- Extensión -->" +

            "<!-- Tipo de Teléfono -->" +
            "<div class='form-group required' style='margin-right: 40px;'>" +
                "<label class='col-sm-2 control-label'>Tipo de Teléfono</label>" +
                "<div class='col-sm-10'>" +
                  "<select name='tipotelefonoContacto[]' id='tipotelefonoContacto" + countContacto + "' class='form-control js-example-basic-multiple'>" +
                  "</select>" +
                "</div>" +
            "</div>" +
            "<!-- Tipo de Teléfono-->" +
        "</div>";

    $("#contactosAdicionales").append(campo);

        $.getJSON(getUrl() + '/titulos/getajax', function(data, status){
            $("#tituloContacto"+countContacto).select2({
                placeholder: "Seleccione un Título",
                data: data,
                allowClear: true
            });
        });

        $.getJSON(getUrl() + '/tipotelefonos/getajax', function(data, status){
          $("#tipotelefonoContacto"+ countContacto).select2({
              placeholder: "Seleccione un Tipo de teléfono",
              data: data,
              allowClear: true
          });
        });

        $.getJSON(getUrl() + '/tiporelacion/getajax', function(data, status){
            $("#tiporelacionContacto"+countContacto).select2({
                placeholder: "Seleccione el tipo de relación",
                data: data,
                allowClear: true
            });
        });

        $(function() {
            $('#correoContacto'+countContacto).multiple_emails({theme: "Basic"});
        });

        $( '#btntelcontacto').prop( 'disabled', false );

}

function eliminarContacto(){
    $("#contactoAdicional"+countContactoAdicional).remove();
    countContactoAdicional = countContactoAdicional - 1;
}
