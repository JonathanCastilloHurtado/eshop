<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Eshop</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<div class="container">
<div class="row">
    <div class="col-11"><h3 style="color: black;"> PRUEBA</h3> </div>
    <div class="col-1">
     </div>
</div>    
<div class="row">
     
<?php  
include 'utils/connection.php'; 
$sql = "SELECT * FROM productos LIMIT 8";
$result = $conn->query($sql);

?> 
        
<?php

if ($result->num_rows > 0) { 
  // output data of each row
   $cardBatch=1;
  while($row = $result->fetch_assoc()) {
    ?>
  <div class="col-6 col-sm-4 col-md-6 col-lg-4 col-xl-3 col-xxl-3" style="padding: 5px;">     
  <?php include "UI/product_mini.php" ?> 
</div>

<?php
  if($cardBatch==4){
$cardBatch=1;
?> 
  </div>
<div class="row">
   <?php
  }
  else{
$cardBatch++;
  } 

}

   
    }
  
$conn->close();
//TODO PNER ETIQUETA OFERTA
?> 

  </div>
<div class="row">
    <div class="col-10"> </div>
    <div class="col-2">
 <button>Ver mas</button>
    </div>
</div>   

</div>