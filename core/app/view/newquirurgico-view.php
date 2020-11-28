<section class="content">
  <?php
  //echo date('N',strtotime('2018-04-17'));
  $pacients = PacientData::getAll();
  $medics = MedicData::getAll();

  $statuses = StatusData::getAll();
  $payments = PaymentData::getAll();

  ?>

  <div class="row">
    <div class="col-md-10">
      <!-- <h1>Nueva Cita</h1>
      <form class="form-horizontal needs-validation" role="form" method="post" action="./?action=addreservation" id="newreservation" novalidate>
        <div class="form-group">
          <div class="col-lg-3 col-lg-offset-2">
            <label for="inputEmail1" class="control-label">Primera Cita</label>
            <input type="text" name="no" class="form-control" id="inputEmail1" placeholder="fecha">
          </div>
          <div class="col-lg-7">
            <label for="inputEmail1" class="control-label">Ultima cita</label>
            <input type="text" name="title" required class="form-control" id="inputEmail1" placeholder="fecha">
          </div>
        </div>

        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Nombre</label>
          <div class="col-md-6">
            <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre">
          </div>
        </div>



        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Fecha/Hora</label>
          <div class="col-lg-5">
            <input type="text" name="date_at" id="date_at" required class="pickadate2 form-control" id="inputEmail1" placeholder="Fecha">
          </div>
          <div class="col-lg-5">
            <input type="text" name="time_at" id="time_at" required class="pickatime form-control" id="inputEmail1" placeholder="Hora">
            <select name="time_at" id="time_at" required class="form-control">
              <option value="">-- SELECCIONE --</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Motivo de la cita</label>
          <div class="col-lg-4">
            <textarea class="form-control" name="note" placeholder="Motivo de la cita" required></textarea>
          </div>

        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Observaciones</label>
          <div class="col-lg-4">
            <textarea class="form-control" name="symtoms" placeholder="Observaciones" required></textarea>
          </div>

        </div>


        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-default">Agregar Cita</button>
          </div>
        </div>
      </form> -->
      <hr>
      <!--todo: formulario dos -->
      <div class="row">
        <div class="col-md-10">
          <h1>Nuevo procedimiento</h1>
          <form class="form-horizontal needs-validation" role="form" method="post" action="./?action=addreservation" id="newreservation" novalidate>
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Paciente</label>
              <div class="col-lg-10">
                <select name="pacient_id" id="pacient_id" class="form-control" required>
                  <option value="">-- SELECCIONE --</option>
                  <?php foreach ($pacients as $p) : ?>
                    <option value="<?php echo $p->id; ?>"><?php echo $p->no . " - " . $p->name . " " . $p->lastname; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-3 col-md-offset-2">
                <label for="inputEmail1" class="control-label">Area Medica</label>
                <select name="category_id" id="category_id" class="form-control" required>
                  <option value="">-- SELECCIONE --</option>
                  <?php foreach (CategoryData::getAll() as $p) : ?>
                    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="col-lg-7">
                <label for="inputEmail1" class="control-label">Medico</label>
                <select name="medic_id" id="medic_id" class="form-control" required>
                  <option value="">-- SELECCIONE AREA--</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Fecha/Hora</label>
              <div class="col-lg-5">
                <input type="text" name="date_at" id="date_at" required class="pickadate2 form-control" id="inputEmail1" placeholder="Fecha" required>
              </div>
              <div class="col-lg-5">
                <input type="text" name="time_at" id="time_at" required class="pickatime form-control" id="inputEmail1" placeholder="Hora" required>
                <!-- <select name="time_at" id="time_at" required class="form-control">
  <option value="">-- SELECCIONE --</option>
</select> -->
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">observaciones</label>
              <div class="col-lg-4">
                <textarea class="form-control" id="observ" name="observ" placeholder="Nota" required></textarea>
              </div>
              <label for="inputEmail1" class="col-lg-2 control-label">descripcion</label>
              <div class="col-lg-4">
                <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Enfermedad" required></textarea>
              </div>
            </div>
            <label for="inputEmail1" class="col-lg-2 control-label">receta</label>
              <div class="col-lg-4">
                <textarea class="form-control" id="detall" name="detall" placeholder="Nota" rows="10" cols="50" required></textarea>
              </div>

            <!-- <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Sintomas</label>
              <div class="col-lg-4">
                <textarea class="form-control" name="symtoms" placeholder="Sintomas" required></textarea>
              </div>
              <label for="inputEmail1" class="col-lg-2 control-label">Medicamentos</label>
              <div class="col-lg-4">
                <textarea class="form-control" name="medicaments" placeholder="Medicamentos" required></textarea>
              </div>
            </div> -->

            <!-- <div class="form-group">
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
                  <input type="text" class="form-control" name="price" placeholder="Costo">
                </div>
              </div>
            </div> -->
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label"></label>
              <div class="col-md-6">
                <div class="checkbox">
                <p class="alert alert-warning">este formulario se guardara como quirurgico</p>

                  <label>
                    <input type="hidden" name="quirur" value="1">
                    <input type="hidden" name="medic_id" value="1">
                    <input type="hidden" name="payment_id" value="1">
                    <input type="hidden" name="status_id" value="1">
                    <input type="hidden" name="price" value="1">
                    <input type="hidden" name="no" value="1">
                    <input type="hidden" name="title" value="pendiente asunto">


                  </label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-10">
                <button type="submit" class="btn btn-default">Agregar Cita</button>
              </div>
            </div>
          </form>

          <script type="text/javascript">
            $(".pickadate2").pickadate({
              format: 'yyyy-mm-dd',
              min: '<?php echo date('Y-m-d', time() - (24 * 60 * 60)); ?>',
              onSet: function(context) {

                  $.get("./?action=gethours", "medic_id=" + $("#medic_id").val() + "&date_at=" + $("#date_at").val(), function(data) {
                    $("#time_at").html(data);
                    console.log((data));

                  });


                }
                //        console.log((data));
              }
            );


            $("#newreservation").submit(function(e) {
              if ($("#date_at").val() == "" || $("#time_at").val() == "") {
              }

            });

            $(document).ready(function() {

              $("#category_id").change(function() {

                $.get("./?action=getmedics", "cat_id=" + $("#category_id").val(), function(data) {
                  $("#medic_id").html(data);
                  console.log(data);
                });


              });

            });
          </script>

        </div>
      </div>

      <!-- fin de formulario dos -->
      <script type="text/javascript">
        $(".pickadate2").pickadate({
          format: 'yyyy-mm-dd',
          min: '<?php echo date("Y-m-d", time() - (24 * 60 * 60)); ?>',
          onSet: function(context) {
            if ($("#medic_id").val() == "") {

              $.get("./?action=gethours", "medic_id=" + $("#medic_id").val() + "&date_at=" + $(
                "#date_at").val(), function(data) {
                $("#time_at").html(data);
                console.log((data));

              });


            }
            //        console.log((data));
          }
        });


        $("#newreservation").submit(function(e) {
          if ($("#date_at").val() == "" || $("#time_at").val() == "") {
          }

        });

        $(document).ready(function() {

          $("#category_id").change(function() {

            $.get("./?action=getmedics", "cat_id=" + $("#category_id").val(), function(data) {
              $("#medic_id").html(data);
              console.log(data);
            });
          });
        });
      </script>

    </div>
  </div>

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
</section>
