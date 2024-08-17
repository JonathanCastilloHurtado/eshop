<?php error_reporting(E_ERROR | E_PARSE);?>
 <html>
<head>
	<title>Mi carrito de compras</title>
	<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" 
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Eshop</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <?php include "UI/navbar.html" ?>
</head>
<body>
	<?php
include 'utils/connection.php';
session_start();

/*session is started if you don't write this line can't use $_Session  global variable*/

 	?>
   

<!--https://mdbootstrap.com/docs/standard/extended/shopping-carts/-->
<div class="container d-flex justify-content-center" style="padding: 10px;">
  
     
        <div class="card col-lg-7">
          <div class="card-body p-4">

            <div class="row">

              <div class="col-lg-12"> 
                <h5 class="mb-3"> <u>¡Ya casi es tuyo! </u></h5>
                <hr>
 <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <p class="mb-1">Shopping cart</p>
                   </div>
                  
                </div>
<?php  //https://themes.getbootstrap.com/product/freshcart-ecommerce-html-template/
  $sql = " SELECT productos.id_producto,ventas.Cantidad,ventas.Costo_total , productos.Nombre, productos.Descripcion, SUM(Costo_total) OVER () AS TotalAmountPaid, SUM(ventas.Cantidad) OVER() AS CantidadTotal from ventas, Productos where ventas.ID_Usuario=".$_SESSION["id_usuario"]." AND Productos.ID_Producto = ventas.ID_Producto;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	 
  // output data of each row
  while($row = $result->fetch_assoc()) {
   // echo  $row["Cantidad"]. "<br>"; 
    ?> 
    <div class="row">
      <div class="col-10">
       <div class="card mb-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <div>
                          <img
                            src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img1.webp"
                            class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                        </div>

                        <div class="ms-3">
                          <h5><?php echo $row["Nombre"]?></h5>
                          <p class="small mb-0"><?php echo $row["Descripcion"]?></p>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                       
                          <input id="cantidad_<?php echo $row["id_producto"]?>"
                           max="<?php echo $row["Cantidad"]?>" min="0"   class="form-control" style="width: 60px;height: 50px;" type="number"  value="<?php echo $row["Cantidad"]?>"></input>

                    
                        <div style="width: 80px; margin-left: 10px;">
                          <h5 class="mb-0">$ <?php echo $row["Costo_total"]?></h5>
                        </div>
                        <a href="#!" style="color: #cecece;"></a>
                      </div>
                    </div>
                  </div>

                </div>
      </div>
      <div class="col-2">
      <button type="button" class="btn btn-danger"  onclick="supr_shop(<?php echo $row["id_producto"]?>,1, 'cantidad_<?php echo $row["id_producto"]?>')"><i class="fas fa-trash-alt"></i> </button>
      </div>
    </div>

               

               
<?php
$TotalAmountPaid=$row["TotalAmountPaid"];
$TotalShop=$row["CantidadTotal"];
}
 
}
$conn->close();

    ?>

<div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    
                    <p class="mb-0">You have <?php echo $TotalShop?> items in your cart</p>
                  </div>
                 
                </div>
 

              </div> 
              <hr class="my-4">
              <button type="button" data-mdb-button-init="" data-mdb-ripple-init="" class="btn btn-info btn-block btn-lg" data-mdb-button-initialized="true">
                        <div class="d-flex justify-content-between">
                         <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                          <span>$<?php echo$TotalAmountPaid?></span>
                         
                        </div>
                      </button>

</div> 

</body>
</html>


<script type="text/javascript" src="https://smtpjs.com/v3/smtp.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">   
  function supr_shop(id_producto,id_usuario,cantidad) {
 
     $.ajax({
    type: "POST",
    url: "view/dropView.php",
    data: { 
            id_producto:id_producto,
            cantidad :document.getElementById(cantidad).value,
            id_usuario:id_usuario
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
 
 