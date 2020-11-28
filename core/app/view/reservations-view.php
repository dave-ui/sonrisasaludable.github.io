<?php if (!Core::$user->view_reservations) {
    Core::redir("./?view=home");
} ?>
<section class="content">
    <script type="text/javascript" src="core\app\func\exped.js"></script>
    <div class="row">
        <div class="col-md-12">
            <div class="btn-group pull-right">
                <!--<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/clients-word.php">Word 2007 (.docx)</a></li>
  </ul>
</div>
-->
            </div>

            <h1>Citas</h1>
            <a href="./index.php?view=newreservation" class="btn btn-default"><i class='fa fa-asterisk'></i> Nueva cita</a>
            <!-- <a href="./index.php?view=oldreservations" class="btn btn-default"><i class='fa fa-clock-o'></i> Citas Anteriores</a> -->
            <br><br>
            <form class="form-horizontal needs-validation" role="form">
                <input type="hidden" name="view" value="reservations">
                <?php
                $pacients = PacientData::getAll();
                $medics = MedicData::getAll();
                ?>

                <div class="form-group">
                    <div class="col-lg-2">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" name="q" value="<?php if (isset($_GET["q"]) && $_GET["q"] != "") {
                                                                    echo $_GET["q"];
                                                                } ?>" class="form-control" placeholder=" asunto">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-male"></i></span>
                            <select name="pacient_id" class="form-control">
                                <option value="">PACIENTE</option>
                                <?php foreach ($pacients as $p) : ?>
                                    <option value="<?php echo $p->id; ?>" <?php if (isset($_GET["pacient_id"]) && $_GET["pacient_id"] == $p->id) {
                                                                                echo "selected";
                                                                            } ?>><?php echo $p->id . " - " . $p->name . " " . $p->lastname; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-support"></i></span>
                            <select name="medic_id" class="form-control">
                                <option value="">MEDICO</option>
                                <?php foreach ($medics as $p) : ?>
                                    <option value="<?php echo $p->id; ?>" <?php if (isset($_GET["medic_id"]) && $_GET["medic_id"] == $p->id) {
                                                                                echo "selected";
                                                                            } ?>><?php echo $p->id . " - " . $p->name . " " . $p->lastname; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="date" name="date_at" value="<?php if (isset($_GET["date_at"]) && $_GET["date_at"] != "") {
                                                                            echo $_GET["date_at"];
                                                                        } ?>" class=" " placeholder="Fecha">
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <button class="btn btn-primary btn-block">Buscar</button>
                    </div>

                </div>
            </form>


            <!-- <h1>Citas</h1>
            <a href="./index.php?view=newreservation" class="btn btn-default"><i class='fa fa-asterisk'></i> Nueva
                cita</a>
            <a href="./index.php?view=oldreservations" class="btn btn-default"><i class='fa fa-clock-o'></i> Citas
                Anteriores</a>
            <br><br>
            <form class="needs-validation form-horizontal" role="form" novalidate>
                <input type="hidden" name="view" value="reservations">
                <?php
                $pacients = PacientData::getAll();
                $medics = MedicData::getAll();
                ?>

                <div class="form-group">

                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 control-label">no.</label>
                        <div class="col-md-6">
                            <input type="text" name="no" class="form-control" id="no" placeholder="no.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 control-label">Nombre</label>
                        <div class="col-md-6">
                            <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 control-label">Apellido</label>
                        <div class="col-md-6">
                            <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Apellido">
                        </div>
                    </div>



                    <div class="col-lg-2">
                        <button class="btn btn-primary btn-block">Buscar</button>
                    </div>

                </div>
            </form> -->

            <?php
            $users = array();
            if ((isset($_GET["q"]) && isset($_GET["pacient_id"]) && isset($_GET["medic_id"]) && isset($_GET["date_at"])) && ($_GET["q"] != "" || $_GET["pacient_id"] != "" || $_GET["medic_id"] != "" || $_GET["date_at"] != "")) {
                $sql = "select * from reservation where quirur=3 and";
                if ($_GET["q"] != "") {
                    $sql .= " title like '%$_GET[q]%' or note like '%$_GET[q] %'";
                }

                if ($_GET["pacient_id"] != "") {
                    if ($_GET["q"] != "") {
                        $sql .= " and ";
                    }
                    $sql .= " pacient_id = " . $_GET["pacient_id"];
                }

                if ($_GET["medic_id"] != "") {
                    if ($_GET["q"] != "" || $_GET["pacient_id"] != "") {
                        $sql .= " and ";
                    }

                    $sql .= " medic_id = " . $_GET["medic_id"];
                }



                if ($_GET["date_at"] != "") {
                    if ($_GET["q"] != "" || $_GET["pacient_id"] != "" || $_GET["medic_id"] != "") {
                        $sql .= " and ";
                    }

                    $sql .= " date_at = \"" . $_GET["date_at"] . "\"";
                }

                $users = ReservationData::getBySQL($sql);
            } else {
                $users = ReservationData::getAll();
            }
            if (count($users) > 0) {
                // si hay usuarios
            ?>
                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered table-hover datatable" id="reserva">
                            <thead>
                                <th>Cod.</th>
                                <th>Asunto</th>
                                <th>Paciente</th>
                                <th>Medico</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th>.</th>
                            </thead>
                            <?php
                            foreach ($users as $user) {
                                $pacient  = $user->getPacient();
                                $medic = $user->getMedic();
                            ?>
                                <tr>
                                    <td><?php echo $user->no; ?></td>
                                    <td><?php echo $user->title; ?></td>
                                    <td><?php echo $pacient->name . " " . $pacient->lastname; ?></td>
                                    <td><?php echo $medic->name . " " . $medic->lastname; ?></td>
                                    <td>
                                        <?php
                                        if ($user->status_id == 1 && $user->price == 0) {
                                            echo "pendiente asignar precio";
                                        } else {
                                            echo StatusData::getById($user->status_id)->name;
                                        }
                                        ?></td>
                                    <td><?php echo $user->date_at . " " . $user->time_at; ?></td>
                                    <td style="width:180px;">

                                        <!-- <a href="./report/reservation-word.php?id=<?php echo $user->id; ?>" class="btn btn-default btn-xs">Descargar</a> -->
                                        <?php if (Core::$user->edit_reservations) : ?>
                                            <a href="index.php?view=editreservation&id=<?php echo $user->id; ?>" class="btn btn-warning btn-xs">Editar</a>
                                            <a href="index.php?action=delreservation&id=<?php echo $user->id; ?>" class="btn btn-danger btn-xs">Eliminar</a>
                                        <?php endif; ?>

                                    </td>
                                </tr>
                            <?php

                            }
                            ?>
                        </table>
                    </div>
                </div>
            <?php
            } else {
                echo "<p class='alert alert-info'>inicie busqueda de citas</p>";
            }


            ?>


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
    <script type="text/javascript" src="core\app\func\reserview.js"></script>

</section>
