<?php


session_start();

/*session is started if you don't write this line can't use $_Session  global variable*/
//mysql -h localhost -u root -p
$_SESSION["id_usuario"]=1;
?>
<!--PLANTILLA A TOMAR COMO REFERENCIA-->
<!--https://freshcart.codescandy.com/pages/index-5.html-->
<html lang="en">
<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Eshop</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body> 
   <?php include "UI/navbar.html" ?>
<!--El id sera seteado al inicia sesion por medio de una variable de sesion -->

   <?php include "UI/carouselBanner.html" ?>
   <?php include "UI/arrivals.php" ?>


   <?php include "UI/expansion.php" ?>
   <?php include "UI/expansion.php" ?>
   <?php include "UI/loader.html" ?>


 

<?php  
include 'utils/connection.php'; 
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    ?>

  <?php
  }
} else {
  echo "Error al cargar los resultados.";
}
$conn->close();
?>
<br>
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
     
     //  $('#loader').modal('hide');      
    },
    error: function(data){
      alert(data); 

    }
  })
  .always(function (){
 // $('#loader').modal('hide');
  });




  }



  

</script>