

<div class="container">
<div class="row">
    <div class="col-11"><h3 style="color: black;">Yu-gi-oh!</h3> </div>
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
  <div class="col-3" style="padding: 5px;">     
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
    <div class="col-11"> </div>
    <div class="col-1">
 <button>Ver mas</button>
    </div>
</div>   

</div>