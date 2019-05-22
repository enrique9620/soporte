  // $( function() {
  //   $( ".datepicker" ).datepicker({
  //   	'dateFormat':"yy-mm-dd",
  //   	changeMonth:true, 
  //   	changeYear:true
  //   });
  // });
  //calendario https://bootstrap-datepicker.readthedocs.io/en/latest/options.html

$( function() {
  $.fn.datepicker.dates['es'] = {
    days: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado"],
    daysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sáb"],
    daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sá"],
    months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
    monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
    today: "Today",
    clear: "Clear",
    //format: "mm/dd/yyyy",
    titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
    weekStart: 0
};
$('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy/mm/dd',
            language:'es'

        });
 });