
function SimpleModalGenerator(titulo, url, nombreDiv) {

    var nombreDiv = 'contenedorModal';

    $('#' + nombreDiv + 'ModalBox').on('shown.bs.modal', function () { });

        $.ajax({
            url: url,
            data: '',
            dataType: 'html',
            success: function (data) {

                $.get(url, function (contenido) {

                    modal =
                    '<div class="modal fade" id="' + nombreDiv + 'ModalBox' + '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">' +
                        '<div class="modal-dialog">' +
                            '<div class="modal-content">' +
                                '<div class="modal-header">' +
                                    '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                    '<h4 class="modal-title" id="myModalLabel">' + titulo + '</h4>' +
                                '</div>' +

                                '<div class="modal-body">' +
                                    contenido
                                '</div>' +

                                '<div class="modal-footer">' +
                                    '<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                    '</div>';

                    $('#' + nombreDiv).append(modal);

                }, 'html');  // or 'text', 'xml', 'more'
            }
        });
};
 
