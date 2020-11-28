<section class="content">
<h1>seccion david</h1>

<?php
//echo date('N',strtotime('2018-04-17'));
$pacients = PacientData::getAll();
//$medics = MedicData::getAll();

$statuses = StatusData::getAll();
$payments = PaymentData::getAll();

?>

<div class="row">
<div class="col-md-10">
<h1>Nueva Cita</h1>
<form class="form-horizontal" role="form" method="post" action="./?action=addreservation" id="newreservation">
  <div class="form-group">
    <div class="col-lg-3 col-lg-offset-2">
    <label for="inputEmail1" class="control-label">Primera Cita</label>
      <input type="text" name="no" class="form-control" id="inputEmail1" placeholder="fecha">
    </div>
    <div class="col-lg-7">
    <label for="inputEmail1" class="control-label">Ultima cita</label>
      <input type="text" name="title" required class="form-control" id="inputEmail1" placeholder="fecha">
    </div>

      <!--agregar al segundo sprint-->
        <div class="form-group">
    <div class="col-lg-3 col-md-offset-2">
    <label for="inputEmail1" class="control-label">Area Medica</label>
<select name="category_id" id="category_id" class="form-control" required>
<option value="">-- SELECCIONE --</option>
  <?php foreach(CategoryData::getAll() as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>

    <div class="col-lg-7">
    <label for="inputEmail1" class="control-label">Medico</label>
<select name="medic_id" id="medic_id" class="form-control" required>
<option value="">-- SELECCIONE AREA--</option>
</select>
    </div>
  </div>
      <!--agregar al segundo sprint-->

 </div>

    <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre</label>
    <div class="col-md-6">
      <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>



  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha/Hora</label>
    <div class="col-lg-5">
      <input type="text"  name="date_at" id="date_at" required class="pickadate2 form-control" id="inputEmail1" placeholder="Fecha">
    </div>
  </div>


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Motivo de la cita</label>
    <div class="col-lg-4">
    <textarea class="form-control" name="note" placeholder="Motivo de la cita"></textarea>
    </div>

  </div>
      <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Observaciones</label>
    <div class="col-lg-4">
    <textarea class="form-control" name="symtoms" placeholder="Observaciones"></textarea>
    </div>

  </div>


  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-default">Agregar Cita</button>
    </div>
  </div>
</form>

<script type="text/javascript">

$(".pickadate2").pickadate(
  {
    format: 'yyyy-mm-dd',
    min: '<?php echo date('Y-m-d',time()-(24*60*60)); ?>',
 onSet: function(context) {
  if($("#medic_id").val()==""){
    alert("Debes seleccionar un medico!");
$('#time_at')
    .find('option')
    .remove()
    .end();
  }else{

$.get("./?action=gethours","medic_id="+$("#medic_id").val()+"&date_at="+$("#date_at").val(),function(data){
  $("#time_at").html(data);
          console.log((data));

  });


  }
//        console.log((data));
    }
  }
  );


  $("#newreservation").submit(function(e){
    if($("#date_at").val()==""||$("#time_at").val()==""){
          e.preventDefault();
          alert("Debes seleccionar fecha y hora!");
    }

  });

$(document).ready(function(){

$("#category_id").change(function(){

$.get("./?action=getmedics","cat_id="+$("#category_id").val(),function(data){
  $("#medic_id").html(data);
  console.log(data);
  });


});

});

</script>

</div>
</div>
</section>
