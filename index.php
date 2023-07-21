<?php
include 'utils/connection.php';
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

<div id="response">Mi respuesta</div>

<?php
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

                  onclick="shop(<?php echo $row["ID_Producto"]?>,'<?php echo $row["Costo"]?>','cantidad_<?php echo  $row["ID_Producto"] ;?>')"
  
                  >Comprar</button>
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

<button onclick="cancelar_pedido()">Cancelar envio</button>

</body>

</html>
 
<script type="text/javascript"> 

  function shop(id,costo,cantidad) {
    $.ajax({
    type: "POST",
    url: "view/shoppingView.php",
    data: { id_producto:id, cantidad :  document.getElementById(cantidad).value, costo: costo, id_usuario:1},
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


  function enviar_pedido(id) {
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

function pedido_incompleto(id) {
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


  function cancelar_pedido(id ) {
        
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