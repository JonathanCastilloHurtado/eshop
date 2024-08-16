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


   <?php 
$expancion="YU-Gi-OH!";
   include "UI/expansion.php" ?>
   <?php 
$expancion="POKEMON";
include "UI/expansion.php" ?>
   
   <div style="padding-bottom: 0px;">
     <?php 
$expancion="MAGIC";
include "UI/expansion.php" ?>
   <?php include "UI/loader.html" ?>
   </div>

 <div class="container" style="color:black;">
<h3 style="color: black; padding-top: -15px;">NOTICIAS </h3> 
  
   <?php include "UI/news.php" ?>
  </div>

      <div class="container" style="color:black;">

<div class="row">
    <div class="col-4"> <hr style="color: black; "></div> 
    <h3 class="col-4"> Lo mas buscado </h3>   
 
    <div class="col-4"> <hr style="color: black; "></div>
    </div> 

<p>Recuerda que puedes consultar las cartas mas buscadas de esta semana en nuestro canal de youtube
   </p>
<iframe width="560" height="315" src="https://www.youtube.com/embed/L01Coed2qO8?si=_618nw22fNIr5KR3" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
 
   </div>
<button onclick="enviar_pedido()">Realizar envio</button>

<button onclick="pedido_incompleto()">Notificar pedido incompleto</button>

</body>
<footer class="bg-dark pb-5 pt-3" >  
<?php include "UI/footer.php" ?>
</footer>
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

<style type="text/css"> 

    .section-title-bold-center span {
    border: 2px solid rgba(0, 0, 0, .1);
    padding: .3em .8em;
}
  div{ flex: none;overflow-x: hidden;}
</style>