<!DOCTYPE html>
<html>
<head>
	<title>Unete</title>
	  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include "UI/navbar.html" ?>

</head>
<body>
	<?php
include 'utils/connection.php';
session_start();

/*session is started if you don't write this line can't use $_Session  global variable*/

 	?>
<H1>Vuelvete miembro</H1>


<div class="d-flex justify-content-center ">
  <div class="card" style="width: 38rem;">
  <div class="card-body">
    <h5 class="card-title">Datos personales</h5>  

    <form>

 <div class="form-group">
    <label for="exampleInputEmail1">Nombre/s</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre/s">
   </div>

   <div class="form-group">
    <label for="exampleInputEmail1">Apellido materno</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Apellido materno">
   </div>

   <div class="form-group">
    <label for="exampleInputEmail1">Apellido Paterno</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Apellido paterno">
   </div>


   <div class="form-group">
    <label for="exampleInputEmail1">Dirección</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Direccion">
   </div>


   <div class="form-group">
    <label for="exampleInputEmail1">Telefono</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Telefono">
   </div>
<hr>
   <!-- -->   
<h5 class="card-title">Datos cuenta</h5>  

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <br>
  <button type="submit" class="btn btn-primary w-100 p-3">Submit</button>
</form>

  </div>
</div>
</div>



</body>
</html>