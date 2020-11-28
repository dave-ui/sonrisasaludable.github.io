<?php


//if(true){
$r = new QuirurData();
$r->observaciones = $_POST["observaciones"];
$r->pacient_id = $_POST["pacient_id"];
$r->date_at = $_POST["date_at"]; //si

$r->descripcion = $_POST["descripcion"];
$r->detall = $_POST["detall"];
//$r->name = $_POST["name"];
//$r->lastname = $_POST["lastname"];
$r->medic_id = $_POST["medic_id"];
$r->time_at = $_POST["time_at"];
$r->user_id = $_SESSION["user_id"];



$r->add();









Core::alert("Agregado exitosamente!");

Core::redir("./index.php?view=newquirurgico");
?>
