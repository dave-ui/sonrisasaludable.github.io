<?php
$pacients = PacientData::getAll();
$medics = MedicData::getAll();

$statuses = StatusData::getAll();
$payments = PaymentData::getAll();

/// get the current date from database
$base = new Database();
$con = $base->connect();
$sql = "select date(NOW()) as now";
$query = $con->query($sql);
$now = null;
while ($r = $query->fetch_array()) {
  $found = true;
  $now = $r['now'];
}
?>

<section class="content">
  <div id="calendar"></div>

  <?php
  $thejson = null;

  $events = null;
  if (isset($_GET["medic_id"]) && $_GET["medic_id"] != "" && isset($_GET["status_id"]) && $_GET["status_id"] != "") {
    $events = ReservationData::getAllByMedicIdS($_GET["medic_id"], $_GET["status_id"]);
  } else {
    $events = ReservationData::getPendings();
  }

  foreach ($events as $event) {
    $medic = $event->getMedic();

    $k = date('N', strtotime($event->date_at));

    $datax = $medic->{'time' . $k . '_data'};

    $datax = htmlspecialchars_decode($datax);

    $datax = unserialize($datax);
    //echo "---------------";
    $strtoco = "$event->time_at + " . $datax["duration"] . " minute";
    $newtimestamp = strtotime($strtoco);
    //echo "---------------";
    //$newtimestamp = strtotime($strtoco);


    $pacient = $event->getPacient();
    $thejson[] = array("title" => $pacient->name . " " . $pacient->lastname . " - " . $event->title . " - " . $medic->name . " " . $medic->lastname, "url" => "./?view=editreservation&id=" . $event->id, "start" => $event->date_at . "T" . $event->time_at, "end" => $event->date_at . "T" . date('H:i:s', $newtimestamp));
  }
  // print_r(json_encode($thejson));

  ?>
  <script>
    $(document).ready(function() {

      var calendar = $('#calendar').fullCalendar({
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
        },
        defaultDate: '<?php echo $now; ?>',
        editable: false,
        eventLimit: true, // allow "more" link when too many events
        events: <?php echo json_encode($thejson); ?>,
        selectable: true,
        selectHelper: true,
        select: function(start, end, allDay) {
          //var title = prompt('Event Title:');
          $('#myModal').modal('show');
          var date_at = document.getElementById("date_at");
          var pacient = document.getElementById("pacient_id");
          var medic = document.getElementById("medic_id");
          var note = document.getElementById("note");
          date_at.value = moment(start).format('YYYY-MM-DD');
          time_at.value = moment(start).format('HH:mm');
          $('#start').val(start);
          $('#end').val(end);
          // $('#allDay').val(allDay);
          //    console.log(moment(end).format('YYYY-MM-DD'));
          $('#newquickreservationform').submit(function(e) {
            e.preventDefault();
            var pacient = document.getElementById("pacient_id");
            var medic = document.getElementById("medic_id");
            var pacient_text = pacient.options[pacient.selectedIndex].text;
            var medic_text = medic.options[medic.selectedIndex].text;
            var title = document.getElementById("title");
            if (title.value != "" && pacient.value != "" && medic.value != "") {
              calendar.fullCalendar('renderEvent', {
                  title: pacient_text + " - " + title.value + " - " + medic_text,
                  start: date_at.value + "T" + time_at.value //moment($('#start').val()),
                  //end: moment($('#end').val())
                },
                true // make the event "stick"
              );
              jQuery.post(
                "./?action=addreservation" // your url
                , $("#newquickreservationform").serialize()
              );

              calendar.fullCalendar('unselect');
              $('#myModal').modal('hide');
            }
            title.value = "";
            pacient.value = "";
            medic.value = "";
            note.value = "";
          });

          $('#newquickreservationform2').submit(function(e) {
            e.preventDefault();
            var pacient = document.getElementById("pacient_id");
            var medic = document.getElementById("medic_id");
            var pacient_text = pacient.options[pacient.selectedIndex].text;
            var medic_text = medic.options[medic.selectedIndex].text;
            var title = document.getElementById("title");
            if (title.value != "" && pacient.value != "" && medic.value != "") {
              calendar.fullCalendar('renderEvent', {
                  title: pacient_text + " - " + title.value + " - " + medic_text,
                  start: date_at.value + "T" + time_at.value //moment($('#start').val()),
                  //end: moment($('#end').val())
                },
                true // make the event "stick"
              );
              jQuery.post(
                "./?action=addreservation" // your url
                , $("#newquickreservationform").serialize()
              );

              calendar.fullCalendar('unselect');
              $('#myModal').modal('hide');
            }
            title.value = "";
            pacient.value = "";
            medic.value = "";
            note.value = "";
          });

          console.log(allDay);
          /*if (title) {
          }
           */
        }

      });



    });
  </script>
  <script type="text/javascript" src="core\app\func\validate.js"></script>

  <!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Agregar Cita</h4>
          <!-- <a href="index.php?view=newpacient" class="btn btn-default"><i class='fa fa-male'></i> Nuevo Paciente</a> -->
          <div class="form-group">
            <div class="col-lg-10">
              <a button data-toggle="modal" data-target="#myModal2" type="button" class="btn btn-default"><i class='fa fa-male'></i> Nuevo Paciente</a>
            </div>
          </div>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        </div>
        <div class="modal-body">

          <form class="form-horizontal needs-validation" role="form" id="newquickreservationform">
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Asunto</label>
              <div class="col-lg-10">
                <input type="text" name="title" id="title" required class="form-control" id="inputEmail1" placeholder="Asunto">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Paciente</label>
              <div class="col-lg-10">
                <select name="pacient_id" id="pacient_id" class="form-control" required>
                  <option value="">-- SELECCIONE --</option>
                  <?php foreach ($pacients as $p) : ?>
                    <option value="<?php echo $p->id; ?>"><?php echo $p->name . " " . $p->lastname; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail1" class="col-lg-2 control-label">Medico</label>
              <div class="col-md-10">
                <select name="medic_id" id="medic_id" class="form-control" required>
                  <option value="">-- SELECCIONE --</option>
                  <?php foreach ($medics as $p) : ?>
                    <option value="<?php echo $p->id; ?>"><?php echo $p->name . " " . $p->lastname; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Fecha/Hora</label>
              <div class="col-lg-5">
                <input type="text" name="date_at" id="date_at" required class="pickadate form-control" id="inputEmail1" placeholder="Fecha">
              </div>
              <div class="col-lg-5">
                <input type="text" name="time_at" id="time_at" required class="pickatime form-control" id="inputEmail1" placeholder="Hora">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Nota</label>
              <div class="col-lg-10">
                <textarea class="form-control" name="note" id="note" placeholder="Nota"></textarea>
              </div>
            </div>

            <input type="hidden" name="sick" value="">
            <input type="hidden" name="symtoms" value="">
            <input type="hidden" name="medicaments" value="">

            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Estado de la cita</label>
              <div class="col-lg-10">
                <select name="status_id" class="form-control" required>
                  <?php foreach ($statuses as $p) : ?>
                    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Estado del pago</label>
              <div class="col-lg-10">
                <select name="payment_id" class="form-control" required>
                  <?php foreach ($payments as $p) : ?>
                    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Costo</label>
              <div class="col-lg-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                  <input type="hidden" id="start">
                  <input type="hidden" id="end">
                  <input type="hidden" id="allDay">
                  <input type="text" class="form-control" name="price" placeholder="Costo">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-10">
                <button type="submit" class="btn btn-primary btn-block">Agregar Cita</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>



  <!-- modal para ingreso de paciente -->

  <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Agregar paciente</h4>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        </div>
        <div class="modal-body">

          <!-- el include carga la pantalla a la modal, luego las cascadas de print permiten validacion -->
          <?php include "./core/app/view/newpacient-view.php";

          print "    <script>\n";
          print "        // Self-executing function\n";
          print "        (function() {\n";
          print "            //todo: comprobacion de envio\n";
          print "            'use strict';\n";
          print "            window.addEventListener('load', function() {\n";
          print "                // Fetch all the forms we want to apply custom Bootstrap validation styles to\n";
          print "                var forms = document.getElementsByClassName('needs-validation');\n";
          print "\n";
          print "                //todo: comprobacion campo por campo\n";
          print "                $(function() { // jQuery ready\n";
          print "                    // On blur validation listener for form elements\n";
          print "                    $('.needs-validation').find('input,select,textarea').on('focusout', function() {\n";
          print "                        // check element validity and change class\n";
          print "                        $(this).removeClass('is-valid is-invalid')\n";
          print "                            .addClass(this.checkValidity() ? 'is-valid' : 'is-invalid');\n";
          print "                    });\n";
          print "                });\n";
          print "\n";
          print "                // Loop over them and prevent submission\n";
          print "                var validation = Array.prototype.filter.call(forms, function(form) {\n";
          print "                    form.addEventListener('submit', function(event) {\n";
          print "                        if (form.checkValidity() === false) {\n";
          print "                            event.preventDefault();\n";
          print "                            event.stopPropagation();\n";
          print "                        }\n";
          print "                        form.classList.add('was-validated');\n";
          print "                    }, false);\n";
          print "\n";
          print "                });\n";
          print "            }, false);\n";
          print "        })();\n";
          print "    </script>\n";
          ?>


          <!-- <form class="form-horizontal needs-validation" role="form" id="newquickreservationform">
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Asunto</label>
              <div class="col-lg-10">
                <input type="text" name="title" id="title" required class="form-control" id="inputEmail1" placeholder="Asunto">
              </div>
            </div> -->

          <!-- datos del paciente -->

          <!-- <form class="form-horizontal" method="post" id="addproduct" enctype="multipart/form-data" action="index.php?view=addpacient" role="form">


              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">DUI*</label>
                <div class="col-md-6">
                  <input type="text" name="no" class="form-control" id="no" placeholder="DNI">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
                <div class="col-md-6">
                  <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">*Apellido</label>
                <div class="col-md-6">
                  <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Apellido">
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Genero*</label>

                <div class="col-md-6">
                  <label class="checkbox-inline">
                    <input type="radio" id="inlineCheckbox1" name="gender" required value="h"> Hombre
                  </label>
                  <label class="checkbox-inline">
                    <input type="radio" id="inlineCheckbox2" name="gender" required value="m"> Mujer
                  </label>

                </div>



              </div>



              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">*Fecha de Nacimiento</label>
                <div class="col-md-6">
                  <input type="date" name="day_of_birth" class="form-control" id="address1" placeholder="Fecha de Nacimiento">
                </div>
              </div>


              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Direccion*</label>
                <div class="col-md-6">
                  <input type="text" name="address" class="form-control" id="address1" placeholder="Direccion">
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
                <div class="col-md-6">
                  <input type="text" name="email" class="form-control" id="email1" placeholder="Email">
                </div>
              </div>


              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Telefono*</label>
                <div class="col-md-6">
                  <input type="text" name="phone" class="form-control" id="phone1" placeholder="Telefono">
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Peso*</label>
                <div class="col-md-6">
                  <input type="text" name="phone" class="form-control" id="phone1" placeholder="Telefono">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Temperatura*</label>
                <div class="col-md-6">
                  <input type="text" name="phone" class="form-control" id="phone1" placeholder="Telefono">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Presion Arterial*</label>
                <div class="col-md-6">
                  <input type="text" name="phone" class="form-control" id="phone1" placeholder="Telefono">
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Nombre de su medico principal</label>
                <div class="col-md-6">
                  <input type="text" name="phone" class="form-control" id="phone1" placeholder="Telefono">
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Telefono de su medico</label>
                <div class="col-md-6">
                  <input type="text" name="phone" class="form-control" id="phone1" placeholder="Telefono">
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Enfermedades preexistentes</label>
                <div class="col-md-6">
                  <textarea name="sick" class="form-control" id="sick" placeholder="Enfermedad"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Medicamentos que consume</label>
                <div class="col-md-6">
                  <textarea name="medicaments" class="form-control" id="sick" placeholder="Medicamentos"></textarea>
                </div>
              </div>
              <p class="alert alert-info">* Campos obligatorios</p>

              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                  <button type="submit" class="btn btn-primary">Agregar Paciente</button>
                </div>
              </div>
            </form> -->

          <!-- <form class="needs-validation" method="post" id="addproduct" enctype="multipart/form-data" action="index.php?view=addpacient" role="form" novalidate>


              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Persona que lo refiere</label>
                <div class="col-md-6">
                  <input type="text" name="no" class="form-control" id="no" placeholder="DNI">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" pattern="([A-z0-9À-ž\s]){2,}" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">*Apellido</label>
                <div class="col-md-6">
                  <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Apellido" pattern="([A-z0-9À-ž\s]){2,}" required>
                </div>
              </div>


              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">*Fecha de Nacimiento</label>
                <div class="col-md-6">
                  <input type="date" name="day_of_birth" class="form-control" id="address1" placeholder="Fecha de Nacimiento" max="2001-12-31" required>
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Genero*</label>
                <div class="col-md-6">
                  <label class="checkbox-inline">
                    <input type="radio" id="inlineCheckbox1" name="gender" required value="h"> Hombre
                  </label>
                  <label class="checkbox-inline">
                    <input type="radio" id="inlineCheckbox2" name="gender" required value="m"> Mujer
                  </label>

                </div>
              </div>


              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Direccion*</label>
                <div class="col-md-6">
                  <input type="text" name="address" class="form-control" id="address1" placeholder="Direccion" required>
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
                <div class="col-md-6">
                  <input type="email" name="email" class="form-control" id="email1" placeholder="Email" required>
                </div>
              </div>


              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Telefono de medico <span class="badge badge-pill badge-info">Formato admitido: xxxx-xxxx</span></label>
                <div class="col-md-6">

                  <input type="text" name="phone" class="form-control" id="phone1" placeholder="Telefono de medico" pattern="[0-9]{4}-[0-9]{4}">
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Peso(kg)*</label>
                <div class="col-md-6">
                  <input type="text" name="phone" class="form-control" id="phone1" placeholder="peso" pattern="[0-9]{2}" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Temperatura*</label>
                <div class="col-md-6">
                  <input type="text" name="phone" class="form-control" id="phone1" placeholder="temperatura" pattern="[0-9]{2}" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Presion Arterial*</label>
                <div class="col-md-6">
                  <input type="text" name="phone" class="form-control" id="phone1" placeholder="presion arterial" pattern="[0-9]{2}" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">alergias</label>
                <div class="col-md-6">
                  <input type="text" name="alergy" class="form-control" id="sick" placeholder="alergias">
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Nombre de su medico principal</label>
                <div class="col-md-6">
                  <input type="text" name="phone" class="form-control" id="phone1" placeholder="nombre">
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Telefono personal<span class="badge badge-pill badge-info">Formato admitido: xxxx-xxxx</span></label>
                <div class="col-md-6">
                  <input type="text" name="phone" class="form-control" id="phone1" placeholder="Telefono" pattern="[0-9]{4}-[0-9]{4}">
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Enfermedades preexistentes</label>
                <div class="col-md-6">
                  <textarea name="sick" class="form-control" id="sick" placeholder="Enfermedad"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Medicamentos que consume</label>
                <div class="col-md-6">
                  <textarea name="medicaments" class="form-control" id="sick" placeholder="Medicamentos"></textarea>
                </div>
              </div>
              <p class="alert alert-info">* Campos obligatorios</p>

              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                  <button type="submit" class="btn btn-primary">Agregar Paciente</button>
                  <a href="index.php?view=addpacient" class="btn btn-danger">agregar2</a>

                </div>
              </div>

            </form> -->

          <script>
            // Self-executing function
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
          </script>

        </div>
      </div>
    </div>
  </div>
