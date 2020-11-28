//todo: FUNCIONA! JQUERY ESTA VIVO EN ESTE PROYECTO!!
$(document).ready(function () { });
$('#reserva').DataTable({
    language: {
        // "url": "http://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
        "sProcessing":     "Procesando...",
	"sLengthMenu":     "Mostrar _MENU_ registros",
	"sZeroRecords":    "No se encontraron resultados",
	"sEmptyTable":     "Ningún dato disponible en esta tabla",
	"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
	"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
	"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
	"sInfoPostFix":    "",
        "sSearch": "Buscar codigo o paciente:"
        
    },
    retrieve: true,
    Destroy: true,
    columnDefs: [
        { "targets": [6], "sortable": false, "orderable": false }
        // {
        //     data: 'accion',
        //     sortable: false,
        //     orderable: false
        // }
    ]
});

// function nameToInitials(fullName) {
//   const namesArray = fullName.split(' ');
//   if (namesArray.length === 1) return `${namesArray[0].charAt(0)}`;
//   else return `${namesArray[0].charAt(0)}${namesArray[namesArray.length - 1].charAt(0)}`;
// }

// function iniciales(name) {
//     name.match(/(\b\S)?/g).join("").toUpperCase()
// }

