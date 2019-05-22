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
                    "<input type='email' name='correoContacto[]' id='correoContacto" + countContacto + "'  class='form-control'>" +
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
        document.getElementById('btnGuardar').style.visibility='visible';
}

function eliminarContacto(){
    $("#contactoAdicional"+countContactoAdicional).remove();
    countContactoAdicional = countContactoAdicional - 1;

    if(countContactoAdicional == 0){
      document.getElementById('btnGuardar').style.visibility='hidden';
    }
}
/*
$(document).ready(function() {
    $('#cp" . $count . "').change(function(){
        var tag = $('#cp" . $count . "').val();
        $.getJSON('http://magistradogabino.com/API/cpv1/GetCP.php/'+tag, function(resultado){
            $.each(resultado, function(i, datos){
                $('#estado" . $count . "').val(datos.Estado);
                $('#municipio" . $count . "').val(datos.Municipio);
                $('#ciudad" . $count . "').val(datos.Ciudad);
                $('#colonia" . $count . "').select2({
                    placeholder: 'Seleccione una colonia',
                    data: datos.Colonias,
                    allowClear: true,
                    disabled:false
                });
            });
        });
        $('#colonia" . $count . "').empty();
    });


});
*/
