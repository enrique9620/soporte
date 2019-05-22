

function TileGenerator(url, nombreDiv, tituloPrincipal, color, size) {

    var tileSize = '';

    if (size == 1) {
        tileSize = 'half';
    }
    if (size == 2) {
        tileSize = '';
    }
    if (size == 3) {
        tileSize = 'double';
    }
    if (size == 4) {
        tileSize = 'triple';
    }
    if (size == 5) {
        tileSize = 'quadro';
    }
    if (size == '') {
        tileSize = 'double';
    }


    $.ajax({
		url: url,
		data: '',
		dataType: 'html',
		success: function (data) {

		    var obj = $.parseJSON(data);
		    var tabla = '';
		    var tituloPrincipalTexto = '';

			//ASIGNA LOS PARÁMETROS ENVIADOS POR JSON A LA GRÁFICA
		    $.each(obj.data, function (i, item) {

		        if (tituloPrincipal == null)
		            tituloPrincipalTexto = item.Descripcion;
		        else
		            tituloPrincipalTexto = tituloPrincipal;

		        tabla =
                '<div class="tile '+ tileSize +'" style="background-color:' + color + ';">' +
                    '<div class="tile-content icon">' +
                        '<div class="icon-cart-2">' + item.Total + '</div>' +
                    '</div>' +
                    '<div class="tile-status">' +
                        '<span class="name">' + tituloPrincipalTexto + '</span>' +
                    '</div>' +
                '</div>';
			});

			$('#' + nombreDiv).append(tabla);
		},
    });

};



function TileGeneratorText(textoPrincipal, textoAlternativo,  nombreDiv, color, size, url) {

    var tileSize = '';

    if (size == 1) {
        tileSize = 'half';
    }
    if (size == 2) {
        tileSize = '';
    }
    if (size == 3) {
        tileSize = 'double';
    }
    if (size == 4) {
        tileSize = 'triple';
    }
    if (size == 5) {
        tileSize = 'quadro';
    }
    if (size == '') {
        tileSize = 'double';
    }

            tabla =
            '<div class="tile ' + tileSize + '" style="background-color:' + color + ';">' +
                '<a href="'+ url +'">' +
                    '<div class="tile-content icon">' +
                        '<div><font color="#FFF"><h3>' + textoPrincipal + '</h3></font></div>' +
                    '</div>' + 
                    '<div class="tile-status">' +
                        '<span class="name">' + textoAlternativo + '</span>' +
                    '</div>' +
                '</a>' +
            '</div>';

            $('#' + nombreDiv).append(tabla);
};
 
