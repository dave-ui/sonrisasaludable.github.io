<section class="content">
    <script type="text/javascript" src="core\app\func\exped.js"></script>

    <!--   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
 -->

    <div class="row">
        <div class="col-md-12">
            <h1>Nuevo Paciente</h1>
            <br>
            <form class="needs-validation" method="post" id="addproduct" enctype="multipart/form-data" action="index.php?view=addpacient" role="form" novalidate>


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
                    <label for="inputEmail1" class="col-lg-2 control-label">Peso*</label>
                    <div class="col-md-6">
                        <input type="text" name="phone" class="form-control" id="phone1" placeholder="peso" pattern="[0-9]{4}-[0-9]{4}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Temperatura*</label>
                    <div class="col-md-6">
                        <input type="text" name="phone" class="form-control" id="phone1" placeholder="temperatura" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Presion Arterial*</label>
                    <div class="col-md-6">
                        <input type="text" name="phone" class="form-control" id="phone1" placeholder="presion arterial" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">alergias</label>
                    <div class="col-md-6">
                        <input type="text" name="" class="form-control" id="" placeholder="alergias">
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
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- <hr>
    <h1>validacion de formularios</h1>
    <br>
    <form class="needs-validation" novalidate>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationCustom01">First name</label>
                <input type="text" class="form-control" id="validationCustom01" value="Mark" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="validationCustom02">Last name</label>
                <input type="text" class="form-control" id="validationCustom02" value="Otto" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationCustom03">City</label>
                <input type="text" class="form-control" id="validationCustom03" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationCustom04">State</label>
                <select class="custom-select" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                    <option>...</option>
                </select>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationCustom05">Zip</label>
                <input type="text" class="form-control" id="validationCustom05" required>
                <div class="invalid-feedback">
                    Please provide a valid zip.
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                    Agree to terms and conditions
                </label>
                <div class="invalid-feedback">
                    You must agree before submitting.
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Submit form</button>
    </form>

    <br>


    <hr>

    <form class="needs-validation" novalidate>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationCustom01">First name</label>
                <input type="text" class="form-control" id="validationCustom01" value="Mark" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="validationCustom02">Last name</label>
                <input type="text" class="form-control" id="validationCustom02" value="Otto" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationCustom03">City</label>
                <input type="text" class="form-control" id="validationCustom03" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationCustom04">State</label>
                <select class="custom-select" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                    <option>...</option>
                </select>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationCustom05">Zip</label>
                <input type="text" class="form-control" id="validationCustom05" required>
                <div class="invalid-feedback">
                    Please provide a valid zip.
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <br>
                <label class="form-check-label" for="invalidCheck">
                    Agree to terms and conditions
                </label>
                <div class="invalid-feedback">
                    You must agree before submitting.
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Submit form</button>
    </form>



    <hr>
    <div class="bs-example">
        <form id="pacientes" action="/examples/actions/confirmation.php" class="needs-validation" method="post" novalidate>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Persona que lo refiere</label>
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
                    <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Apellido" required>
                </div>
            </div>


            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">*Fecha de Nacimiento</label>
                <div class="col-md-6">
                    <input type="date" name="day_of_birth" class="form-control" id="address1" placeholder="Fecha de Nacimiento" required>
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
                <label for="inputEmail1" class="col-lg-2 control-label">Telefono*</label>
                <div class="col-md-6">
                    <input type="text" name="phone" class="form-control" id="phone1" placeholder="Telefono" required>
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Peso*</label>
                <div class="col-md-6">
                    <input type="text" name="phone" class="form-control" id="phone1" placeholder="Telefono" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Temperatura*</label>
                <div class="col-md-6">
                    <input type="text" name="phone" class="form-control" id="phone1" placeholder="Telefono" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Presion Arterial*</label>
                <div class="col-md-6">
                    <input type="text" name="phone" class="form-control" id="phone1" placeholder="Telefono" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">alergias</label>
                <div class="col-md-6">
                    <input type="text" name="" class="form-control" id="" placeholder="Telefono">
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

    <!-- JavaScript for disabling form submissions if there are invalid fields -->
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


        // var validated = {};

        // function validate(field) {
        //     // Get the  value of the input field being submitted
        //     value = document.getElementById(field).value;

        //     // Set the error field tag in the html
        //     errorField = field + 'Error';

        //     // Set the success field
        //     successField = field + 'Success';

        //     if (value != '') {
        //         document.getElementById(successField).style.display = 'block';
        //         document.getElementById(errorField).style.display = 'none';
        //         validated[field] = true;
        //     } else {
        //         document.getElementById(successField).style.display = 'none';
        //         document.getElementById(errorField).style.display = 'block';
        //         validated[field] = false;
        //     }
        // }

        // function SimulateSubmit() {
        //     // Query your elements
        //     var inputs = document.getElementsByTagName('input');

        //     // Loop your elements
        //     for (i = 0, len = inputs.length; i < len; i++) {
        //         var name = inputs[i].id;

        //         if (!validated[name]) {
        //             // Call validate
        //             validate(name);
        //             // Prevent default
        //         }
        //     }
        // }
    </script>
    </div>
</section>
