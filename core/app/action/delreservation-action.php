<?php
if(isset($_SESSION["user_id"]) || isset($_SESSION["medic_id"])){
$user = ReservationData::getById($_GET["id"]);
$user->del();
if(isset($_SESSION["user_id"])){
    Core::alert("Actualizado exitosamente!");

// print "<script>window.location='index.php?view=reservations';</script>";
print "<script>window.location='index.php?view=calendar';</script>";

}
else if(isset($_SESSION["medic_id"])){
    Core::alert("Actualizado exitosamente!");

// print "<script>window.location='index.php?view=medicreservations';</script>";
print "<script>window.location='index.php?view=calendar';</script>";


}
}
?>
