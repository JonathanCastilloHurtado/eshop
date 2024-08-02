 <!--LIBRERIA DE FONT AWESOME-->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <div class="col" style="width: 300px; ">
          <div class="card shadow-sm">
            
            <img src="imagenes/place_holder.jpg" onclick="location.href='http://localhost:8082/eshop/descripcion.php?id_producto=<?php echo $row["id_producto"]?>'"  style="cursor: pointer;"   width="100%" height="225"  focusable="false"> 

            <div class="card-body">
            
          <center>
  <p style="margin:3px;">
            <b><?php echo  $row["nombre"]. "<br>";?></b>
          </p>

            <p class="card-text" style="color: rgba(var(--fc-dark-rgb),var(--fc-text-opacity))!important"><?php echo "$ " . $row["costo"]. "<br>";?></p>
              <p class="card-text" style="font-size: 12px;"><?php echo $row["descripcion"]. "<br>";?></p>

            </center>
             
         
<!--input type="number" name="edad" min="0" max="<?php //echo $row["cantidad"]?>" step="1"  required="required" id="cantidad_<?php //echo  $row["id_producto"] ;?>"
    style="width: 50px;
    height: 50px;"  value="0" /--> 
     <div class="d-grid gap-2 col-9 mx-auto">
  <button class="btn btn-primary" type="button"style=" background: #80cffa; color: #fafafa;" class="fa fa-shopping-cart"
                  onclick="shop(<?php echo $row["id_producto"]?>,'<?php echo $row["costo"]?>','cantidad_<?php echo  $row["id_producto"] ;?>')">AÑADIR AL CARRITO</button> 
</div> 
  
            </div>
          </div>
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