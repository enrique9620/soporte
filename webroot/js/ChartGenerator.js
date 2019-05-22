
function ChartGenerator(url, nombreDiv, tituloPrincipal, color, filtroFecha, altoGrafica, conTabla, tipoTabla) {

    //onBeforeSend(nombreDiv);

        $.ajax({
            url: url,
            data: '',
            dataType: 'html',
            //begin:
            success: function (data) {

                var obj = $.parseJSON(data);
                var i = 0;
                var j = 0;
                var cont = 0;
                var dataArray = [];
                var dA = [];
                var dataArrayUnion = [];
                var dataArrayPivot = [];
                var dataArrayElement = [];
                var dato = 0;
                var nombreCategoria = [];
                var nombreSerie = [];
                var serieUrl = [];
                var elementos = [];

                var fechaInicioInverse = '';
                var fechaFinInverse = '';
                var titulosTabla = '';
                var datosTabla = '';
                var sumaTotal = 0;
                var ayudaUrl = '';
                var otrosTipos = '';

                var currentTime = new Date();
                var dia = currentTime.getDate();
                var mes = currentTime.getMonth() + 1;
                var anio = currentTime.getFullYear();

                if (altoGrafica == null)
                    altoGrafica = 270;

                if (dia < 10) {
                    dia = "0" + dia;
                }

                if (mes < 10) {
                    mes = "0" + mes;
                }

                if (conTabla == null) {
                    conTabla = true;
                }

                if ((tipoTabla == null)||(tipoTabla == '')) {
                    tipoTabla = "normal";
                }

                var hoy = dia + '/' + mes + '/' + anio;
                var hoyInverse = anio + '-' + mes + '-' + dia; //   YYYY-MM-DD

                //ASIGNA LOS PAR�METROS ENVIADOS POR JSON A LA GR�FICA
                $.each(obj.graph, function (i, item) {
                    options.chart.type = item.Tipo;
                    options.chart.renderTo = nombreDiv;
                    options.title.text = item.Titulo;
                    options.subtitle.text = item.Subtitulo;
                    //options.series[0].name = item.NombreSerie;
                    options.yAxis.title.text = item.YAxis;
                    options.tooltip.formatter = function () { return '' + this.x + ': ' + this.y + ' ' + item.Tooltip; }
                    //options.series[0].color = color;
                    fechaInicioInverse = item.FechaInicio;
                    fechaFinInverse = item.FechaFin;

                    if (item.Ayuda != undefined)
                        ayudaUrl = 'http://' + window.server + item.Ayuda;
                    else
                        ayudaUrl = null;


                    if (item.OtrosTipos != undefined)
                        otrosTipos = item.OtrosTipos
                    else
                        otrosTipos = null;


                    $.each(item.nombreCategoria, function (j, itm) {
                        nombreCategoria[j] = itm.Descripcion;
                    });
                });

                //ESTO SE HACE YA QUE LA FECHA SE RECIBE EN FORMATO YYYY-MM-DD Y PARA DAR M�S VISTA SE CONVIERTE A DD-MM-YYYY
                var resFechaInicio = fechaInicioInverse.split("-");
                var fechaInicio = resFechaInicio[2] + "/" + resFechaInicio[1] + "/" + resFechaInicio[0]; // DD/MM/YYYY

                var resFechaFin = fechaFinInverse.split("-");
                var fechaFin = resFechaFin[2] + "/" + resFechaFin[1] + "/" + resFechaFin[0]; // DD/MM/YYYY

                //ASIGNA LOS DATOS DEL EJE X
                var filas = 0;
                $.each(obj.data, function (i, item) {
                    $.each(item, function (j, itm) {
                        options.xAxis.categories[i] = itm.Descripcion; //son los caption
                        nombreSerie[i] = itm.Descripcion;
                        dataArray[i] = itm.Total;
                    });
                    //serieUrl[i] = item.Url;
                });

                //B�SICAMENTE ES EL MISMO CICLO ANTERIOR, PERO S�LO GENERA LA TABLA.
                //ANTES SE HAC�A EN UN MISMO CICLO, PERO POR ORGANIZACI�N ES MEJOR SEPARARLO.

                var filas = 0;
                $.each(obj.data, function (i, item) {
                    $.each(item, function (j, itm) {

                        //EN CASO DE QUE HAYA MUCHAS M�S DE UNA SERIE POR ETIQUETA, ENTONCES ENTRA AL CICLO PARA QUE SUME CADA UNO DE LOS ELEMENTOS EN LA TABLA
                        dA[i] = (itm.Total).toString();
                        elementos = (dA[i]).split(",");

                        //EN CASO DE QUE SEA UNA TABLA INVERTIDA
                            if (elementos.length > 0) {//LOS RESULTADOS LLEGAN COMO 4,7,3. EL CICLO LOS SEPARA Y LOS SUMA
                                itm.Total = 0;
                                $.each(elementos, function (k, elm) {
                                    itm.Total = itm.Total + parseInt(elementos[k]);
                                });
                            }

                        //EN CASO DE QUE LA TABLA SEA DE TIPO NORMAL
                        if (tipoTabla == "normal") { //EL IF SE PONE AQU� PORQUE NECESITO LOS PROCESOS ANTERIORES
                            //ASIGNO VALORES A LA TABLA
                            datosTabla = datosTabla + '<tr><th>' + itm.Descripcion + '</th>' + '<th>' + itm.Total + '</th></tr>';
                            sumaTotal += parseInt(itm.Total); //ME HACE LA SUMATORIA DE LOS TOTALES
                        }
                        filas++;
                    });
                });


                //EN CASO DE QUE LA TABLA SEA INVERSA
                if (tipoTabla != "normal") {
                    $.each(elementos, function (i, item) {
                        //ASIGNO VALORES A LA TABLA
                        datosTabla = datosTabla + '<tr><th>' + nombreCategoria[i] + '</th>' + '<th>' + elementos[i] + '</th></tr>';
                        sumaTotal += parseInt(elementos[i]); //ME HACE LA SUMATORIA DE LOS TOTALES
                        filas++;
                    });
                }



                //options.xAxis.categories = nombreSerie;//SON LOS CAPTION

                if (filas > 1) {
                    datosTabla = datosTabla + '<tr><th>SUMATORIA</th><th>' + sumaTotal + '</th></tr>';
                }

                //ASIGNA LOS T�TULOS DE LA TABLA
                $.each(obj.table, function (i, item) {
                    titulosTabla = titulosTabla + '<th>' + item.Titulo + '</th>';
                });

                //$('#' + nombreDiv).prepend('<div class="panel panel-default"><div class="panel-heading"><h3 class="panel-title">Panel title</h3></div><div class="panel-body">');

                //DIBUJA LA GR�FICA
                var chart = new Highcharts.Chart(options);


                for (i = 0; i < dataArray[0].length; i++) {
                    for (j = 0; j < nombreSerie.length; j++) {
                        dataArrayElement[j] = dataArray[j][i];
                    }
                    dataArrayPivot[i] = dataArrayElement;

                    //console.log(serieUrl[i]);

                    //INSERTA LOS VALORES DE LAS BARRAS
                    chart.addSeries({
                        name: nombreCategoria[i],
                        data: dataArrayPivot[i],
                        //cursor: 'pointer',
                        //point: {
                        //    events: {
                        //        click: function () {
                        //            location.href = serieUrl[i];
                        //        }
                        //    }
                        //}
                    }
                    , true);
                }

                chart.redraw();


                //PARA AHORRAR C�DIGO, TODAS LAS CONSULTAS TIENEN RANGO DE FECHA, PERO SI EL USUARIO QUIERE QUITAR EL FILTRO DE FECHAS ENTONCES USAMOS
                //UN RANGO MUY GRANDE EJ. 1900-01-01    2050-01-01
                //NO SE DEBE MOSTRAR ESTO EN EL T�TULO.

                if ((fechaInicio == '01/01/1900') && (fechaFin == '31/12/2050') && (filtroFecha == true)) {
                    $('#' + nombreDiv).prepend('<h2>' + tituloPrincipal + '<small></small></h2><br />');
                }
                else {

                    //LE PONE EL T�TULO PRINCIPAL A TODO EL DIV. COMO UTILIZA prepend LO PONE AL INICIO.
                    if ((fechaInicio == hoy) && (fechaFin == hoy) && (filtroFecha == true)) {
                        $('#' + nombreDiv).prepend('<h2>' + tituloPrincipal + '<small> del d&iacute;a</small></h2><br />');
                    }
                    else if (filtroFecha == true) {
                        $('#' + nombreDiv).prepend('<h2>' + tituloPrincipal + '<small> del ' + fechaInicio + ' al ' + fechaFin + '</small></h2><br />');
                    }
                    else if (filtroFecha == false) {
                        $('#' + nombreDiv).prepend('<h2>' + tituloPrincipal + '<small> a la fecha</small></h2><br />');
                    }
                }

                if (conTabla == true) {
                    tabla =
                        '<br /><br />' +
                        '<div class="collapse" id="' + nombreDiv + 'Tabla">' +
                            '<div class="well">' +
                                '<table class="table table-bordered">' +
                                    '<thead>' +
                                        '<tr>' +
                                            titulosTabla +
                                        '</tr>' +
                                        datosTabla +
                                    '</thead>' +
                                '</table>' +
                            '</div>' +
                        '</div>';

                    $('#' + nombreDiv).append('<a class="btn btn-default btn-sm" style="float: right;" data-toggle="collapse" href="#' + nombreDiv + 'Tabla" aria-expanded="false" aria-controls="collapseExample">Mostrar Tabla</a>');

                    if (ayudaUrl !== null) {
                        $('#' + nombreDiv).append('<a class="btn btn-default btn-sm" data-toggle="modal" data-target="#contenedorModalModalBox" aria-label="Left Align" href="#' + nombreDiv + 'Tabla"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>&nbsp;&nbsp;Ayuda</a>');
                    }

                    if (otrosTipos !== null) {
                        $('#' + nombreDiv).append('<a class="btn btn-primary btn-sm" style="float: right; margin-right: 30px;" href="' + otrosTipos + '" target="_blank"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;&nbsp;Ver columnas restantes</a>');
                    }

                    $('#' + nombreDiv).append(tabla);
                }

                //DA LINE
                //$('#' + nombreDiv).append("<hr />");
            },
        });

    var options = {
        chart: {
            height: altoGrafica,
            renderTo: '',
            zoomType: 'xy',
            type: ''
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [],

        },
        yAxis: {
            min: 0,
            title: {
                text: ''
            }
        },
        legend: {
            layout: 'horizontal',
            maxHeight: 100,
            backgroundColor: '#FFFFFF',
            //align: 'left',
            //verticalAlign: 'top',
            itemDistance: 50,
            x: 0,
            //y: 20,
            //floating: true,
            shadow: true
        },
        tooltip: {
            formatter: function () {
                return '' + this.x + ': ' + this.y + '';
            }
        },
        plotOptions: {
            column: {
                dataLabels: {
                    enabled: true
                },

                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        exporting: {
            enabled: true
        },
        //series: [{
        //    name: '',
        //    data: [{}],

        //    cursor: 'pointer',
        //    point: {
        //        events: {
        //            //click: function () {
        //            //    location.href = this.options.url;
        //            //}
        //        }
        //    },
        //    color: ''
        //}]
    };
};
