//todo: agrega el evento cuando la modal se abre!!
$(document).ready(function () {

    // Self-executing function




});

$('#myModal').on('shown.bs.modal', function () {
    //todo: comprobacion de envio
(function() {
    //todo: comprobacion de envio
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');

      //todo: comprobacion campo por campo
      $(function() { // jQuery ready
        // On blur validation listener for form elements
        $('.needs-validation').find('input,select,textarea').on('focusout', function() {
          // check element validity and change class
          $(this).removeClass('is-valid is-invalid')
            .addClass(this.checkValidity() ? 'is-valid' : 'is-invalid');
        });
      });

      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);

      });
    }, false);
  })();

})

$('#myModal2').on('shown.bs.modal', function () {
    //todo: comprobacion de envio
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      $("#vista").load("../view/newpacient-view.php");

      //todo: comprobacion campo por campo
      $(function() { // jQuery ready
        // On blur validation listener for form elements
        $('.needs-validation').find('input,select,textarea').on('focusout', function() {
          // check element validity and change class
          $(this).removeClass('is-valid is-invalid')
            .addClass(this.checkValidity() ? 'is-valid' : 'is-invalid');
        });
      });

      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);

      });
    }, false);


})



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

