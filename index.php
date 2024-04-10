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
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
   
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
            <?php echo  $row["Nombre"]. "<br>";?>
          </h2>
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title><?php echo "Nombre: " . $row["Nombre"]. "<br>";?></title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            <div class="card-body">
              <p class="card-text"><?php echo $row["Descripcion"]. "<br>";?></p>
               <a class="card-text"><?php echo "$ " . $row["Costo"]. "<br>";?></a>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary"

                  onclick="shop(<?php echo $row["ID_Producto"]?>,'<?php echo $row["Costo"]?>','cantidad_<?php echo  $row["ID_Producto"] ;?>')">Add kart</button>

                  <form name="ejemplo2" action="11-html5-number-input.php" method="POST">
<input type="number" name="edad" min="1" max="99" step="1"  required="required" id="cantidad_<?php echo  $row["ID_Producto"] ;?>"
    style="width: 50px;
    height: 50px;">
     
</form> 
                </div>
                <small class="text-body-secondary"><?php echo "Stock Disponible: " . $row["Cantidad"]. "<br>";?></small>
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
<script type="text/javascript" src="https://smtpjs.com/v3/smtp.js"></script>
<script type="text/javascript"> 
const emailSubject = document.getElementById("emailSubject").value;
const emailBody = document.getElementById("emailBody").value;

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


  function preparar_pedido(id_usuario, subject, message, headers, parameters) {
    /***RELGA NEGOCIO PREPARANDO pedido incompleto
     *En este paso se preparan los productos manualmente y puede ser el caso de que algun producto no se encuentre en existencia fisica
     *  pedido_incompleto(id)
     * ***/

      /***RELGA NEGOCIO PREPARANDO pedido completo
     *En este paso se preparan exitosamente los productos manualmente 
     *El siguiente paso sera enviar_pedido(id_usuario, subject, message, headers, parameters) pero solo hasta que se haya mandado por paqueteria ***/
   Email.send({
    Host: "smtp.gmail.com",
    Username: "myemail@gmail.com",
    Password: "*******",
    To: "anotheremail@gmail.com",
    From: "myemail@gmail.com",
    Subject: emailSubject,
    Body: emailBody,
    }).then(
        message => alert("Sent successfully.")
    );
  }

  function enviar_pedido(id_usuario, subject, message, headers, parameters) {
    /***RELGA NEGOCIO ENVIO LISTO
     * SE TIENE COMO MAXIMO 7 Días hábiles para realizar el envio de lo contrario se cancelara
     * SE tiene como maximo 3 ocaciones para envio rechazado por la paqueteria de lo contrario encio cancelado.
     * Este paso es despues de que los trabajadores hagan el proceso de llevar a enviar 
 * Se le notifica al usuario de que su pedido esta completo (Numero de guia y eso...)y se cambia el estatus del pedido a enviado 
 * ***/
   Email.send({
    Host: "smtp.gmail.com",
    Username: "developer.jonathanc@gmail.com",
    Password: "Domcaliber12)",
    To: "pur_gatory@hotmail.com",
    From: "developer.jonathanc@gmail.com",
    Subject: "emailSubject",
    Body: "emailBody",
    }).then(
        message => alert("Sent successfully.")
    );
  }

function pedido_incompleto(id) {

/***RELGA NEGOCIO CONTINUAR pedido incompleto
 * Se realiza una devolucion por la cantidad del producto que no se tenia en existencia (Se despliega esto por correo)
 * Se continua el proceso en preparar_pedido(id_usuario, subject, message, headers, parameters) 
 * ***/

/***RELGA NEGOCIO CANCELAR
 * Se manda correo al usuario comentando que X pedido no podra ser completado por X motivo
 * Si el motivo es que no hay existencia de algun producto, se da la opcion de continuar sin ese producto
 * No quiere el envio, se cancelar_pedido(id ) 
 * ***/

  }


  function cancelar_pedido(id ) {
        /***
         * se cambia el estatus de la venta como cancelada
         * Se añaden los productos que si estuvieron en existencia a stock 
         * Se continua este flujo en devoluciones()***/
    $.ajax({
    type: "POST",
    url: "view/shoppingView.php",
    data: { id_producto:id },
    beforeSend:function(objeto){
        // $('#loader').modal('show');
    }
    ,
    success:function(data){
       
      
    },
    error: function(data){
    }
  })
  .always(function (){
 // $('#loader').modal('hide');
  });

  }

</script>