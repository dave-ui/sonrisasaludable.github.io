<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>sistema de citas | Panel de Administracion</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -> ahora 4.5.2-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="dist/css/skins/skin-blue-light.min.css" rel="stylesheet" type="text/css" />
    <script src="plugins/jquery/jquery-2.1.4.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->

    <script src="plugins/morris/raphael-min.js"></script>
    <script src="plugins/morris/morris.js"></script>
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <link rel="stylesheet" href="plugins/morris/example.css">
    <!-- <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/b-1.6.4/r-2.2.6/datatables.min.css" />

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.22/b-1.6.4/r-2.2.6/datatables.min.js"></script>


    <!-- one for all, full calendar -->
    <link href='plugins/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
    <link href='plugins/fullcalendar/scheduler.min.css' rel='stylesheet' />
    <link href='plugins/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
    <script src='plugins/fullcalendar/moment.min.js'></script>
    <script src='plugins/fullcalendar/fullcalendar.min.js'></script>
    <script src='plugins/fullcalendar/scheduler.min.js'></script>
    <!--  pickadate -->
    <link rel="stylesheet" type="text/css" href="plugins/pickadate/themes/classic.css">
    <link rel="stylesheet" type="text/css" href="plugins/pickadate/themes/classic.date.css">
    <link rel="stylesheet" type="text/css" href="plugins/pickadate/themes/classic.time.css">
    <script src='plugins/pickadate/picker.js'></script>
    <script src='plugins/pickadate/picker.date.js'></script>
    <script src='plugins/pickadate/picker.time.js'></script>
    <script src="plugins/jspdf/jspdf.min.js"></script>
    <script src="plugins/jspdf/jspdf.plugin.autotable.js"></script>

    <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css" />
    <script src='plugins/select2/select2.min.js'></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("select").select2();
        });
    </script>


    <!--Jquery UI-->
    <link rel="stylesheet" type="text/css" href="plugins/jquery-ui/jquery-ui.min.css" />
    <script type="text/javascript" src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="plugins/jquery-ui/jquery.alerts.js"></script>

    <!--Jquery Mask-->
    <script type="text/javascript" src="plugins/jquery-mask/jquery.mask.min.js"></script>
    <!--Jquery Validator-->
    <script type="text/javascript" src="plugins/jquery-form-validator/jquery.form-validator.js"></script>
    <!--Jquery Daterange-->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <script src="plugins/daterangepicker/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!--Jquery Timepicker-->
    <link rel="stylesheet" href="plugins/jquery-timepicker/jquery.timepicker.css">
    <script src="plugins/jquery-timepicker/jquery.timepicker.min.js"></script>
    <!--Jquery Slimscroll-->
    <script type="text/javascript" src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
</head>

<body class="<?php if (isset($_SESSION["user_id"]) || isset($_SESSION["pacient_id"]) || isset($_SESSION["medic_id"])) : ?>  skin-blue-light sidebar-mini <?php else : ?>login-page<?php endif; ?>">
    <div class="wrapper">
        <!-- Main Header -->
        <?php if (isset($_SESSION["user_id"]) || isset($_SESSION["pacient_id"]) || isset($_SESSION["medic_id"])) : ?>
            <header class="main-header">
                <!-- Logo -->
                <a href="./" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>s</b>c</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>sistema de citas</b></span>
                </a>

                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">


                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- The user image in the navbar-->
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class=""><?php
                                                    if (isset($_SESSION["user_id"])) {
                                                        echo UserData::getById($_SESSION["user_id"])->name;
                                                    } else if (isset($_SESSION["pacient_id"])) {
                                                        echo PacientData::getById($_SESSION["pacient_id"])->name . " (Paciente)";
                                                    } else if (isset($_SESSION["medic_id"])) {
                                                        echo MedicData::getById($_SESSION["medic_id"])->name . " (Medico)";
                                                    }

                                                    ?></span>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- The user image in the menu -->

                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-right">
                                            <?php if (isset($_SESSION["medic_id"])) : ?>
                                                <a href="./?view=configuremedic" class="btn btn-default btn-flat"><i class='fa fa-cog'></i> Configurar</a>
                                            <?php endif; ?>
                                            <a href="./logout.php" class="btn btn-default btn-flat">Salir</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">

                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!--
