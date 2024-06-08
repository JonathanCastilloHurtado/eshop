<?php
include 'utils/connection.php'; 

session_start();

/*session is started if you don't write this line can't use $_Session  global variable*/
//mysql -h localhost -u root -p
$_SESSION["id_usuario"]=1;
?>

<html lang="en">
<head>
 <script src="js/jquery-3.3.1.js"></script> 

 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include "UI/navbar.html" ?>
 <title>
	eSHOP
</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">


</head>

<body>

<h1>
	Example

</h1>
<!--El id sera seteado al inicia sesion por medio de una variable de sesion -->
<BUTTON onclick="location.href='http://localhost:8082/eshop/MyCart.php'">Carro de compras</BUTTON>


<div class="modal fade" id="loader" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false" style="background-color: rgba(171,171,171, 0.5);">
     <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content" style="
    background: transparent;
    color: rgba(255,255,255,1);
    box-shadow: none;
    border: none;">
       <div id="spinner_body" class="modal-body text-center">
        <img src="imagenes/loader.svg">
       </div>
      </div>
     </div>
</div>       

<?php  //https://themes.getbootstrap.com/product/freshcart-ecommerce-html-template/
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    ?>

<div class="album py-5 bg-body-tertiary">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
       
     
        <div class="col">
          <div class="card shadow-sm">
            <h2>
            <?php echo  $row["nombre"]. "<br>";?>
          </h2>
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title><?php echo "nombre: " . $row["nombre"]. "<br>";?></title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            <div class="card-body">
              <p class="card-text"><?php echo $row["descripcion"]. "<br>";?></p>
               <a class="card-text"><?php echo "$ " . $row["costo"]. "<br>";?></a>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">

                  <button onclick="location.href='http://localhost:8082/eshop/descripcion.php?id_producto=<?php echo $row["id_producto"]?>'" >Detalles</button>

                  <button type="button" class="btn btn-sm btn-outline-secondary"

                  onclick="shop(<?php echo $row["id_producto"]?>,'<?php echo $row["costo"]?>','cantidad_<?php echo  $row["id_producto"] ;?>')">Add kart</button>

                  <form name="ejemplo2" action="11-html5-number-input.php" method="POST">
<input type="number" name="edad" min="1" max="99" step="1"  required="required" id="cantidad_<?php echo  $row["id_producto"] ;?>"
    style="width: 50px;
    height: 50px;">
     
</form> 
                </div>
                <small class="text-body-secondary"><?php echo "Stock Disponible: " . $row["cantidad"]. "<br>";?></small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php
  }
} else {
  echo "Error al cargar los resultados.";
}
$conn->close();
?>
<br>
<button onclick="enviar_pedido()">Realizar envio</button>

<button onclick="pedido_incompleto()">Notificar pedido incompleto</button>

</body>

</html>
<script src="https://smtpjs.com/v3/smtp.js">
</script>
 <script type="text/javascript"> 

  function shop(id,costo,cantidad) {
    $.ajax({
    type: "POST",
    url: "view/shoppingView.php",
    data: { 
            id_producto:id,
            cantidad :  document.getElementById(cantidad).value,
            costo: costo,
            id_usuario:1
          },
    beforeSend:function(objeto){
        // $('#loader').modal('show');
    }
    ,
    success:function(data){
      alert(data);
$(document).ajaxStop(function(){
    window.location.reload();
});
     
     //  $('#loader').modal('hide');      
    },
    error: function(data){
    }
  })
  .always(function (){
 // $('#loader').modal('hide');
  });
  }


 

  function enviar_pedido(id_usuario, subject, message, headers, parameters) {
    /***RELGA NEGOCIO ENVIO LISTO
     * SE TIENE COMO MAXIMO 7 Días hábiles para realizar el envio de lo contrario se cancelara
     * SE tiene como maximo 3 ocaciones para envio rechazado por la paqueteria de lo contrario encio cancelado.
     * Este paso es despues de que los trabajadores hagan el proceso de llevar a enviar 
 * Se le notifica al usuario de que su pedido esta completo (Numero de guia y eso...)y se cambia el estatus del pedido a enviado 
 * ***/
$.ajax({
    type: "POST",
    url: "view/notify.php",
    data: { 
            mail_to:"jcastillo@xxi-banorte.com" 
          },
    beforeSend:function(objeto){
        // $('#loader').modal('show');
    }
    ,
    success:function(data){
      alert(data);
$(document).ajaxStop(function(){
    window.location.reload();
});
     
     //  $('#loader').modal('hide');      
    },
    error: function(data){
    }
  })
  .always(function (){
 // $('#loader').modal('hide');
  });




  }



  

</script>