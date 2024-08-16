
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Eshop</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <?php include "UI/navbar.html" ?>
	<title>Descipcion del producto</title>
</head>
<body> 
 
  <hr>



<?php  //https://themes.getbootstrap.com/product/freshcart-ecommerce-html-template/
$sql = "SELECT * FROM productos where id_producto=".$_GET['id_producto'];
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    ?>
<section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6">
                      <img class="card-img-top mb-5 mb-md-0" src="imagenes/ph_mtg.webp" alt="...">
                    </div>
                    <div class="col-md-6">
                        <div class="small mb-1">ID PRODUCTO: <?php echo $row["id_producto"]?></div>
                        <h1 class="display-5 fw-bolder"><?php echo $row["nombre"]?></h1>
                        <div class="fs-5 mb-5">
                            <span class="">$ <?php echo $row["costo"]?></span> 
                        </div>
                        <p class="lead"><?php echo $row["descripcion"]?></p>
<small class="text-body-secondary"><?php echo "Stock Disponible: " . $row["cantidad"]. "<br>";?></small>
                        


                        
 

      

                      <div class="row">
                        <div class="col-3"> 
                          <input 
                          onclick="max_min_validations(<?php echo $row["cantidad"]?>,this.value)" 
                          type="number" id="cantidad" min="1" max="<?php echo $row["cantidad"]?>" value="0" step="1"  required="required" id="cantidad"class="form-control" style="width: 73px;height: 50px;">
                        </div>
                        <div class="col-9
                        ">  <button style="height: 100%;" class="btn btn-warning" onclick="shop(<?php echo $row["id_producto"]?>,'<?php echo $row["costo"]?>')">AÑADIR AL CARRITO</button> </div> 
                      </div> 
                </div>
                
                </div>
            </div>
        </section>
<?php 
}
}
?>

   <?php include "UI/arrivals.php" ?>
</body>
<footer class="bg-dark pb-5 pt-3" >  
<?php include "UI/footer.php" ?>
</footer>
</html>

<script type="text/javascript" src="https://smtpjs.com/v3/smtp.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


<script type="text/javascript"> 
  function max_min_validations(maximum,added){
    
  if (added>maximum) {
    alert("Value is max");
  } 

} 
 
  function shop(id,costo) {
    
  	$.ajax({
    type: "POST",
    url: "view/shoppingView.php",
    data: { 
            id_producto:id,
            cantidad :  document.getElementById("cantidad").value,
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