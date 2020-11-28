<?php if (!Core::$user->view_reservations) {
  Core::redir("./?view=home");
} ?>
<section class="content">

<!-- <section class="container-fluid"> -->

  <div class="row">
    <div class="col-md-12">
      <h1>Calendario</h1>
      <div class="box box-primary">
        <div class="box-body">
          <form class="form-horizontal" role="form" method="post" id="filterreservation">
            <div class="form-group">
              <div class="col-lg-4 ">
                <label for="inputEmail1" class="control-label">Seleccionar medico (medico y estado deben tener valor para filtrar)</label>
                <select name="medic_id" id="category_id" class="form-control select2" required>
                  <option value="">-- SELECCIONE --</option>
                  <?php foreach (MedicData::getAll() as $p) : ?>
                    <option value="<?php echo $p->id; ?>"><?php echo "(" . $p->no . ") " . $p->name . " " . $p->lastname; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-lg-2 ">
                <label for="inputEmail1" class="control-label">Seleccionar estado</label>
                <select name="status_id" id="category_id" class="form-control" required>
                  <option value="">-- SELECCIONE --</option>
                  <?php foreach (StatusData::getAll() as $p) : ?>
                    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class=" col-lg-3">
                <label for="inputEmail1" class="control-label"><br><br></label>
                <button type="submit" class="btn btn-default">Filtrar Citas</button>
              </div>
            </div>
          </form>

          <!-- AGREGAR AL SEGUNDO SPRINT-->
          <!-- <form class="form-horizontal" role="form" id="newquickreservationform">
            <div class="form-group">
              <div class="col-lg-10">
                <a button data-toggle="modal" data-target="#myModal2" type="button" class="btn btn-default"><i class='fa fa-male'></i> Nuevo Paciente</a>
              </div>
            </div>
          </form> -->
            <!-- AGREGAR AL SEGUNDO SPRINT-->


        <!-- </div>
      </div> -->
      <div class="box box-primary">
        <div class="box-body">
          <script>
            $("#filterreservation").submit(function(e) {
              e.preventDefault();
              console.log("xxxx");
              $.get("./?action=filterreservation", $("#filterreservation").serialize(), function(data) {
                console.log(data);
                $(".dataload").html(data);

              });
            });

            $(document).ready(function() {
              $.get("./?action=filterreservation", "", function(data) {
                console.log(data);
                $(".dataload").html(data);
              });
            });
          </script>

          <div class="clearfix"></div>

          <div class="dataload">
          </div>

        </div>
      </div>

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
    <script type="text/javascript" src="core\app\func\validate.js"></script>

</section>
