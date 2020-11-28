//todo: FUNCIONA! JQUERY ESTA VIVO EN ESTE PROYECTO!!
$(document).ready(function () { });
$('#paciente').DataTable({
    language: {
        "url": "http://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
    },
    retrieve: true,
    Destroy: true,
    columnDefs: [
        { "targets": [7], "sortable": false, "orderable": false }
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

