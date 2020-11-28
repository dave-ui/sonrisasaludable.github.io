<section class="content">
    <?php $user = PacientData::getById($_GET["id"]); ?>
    <div class="row">
        <div class="col-md-12">
            <h1>datos de <?php echo $user->name; ?></h1>
            <br>
            <form class="form-horizontal needs-validation" method="post" id="addproduct" enctype="multipart/form-data" action="index.php?view=updatepacient" role="form" novalidate>




                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Persona a que se refiere</label>
                    <div class="col-md-6">
                        <input type="text" name="no" value="<?php echo $user->no; ?>" class="form-control" id="no" placeholder="Datos" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Nombre</label>
                    <div class="col-md-6">
                        <input type="text" name="name" value="<?php echo $user->name; ?>" class="form-control" id="name" placeholder="Nombre" required readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Apellido</label>
                    <div class="col-md-6">
                        <input type="text" name="lastname" value="<?php echo $user->lastname; ?>" required class="form-control" id="lastname" placeholder="Apellido" required readonly>
                    </div>
                </div>


                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Fecha de Nacimiento</label>
                    <div class="col-md-6">
                        <input type="date" name="day_of_birth" class="form-control" value="<?php echo $user->day_of_birth; ?>" id="address1" placeholder="Fecha de Nacimiento" required readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Direccion</label>
                    <div class="col-md-6">
                        <input type="text" name="address" value="<?php echo $user->address; ?>" class="form-control" id="username" placeholder="Direccion" required readonly>
                    </div>
                </div>



                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Email</label>
                    <div class="col-md-6">
                        <input type="text" name="email" value="<?php echo $user->email; ?>" class="form-control" id="email" placeholder="Email" required readonly>
                        <!-- <p class="help-block">Si el email esta vacio se inhabilita el acceso al paciente.</p> -->
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Telefono</label>
                    <div class="col-md-6">
                        <input type="text" name="phone" value="<?php echo $user->phone; ?>" class="form-control" id="inputEmail1" placeholder="Telefono" required readonly>
                    </div>
                </div>

                <!-- <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Peso*</label>
                    <div class="col-md-6">
                        <input type="text" name="phone" value="" class="form-control"
                            id="inputEmail1" placeholder="Peso">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Temperatura*</label>
                    <div class="col-md-6">
                        <input type="text" name="phone" value="" class="form-control"
                            id="inputEmail1" placeholder="Temperatura">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Presion Arterial*</label>
                    <div class="col-md-6">
                        <input type="text" name="phone" value="" class="form-control"
                            id="inputEmail1" placeholder="Presion Arterial">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Nombre Medico principal</label>
                    <div class="col-md-6">
                        <input type="text" name="phone" value="" class="form-control"
                            id="inputEmail1" placeholder="Medico principal">
                    </div>
                </div> -->

                <!-- <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Telefono de su medico</label>
                    <div class="col-md-6">
                        <input type="text" name="phone" value="" class="form-control"
                            id="inputEmail1" placeholder="Telefono de su medico">
                    </div>
                </div> -->



                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Enfermedades preexistentes</label>
                    <div class="col-md-6">
                        <textarea name="sick" class="form-control" id="sick" placeholder="Enfermedad" required readonly><?php echo $user->sick; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Medicamentos que consume</label>
                    <div class="col-md-6">
                        <textarea name="medicaments" class="form-control" id="sick" placeholder="Medicamentos " required readonly><?php echo $user->medicaments; ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <!-- <input type="hidden" name="user_id" value="<?php echo $user->id; ?>
                        ">
                        <button type="submit" class="btn btn-success">Actualizar Paciente</button> -->
                    </div>
                </div>
            </form>
        </div>
    </div>


</section>
