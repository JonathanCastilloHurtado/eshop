 <!--LIBRERIA DE FONT AWESOME-->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 <div class="container">
   
         
            
            <img src="imagenes/ph_mtg.webp" onclick="location.href='http://localhost:8082/eshop/descripcion.php?id_producto=<?php echo $row["id_producto"]?>'"  style="cursor: pointer;"   width="128px"; height="178px"> 

           
            
         <div style="color: black;">
  <p style="margin:3px;"><b><?php echo  $row["nombre"]. "<br>";?></b></p>
  <p class="card-text" style="color: rgba(var(--fc-dark-rgb),var(--fc-text-opacity))!important"><?php echo "$ " . $row["costo"]. "<br>";?></p>
  <p class="card-text" style="font-size: 12px;"><?php echo $row["descripcion"]. "<br>";?></p>
</div>
           
             
         
<!--input type="number" name="edad" min="0" max="<?php //echo $row["cantidad"]?>" step="1"  required="required" id="cantidad_<?php //echo  $row["id_producto"] ;?>"
    style="width: 50px;
    height: 50px;"  value="0" /--> 
    
  <button class="btn btn-primary" type="button"style=" background: #80cffa; color: #fafafa;" class="fa fa-shopping-cart"
                  onclick="shop(<?php echo $row["id_producto"]?>,'<?php echo $row["costo"]?>','cantidad_<?php echo  $row["id_producto"] ;?>')">AÑADIR AL CARRITO</button> 
  

 </div>
<script type="text/javascript">
  document.getElementById("cantidad_<?php echo  $row["id_producto"] ;?>").addEventListener("click", function(e) {
  const value = this.value,
    max = this.getAttribute("max"),
    min = this.getAttribute("min"),
    minned = this.dataset.minned === "true";
  maxed = this.dataset.maxed === "true";
  if (value === max && maxed) {
    alert("Value is max");
  }
  if (value === min && minned) {
    alert("Value is at 0");
  }
  this.dataset.maxed = value === max ? "true" : "false";
  this.dataset.minned = value === min ? "true" : "false";
})
</script>