<?php

$rx = ReservationData::getRepeated($_POST["pacient_id"], $_POST["medic_id"], $_POST["date_at"], $_POST["time_at"]);


//if(true){
if ($rx == null) {
    $r = new ReservationData();
    if ($_POST["no"] != 1) {
        $r->no = $_POST["no"];
    } else {
        $r->no = rand(1, 9998);
    }
    $r->title = $_POST["title"];
    $r->note = $_POST["note"];
    $r->pacient_id = $_POST["pacient_id"];
    $r->medic_id = $_POST["medic_id"];
    $r->date_at = $_POST["date_at"];
    $r->time_at = $_POST["time_at"];
    $r->user_id = $_SESSION["user_id"];

    $r->status_id = $_POST["status_id"];
    $r->payment_id = $_POST["payment_id"];
    $r->price = $_POST["price"];
    $r->sick = $_POST["sick"];
    $r->symtoms = $_POST["symtoms"];
    $r->medicaments = $_POST["medicaments"];
    if ($_POST["quirur"] == 3) {
        $r->quirur = $_POST["quirur"];
    } else {
        $r->quirur = isset($_POST["quirur"]) ? 1 : 0;
    }

    $r->observ = $_POST["observ"];

    $r->descripcion = $_POST["descripcion"];
    $r->detall = $_POST["detall"];
    $r->name = $_POST["name"];
    $r->lastname = $_POST["lastname"];


    $r->add();



    //////////////////////////////////////////////////////////////////////////////////////////
    $email_user = Core::$smtp_email; //
    $email_password = Core::$smtp_password;
    // Email para el medico

    $medic = MedicData::getById($_POST["medic_id"]);
    $pacient = PacientData::getById($_POST["pacient_id"]);

    if ($medic->email != "" && $email_user != "" && $email_password != "") {
        $the_subject = "Nueva cita para el medico - Sistema de Citas Medicas";
        $address_to = $medic->email;
        $from_name = $medic->name . " " . $medic->lastname;
        $phpmailer = new PHPMailer();
        // ---------- datos de la cuenta de Gmail -------------------------------
        $phpmailer->Username = $email_user;
        $phpmailer->Password = $email_password;
        //-----------------------------------------------------------------------
        // $phpmailer->SMTPDebug = 1;
        $phpmailer->SMTPSecure = 'ssl';
        $phpmailer->Host = "smtp.gmail.com"; // GMail
        $phpmailer->Port = 465;
        $phpmailer->IsSMTP(); // use SMTP
        $phpmailer->SMTPAuth = true;
        $phpmailer->setFrom($phpmailer->Username, $from_name);
        $phpmailer->AddAddress($address_to); // recipients email
        $phpmailer->Subject = $the_subject;
        $phpmailer->Body .= "<h1 style='color:#3498db;'>Nueva cita!</h1>";
        $phpmailer->Body .= "<p>Nombre: Se ha registrado una nueva cita para el medico, a continuacion los datos. </p>";

        $phpmailer->Body .= "<h3 style='color:#3498db;'>DATOS DEL MEDICO</h3>";
        $phpmailer->Body .= "<p>Nombre: " . $medic->name . " " . $medic->lastname . " </p>";

        $phpmailer->Body .= "<h3 style='color:#3498db;'>DATOS DEL PACIENTE</h3>";
        $phpmailer->Body .= "<p>Nombre: " . $pacient->name . " " . $pacient->lastname . " </p>";
        $phpmailer->Body .= "<p>Telefono: " . $pacient->phone . " </p>";
        $phpmailer->Body .= "<p>Email: " . $pacient->email . " </p>";
        $phpmailer->Body .= "<h3 style='color:#3498db;'>DATOS DE LA CITA</h3>";
        $phpmailer->Body .= "<p>Codigo: " . $_POST["no"] . " </p>";
        $phpmailer->Body .= "<p>Asunto: " . $_POST["title"] . " </p>";
        $phpmailer->Body .= "<p>Fecha: " . $_POST["date_at"] . " </p>";
        $phpmailer->Body .= "<p>Hora: " . $_POST["time_at"] . " </p>";

        $phpmailer->IsHTML(true);
        $phpmailer->Send();
    }

    if ($pacient->email != "" && $email_user != "" && $email_password != "") {
        $the_subject = "Confirmacion de cita para el paciente - Sistema de Citas Medicas";
        $address_to = $pacient->email; //"user@gmail.com";
        $from_name = $medic->name . " " . $medic->lastname; //"user";
        $phpmailer = new PHPMailer();
        // ---------- datos de la cuenta de Gmail -------------------------------
        $phpmailer->Username = $email_user;
        $phpmailer->Password = $email_password;
        //-----------------------------------------------------------------------
        // $phpmailer->SMTPDebug = 1;
        $phpmailer->SMTPSecure = 'ssl';
        $phpmailer->Host = "smtp.gmail.com"; // GMail
        $phpmailer->Port = 465;
        $phpmailer->IsSMTP(); // use SMTP
        $phpmailer->SMTPAuth = true;
        $phpmailer->setFrom($phpmailer->Username, $from_name);
        $phpmailer->AddAddress($address_to); // recipients email
        $phpmailer->Subject = $the_subject;
        $phpmailer->Body .= "<h1 style='color:#3498db;'>Nueva cita!</h1>";
        $phpmailer->Body .= "<p>Nombre: Se ha registrado una nueva cita para el paciente, a continuacion los datos. </p>";


        $phpmailer->Body .= "<h3 style='color:#3498db;'>DATOS DEL PACIENTE</h3>";
        $phpmailer->Body .= "<p>Nombre: " . $pacient->name . " " . $pacient->lastname . " </p>";
        $phpmailer->Body .= "<p>Telefono: " . $pacient->phone . " </p>";
        $phpmailer->Body .= "<p>Email: " . $pacient->email . " </p>";
        $phpmailer->Body .= "<h3 style='color:#3498db;'>DATOS DEL MEDICO</h3>";
        $phpmailer->Body .= "<p>Nombre: " . $medic->name . " " . $medic->lastname . " </p>";

        $phpmailer->Body .= "<h3 style='color:#3498db;'>DATOS DE LA CITA</h3>";
        $phpmailer->Body .= "<p>Codigo: " . $_POST["no"] . " </p>";
        $phpmailer->Body .= "<p>Asunto: " . $_POST["title"] . " </p>";
        $phpmailer->Body .= "<p>Fecha: " . $_POST["date_at"] . " </p>";
        $phpmailer->Body .= "<p>Hora: " . $_POST["time_at"] . " </p>";

        $phpmailer->IsHTML(true);
        $phpmailer->Send();
    }
    //////////////////////////////////////////////////////////////////////////////////////////







    Core::alert("Agregado exitosamente!");
} else {
    Core::alert("Error al agregar, Cita Repetida!");
}
Core::redir("./index.php?view=home");
