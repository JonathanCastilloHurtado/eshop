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

 <footer class="bg-dark pb-5 pt-3" > <div class="container"> <div class="row"> <div class="senja-embed" data-id="1dbfe1ba-fe93-44ce-8d79-6dfccef7fc47" data-mode="shadow" data-lazyload="false" data-built="true" data-session="6301209a-6869-42e2-a071-a12c02d3045b"></div> <script async="" type="text/javascript" src="https://widget.senja.io/widget/1dbfe1ba-fe93-44ce-8d79-6dfccef7fc47/platform.js"></script> </div> <div class="row mt-5"> <div class="col-lg-6"> <h4 class="text-white">TCG Land</h4> <p class="text-light text-opacity-50 mt-2">
Tu tienda Mexicana con +80,000 cartas de Magic: The Gathering...<br>
...y pronto Pokémon y Yu-Gi-Oh! + toda América Latina.
</p> <ul class="list-unstyled mt-3"> <li> <a class="text-light text-opacity-50" target="_blank" href="https://ayuda.tcg.land/ayuda/politica-de-privacidad-de-tcg-land/">Política de privacidad</a> </li> <li> <a class="text-light text-opacity-50" target="_blank" href="https://ayuda.tcg.land/ayuda/terminos-y-condiciones-de-tcg-land/">Términos y Conditions</a> </li> <li> <a class="text-light text-opacity-50" target="_blank" href="https://ayuda.tcg.land/ayuda/politica-de-cookies-de-tcg-land/">Política de Cookie</a> </li> </ul> </div> <div class="col-lg-2 col-md-4 mt-3 mt-lg-0"> <h5 class="text-light">Ayuda</h5> <ul class="list-unstyled ps-0 mb-0 mt-3"> <li> <a target="_blank" class="text-light text-opacity-50" href="https://ayuda.tcg.land/ayuda/horarios-de-atencion-y-tiempo-de-respuesta-del-servicio-al-cliente-de-tcg-land/">Atención al cliente</a> </li> <li> <a target="_blank" class="text-light text-opacity-50" href="https://ayuda.tcg.land/">FAQs</a> </li> <li> <a target="_blank" class="text-light text-opacity-50" href="https://ayuda.tcg.land/ayuda/politica-de-devoluciones-y-reembolsos-de-tcg-land/">Política de Reembolsos y Devoluciones</a> </li> <li> <a target="_blank" class="text-light text-opacity-50" href="https://ayuda.tcg.land/ayuda/programa-de-afiliados-de-tcg-land/">Programa de Afiliados</a> </li> <li> <a target="_blank" class="text-light text-opacity-50" href="https://developers.tcg.land/es">API y Volcado de datos</a> </li> </ul> </div> <div class="col-lg-2 col-md-4 mt-3 mt-lg-0"> <h5 class="text-light">Compra</h5> <ul class="list-unstyled ps-0 mb-0 mt-3"> <li> <a class="text-light text-opacity-50" href="/multisearch#/magic-the-gathering">
Búsqueda Múltiple
</a> </li> <li> <a target="_blank" class="text-light text-opacity-50" href="/search#/magic-the-gathering">Magic: The Gathering </a> </li> <li class="mt-3"> <span class="text-light text-opacity-50">Próximamente: </span> </li> <li> <span class="text-light text-opacity-50">Yu-Gi-Oh!</span> </li> <li> <span class="text-light text-opacity-50">Pokémon</span> </li> </ul> </div> <div class="col-lg-2 col-md-4 mt-3 mt-lg-0"> <h5 class="text-light">Contacto</h5> <ul class="list-unstyled ps-0 mb-0 mt-3"> <li class="mt-3"> <a aria-label="Chat on WhatsApp" href="https://wa.me/525547935013" target="_blank"> <img alt="Chat on WhatsApp" src="/_astro/whatsapp.DMI3br3m.svg"> </a> </li> <li class="mt-3"> <a class="text-light text-opacity-50" href="mailto:info@tcg.land" target="_blank">info@tcg.land</a> </li> </ul> <br> <h5 class="text-light">Síguenos en Redes</h5> <ul class="list-unstyled ps-0 mb-0 mt-2"> <li> <a href="https://www.instagram.com/reel/C8kxMs_PyiV/" class="fs-2 text-light text-opacity-50" target="_blank"> <i class="ri-instagram-line"></i> </a> <a href="https://www.facebook.com/tcg.land.fb/" class="fs-2 text-light text-opacity-50" target="_blank"> <i class="ri-facebook-circle-fill"></i> </a> <a href="https://www.tiktok.com/@tcg.land" class="fs-2 text-light text-opacity-50" target="_blank"> <i class="ri-tiktok-fill"></i> </a> <a href="https://www.youtube.com/@tcg-land" class="fs-2 text-light text-opacity-50" target="_blank"> <i class="ri-youtube-fill"></i> </a> <a href="https://discord.gg/YKbJzkNvWR" class="fs-2 text-light text-opacity-50" target="_blank"> <i class="ri-discord-fill"></i> </a> </li> </ul> </div> </div> <div class="row mt-5"> <div class="col"> <p class="mb-3 mb-md-0 fs-xxs text-muted">
2024 TCG Land, SAPI de CV - Todos los Derechos Reservados
</p> <p class="mb-3 mb-md-0 fs-xxs text-muted">
Last deployment: Wed, 7 Aug 2024 06:09 +00:00 </p> <p class="mb-3 mb-md-0 fs-xxs text-muted">
Revision: main f4199e8dd32b4d9206b3bc8b6a9668e7e38c6ccd </p> </div> <div class="col-auto"> <img class="footer-payment" src="/_astro/mastercard.DZPkINsw.svg" alt="..."> <img class="footer-payment" src="/_astro/visa.LSjQMW8S.svg" alt="..."> <img class="footer-payment" src="/_astro/amex.--xHQWOX.svg" alt="..."> <img class="footer-payment" src="/_astro/paypal.DjpH6tr3.svg" alt="..."> <img class="footer-payment" src="/_astro/maestro.ZyvNBdnU.svg" alt="..."> <img class="footer-payment" src="/_astro/klarna.CKl9LKC7.svg" alt="..."> </div> </div> </div> </footer> 
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