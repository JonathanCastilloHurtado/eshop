
<?php 
include 'utils/connection.php';

session_start();

/*session is started if you don't write this line can't use $_Session  global variable*/
//mysql -h localhost -u root -p
$_SESSION["id_usuario"]=1;

?>

 <html>
<head>
   <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include "UI/navbar.html" ?>
	<title>Descipcion del producto</title>
</head>
<body> 
 
  <hr>



<?php  //https://themes.getbootstrap.com/product/freshcart-ecommerce-html-template/
$sql = "SELECT * FROM productos where ID_Producto=".$_GET['id_producto'];
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    ?>
<section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="..."></div>
                    <div class="col-md-6">
                        <div class="small mb-1">ID PRODUCTO: <?php echo $row["ID_Producto"]?></div>
                        <h1 class="display-5 fw-bolder"><?php echo $row["Nombre"]?></h1>
                        <div class="fs-5 mb-5">
                            <span class="text-decoration-line-through">$ <?php echo $row["Costo"]?></span> 
                        </div>
                        <p class="lead"><?php echo $row["Descripcion"]?></p>
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
        </section>
<?php 
}
}
?>
</body>
</html>

<script type="text/javascript" src="https://smtpjs.com/v3/smtp.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


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

</script>