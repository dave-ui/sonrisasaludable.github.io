<section class="content">
    <?php $user = PacientData::getById($_GET["id"]); ?>
    <div class="row">
        <div class="col-md-12">
            <h1>datos de <?php echo $user->name; ?></h1>
            <br>

            <!-- <div class="row">
        <div class="col-md-12">
            <h1>Nuevo Paciente</h1>
            <br>
            <form class="needs-validation" method="post" id="addproduct" enctype="multipart/form-data" action="index.php?view=addpacient" role="form" novalidate>


                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Persona que lo refiere</label>
                    <div class="col-md-6">
                        <input type="text" name="no" class="form-control" id="no" placeholder="DNI" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
                    <div class="col-md-6">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" pattern="([A-z0-9À-ž\s]){2,}" required readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">*Apellido</label>
                    <div class="col-md-6">
                        <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Apellido" pattern="([A-z0-9À-ž\s]){2,}" required readonly>
                    </div>
                </div>


                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">*Fecha de Nacimiento</label>
                    <div class="col-md-6">
                        <input type="date" name="day_of_birth" class="form-control" id="address1" placeholder="Fecha de Nacimiento" max="2001-12-31" required readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Genero*</label>
                    <div class="col-md-6">
                        <label class="checkbox-inline">
                            <input type="radio" id="inlineCheckbox1" name="gender" required value="h" readonly> Hombre
                        </label>
                        <label class="checkbox-inline">
                            <input type="radio" id="inlineCheckbox2" name="gender" required value="m" readonly> Mujer
                        </label>

                    </div>
                </div>


                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Direccion*</label>
                    <div class="col-md-6">
                        <input type="text" name="address" class="form-control" id="address1" placeholder="Direccion" required readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
                    <div class="col-md-6">
                        <input type="email" name="email" class="form-control" id="email1" placeholder="Email" required readonly>
                    </div>
                </div>


                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Telefono de medico <span class="badge badge-pill badge-info">Formato admitido: xxxx-xxxx</span></label>
                    <div class="col-md-6">

                        <input type="text" name="phone" class="form-control" id="phone1" placeholder="Telefono de medico" pattern="[0-9]{4}-[0-9]{4}" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Peso(kg)*</label>
                    <div class="col-md-6">
                        <input type="text" name="phone" class="form-control" id="phone1" placeholder="peso" pattern="[0-9]{2}" required readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Temperatura*</label>
                    <div class="col-md-6">
                        <input type="text" name="phone" class="form-control" id="phone1" placeholder="temperatura" required readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Presion Arterial*</label>
                    <div class="col-md-6">
                        <input type="text" name="phone" class="form-control" id="phone1" placeholder="presion arterial" required readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">alergias</label>
                    <div class="col-md-6">
                        <input type="text" name="" class="form-control" id="" placeholder="alergias" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Nombre de su medico principal</label>
                    <div class="col-md-6">
                        <input type="text" name="phone" class="form-control" id="phone1" placeholder="nombre" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Telefono personal<span class="badge badge-pill badge-info">Formato admitido: xxxx-xxxx</span></label>
                    <div class="col-md-6">
                        <input type="text" name="phone" class="form-control" id="phone1" placeholder="Telefono" pattern="[0-9]{4}-[0-9]{4}" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Enfermedades preexistentes</label>
                    <div class="col-md-6">
                        <textarea name="sick" class="form-control" id="sick" placeholder="Enfermedad" readonly></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Medicamentos que consume</label>
                    <div class="col-md-6">
                        <textarea name="medicaments" class="form-control" id="sick" placeholder="Medicamentos" readonly></textarea>
                    </div>
                </div>
                <!-- <p class="alert alert-info">* Campos obligatorios</p> -->

            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <!-- <button type="submit" class="btn btn-primary">Agregar Paciente</button> -->
                </div>
            </div>
            </form>
        </div>
    </div>

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



        <!-- <div class="form-group">
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
        <!-- </div>  -->
        <!-- </div>



            </form>
        </div>
    </div>


</section>
