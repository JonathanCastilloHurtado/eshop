<?php
include '../controller/controller.php';

$mController = new mController();
$id_producto=(isset($_REQUEST['id_producto']) && $_REQUEST['id_producto']!=null) ? $_REQUEST['id_producto'] : '';

$cantidad=(isset($_REQUEST['cantidad']) && $_REQUEST['cantidad']!=null) ? $_REQUEST['cantidad'] :0; 

$id_usuario=(isset($_REQUEST['id_usuario']) && $_REQUEST['id_usuario']!=null) ? $_REQUEST['id_usuario'] :0;

$mController->drop_element($cantidad,$id_producto,$id_usuario);



?>