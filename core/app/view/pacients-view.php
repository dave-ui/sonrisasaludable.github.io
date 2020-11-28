<?php if (!Core::$user->view_pacients) {
    Core::redir("./?view=home");

} ?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- <div class="btn-group pull-right">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="report/clients-word.php">Word 2007 (.docx)</a></li>
                </ul>
            </div>-->
            <h1>Pacientes</h1>
            <a href="index.php?view=newpacient" class="btn btn-default"><i class='fa fa-male'></i> Nuevo Paciente</a>
            <br>
            <br>
            <?php

            $users = PacientData::getAll();
            // $medics = MedicData::getAll();
            if (count($users) > 0) {
                // si hay usuarios
            ?>
                <div class="box box-primary">
                    <div class="box-body">

                        <table class="table table-bordered table-hover datatable" id="paciente">
                            <thead>
                                <!-- <th>archivo</th> -->
                                <th>Persona que refiere</th>
                                <th>codigo paciente
                                    <!--<i class="fa fa-picture"></i>-->
                                </th>
                                <th>Nombres</th>
                                <th>apellidos</th>
                                <th>Direccion</th>
                                <th>Email</th>
                                <th>Telefono</th>
                                <th>accion</th>
                            </thead>
                            <?php
                            foreach ($users as $user) {
                            ?>
                            <?php
                            $string = $user->lastname;

                            $expr = '#(?<=\s|\b)\pL#u';
                            preg_match_all($expr, $string, $matches);
                            $result = implode('', $matches[0]);
                            $result = strtoupper($result);
                            ?>
                                <tr>
                                    <!-- <td style="width:30px;"><a href="./?view=pacient&id=<?php echo $user->id; ?>" class="btn btn-default btn-xs"><i class="fa fa-folder-open"></i></a></td> -->
                                    <td><?php echo $user->no; ?></td>
                                    <td>
                                        <?php if ($user->image == "") : ?>
                                            <?php echo $result.$user->id.date('y'); ?>
                                        <?php endif; ?>
                                        <p><?php echo $user->image; ?></p>

                                    </td>
                                    <td>
                                        <p><?php echo $user->name; ?></p>

                                    </td>
                                    <td>
                                        <p><?php echo $user->lastname; ?></p>

                                    </td>

                                    <td><?php echo $user->address; ?></td>
                                    <td><?php echo $user->email; ?></td>
                                    <?php
                                    // foreach ($medics as $medic) {    queria que desplegara el telefono pero del medico
                                    //
                                    ?>
                                    <td><?php echo $user->phone; ?></td>
                                    <?php
                                    // }
                                    //
                                    ?>
                                    <td style="width:270px;">
                                        <a href="index.php?view=visorpacient&id=<?php echo $user->id; ?>" class="btn btn-info btn-xs">consulta</a>
                                        <!-- <a href="index.php?view=pacienthistory&id=<?php echo $user->id; ?>" class="btn btn-default btn-xs">Historial</a> -->
                                        <?php if (Core::$user->edit_pacients) : ?>

                                            <a href="index.php?view=editpacient&id=<?php echo $user->id; ?>" class="btn btn-warning btn-xs">Editar</a>
                                            <a href="index.php?view=delpacient&id=<?php echo $user->id; ?>" class="btn btn-danger btn-xs">Eliminar</a>
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
                echo "<p class='alert alert-danger'>No hay pacientes</p>";
            }

            ?>


        </div>
    </div>
    <script type="text/javascript" src="core\app\func\pacientview.js"></script>
</section>