<div class="user-panel">
            <div class="pull-left image">
              <img src="1.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Alexander Pierce</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          -->
                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu">
                        <?php if (isset($_SESSION["user_id"])) : ?>

                            <?php $u = UserData::getById($_SESSION["user_id"]); ?>
                            <li><a href="./index.php?view=home"><i class='fa fa-dashboard'></i> <span>Inicio</span></a></li>

                            <?php if (Core::$user->view_reservations) : ?>
                                <li><a href="./index.php?view=calendar"><i class='fa fa-calendar'></i> <span>Calendario</span></a>
                                </li>
                            <?php endif; ?>

                            <?php if (Core::$user->view_pacients) : ?>
                                <li><a href="./?view=pacients"><i class='fa fa-male'></i> <span>Pacientes</span></a></li>
                            <?php endif; ?>

                            <?php if (Core::$user->view_reservations) : ?>
                                <li><a href="./?view=newreservation"><i class='fa fa-asterisk'></i> <span>Nueva Cita</span></a></li>
                                <li><a href="./?view=reservations"><i class='fa fa-calendar'></i> <span>Citas</span></a></li>
                            <?php endif; ?>


                            <!-- <?php if (Core::$user->view_medics) : ?>
                                <li><a href="./?view=medics"><i class='fa fa-support'></i> <span>Medicos</span></a></li>
                            <?php endif; ?> -->

                            <?php if (Core::$user->view_reports) : ?>
                                <li><a href="./?view=reports"><i class='fa fa-area-chart'></i> <span>Reportes</span></a></li>
                            <?php endif; ?>
                            <?php if (Core::$user->view_reservations) : ?>
                                <li><a href="./index.php?view=quirurgicos"><i class='fa fa-support'></i> <span>Quirurgicos</span></a>
                                </li>
                                <li><a href="./index.php?view=quirurgicos2"><i class='fa fa-support'></i> <span>No Quirurgicos</span></a>
                                </li>

                            <?php endif; ?>

                        <?php elseif (isset($_SESSION["pacient_id"])) : ?>
                            <li><a href="./?view=pacienthome"><i class='fa fa-dashboard'></i> <span>Inicio</span></a></li>
                            <li><a href="./?view=pacientnewreservation"><i class='fa fa-asterisk'></i> <span>Nueva
                                        Cita</span></a></li>
                            <li><a href="./?view=pacientreservations"><i class='fa fa-calendar'></i> <span>Citas</span></a></li>
                        <?php elseif (isset($_SESSION["medic_id"])) : ?>
                            <li><a href="./?view=medichome"><i class='fa fa-dashboard'></i> <span>Inicio</span></a></li>
                            <li><a href="./?view=medicreservations"><i class='fa fa-calendar'></i> <span>Citas</span></a></li>
                            <li><a href="./?view=medicreports"><i class='fa fa-area-chart'></i> <span>Reportes</span></a></li>
                        <?php endif; ?>

                    </ul><!-- /.sidebar-menu -->
                </section>
                <!-- /.sidebar -->
            </aside>
        <?php endif; ?>

        <!-- Content Wrapper. Contains page content -->
        <?php if (isset($_SESSION["user_id"]) || isset($_SESSION["pacient_id"]) || isset($_SESSION["medic_id"])) : ?>
            <div class="content-wrapper">
                <?php View::load("index"); ?>
            </div><!-- /.content-wrapper -->

            <footer class="main-footer">
            </footer>
        <?php else : ?>
            <?php if (isset($_GET["view"]) && $_GET["view"] == "pacientlogin") : ?>
                <div class="login-box">
                    <div class="login-logo">
                        <h4>ACCESO AL PACIENTE</h4>
                        <a href="./?view=pacientlogin"><b>sistema de citas</b></a>
                    </div><!-- /.login-logo -->
                    <div class="login-box-body">
                        <form class="needs-validation" action="./?action=processloginpacient" method="post">
                            <div class="form-group has-feedback">
                                <input type="text" name="username" required class="form-control" placeholder="Usuario" />
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" name="password" required class="form-control" placeholder="Password" />
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <div class="row">

                                <div class="col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Acceder</button>
                                    <a href="./" class="btn btn-default btn-block">Regresar</a>
                                </div><!-- /.col -->
                            </div>
                        </form>
                    </div><!-- /.login-box-body -->
                </div><!-- /.login-box -->
            <?php elseif (isset($_GET["view"]) && $_GET["view"] == "pacientregister") : ?>
                <div class="login-box">
                    <div class="login-logo">
                        <h4>REGISTRO DE PACIENTES</h4>
                        <a href="./?view=pacientlogin"><b>sistema de citas</b></a>
                    </div><!-- /.login-logo -->
                    <div class="login-box-body">
                        <form class="needs-validation" action="./?action=processregisterpacient" method="post">
                            <div class="form-group has-feedback">
                                <input type="text" name="no" required class="form-control" placeholder="Cedula/DNI" />
                                <span class="glyphicon glyphicon-th-list form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" name="name" required class="form-control" placeholder="Nombre" />
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" name="lastname" required class="form-control" placeholder="Apellidos" />
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="date" name="day_of_birth" required class="form-control" placeholder="Fecha de Nacimiento" />
                                <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" name="phone" required class="form-control" placeholder="Telefono" />
                                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" name="email" required class="form-control" placeholder="Email" />
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" name="password" required class="form-control" placeholder="Password" />
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <div class="row">

                                <div class="col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Acceder</button>
                                    <a href="./" class="btn btn-default btn-block">Regresar</a>
                                </div><!-- /.col -->
                            </div>
                        </form>
                    </div><!-- /.login-box-body -->
                </div><!-- /.login-box -->
            <?php elseif (isset($_GET["view"]) && $_GET["view"] == "mediclogin") : ?>
                <div class="login-box">
                    <div class="login-logo">
                        <h4>ACCESO AL MEDICO</h4>
                        <a href="./?view=pacientlogin"><b>sistema de citas</b></a>
                    </div><!-- /.login-logo -->
                    <div class="login-box-body">
                        <form class="needs-validation" action="./?action=processloginmedic" method="post">
                            <div class="form-group has-feedback">
                                <input type="text" name="username" required class="form-control" placeholder="Usuario" />
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" name="password" required class="form-control" placeholder="Password" />
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <div class="row">

                                <div class="col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Acceder</button>
                                    <a href="./" class="btn btn-default btn-block">Regresar</a>
                                </div><!-- /.col -->
                            </div>
                        </form>
                    </div><!-- /.login-box-body -->
                </div><!-- /.login-box -->
            <?php else : ?>
                <div class="login-box">
                    <div class="login-logo">
                        <a href="./"><b>sistema de citas</b></a>
                    </div><!-- /.login-logo -->
                    <div class="login-box-body">
                        <form class="needs-validation" action="./?action=processlogin" method="post">
                            <div class="form-group has-feedback">
                                <input type="text" name="username" required class="form-control" placeholder="Usuario" />
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" name="password" required class="form-control" placeholder="Password" />
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <div class="row">

                                <div class="col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Acceder</button>
                                    <!-- <a href="./?view=pacientlogin" class="btn btn-default btn-block">Login Paciente</a>
                                    <a href="./?view=mediclogin" class="btn btn-default btn-block">Login Medico</a>
                                    <a href="./?view=pacientregister" class="btn btn-default btn-block">Registro de
                                        Pacientes</a> -->
                                </div><!-- /.col -->
                            </div>
                        </form>
                    </div><!-- /.login-box-body -->
                </div><!-- /.login-box -->
            <?php endif; ?>

        <?php endif; ?>


    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".pickadate").pickadate({
                format: 'yyyy-mm-dd',
                min: '<?php echo date("Y - m - d", time() - (24 * 60 * 60)); ?>'
            });
            $(".pickadate2").pickadate({
                format: 'yyyy-mm-dd'
            });
            $(".pickatime").pickatime({
                format: 'HH:i',
                interval: 10
            });
        });
    </script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

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

    <!-- <script type="text/javascript">
        $(document).ready(function() {
            $(".datatable").DataTable({
                "pageLength": 25,
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });
        });
    </script> -->
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
          Both of these plugins are recommended to enhance the
          user experience. Slimscroll is required when using the
          fixed layout. -->
</body>

</html>
