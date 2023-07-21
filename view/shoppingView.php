<?php
include '../controller/controller.php';

$mController = new mController();
$id_producto=(isset($_REQUEST['id_producto']) && $_REQUEST['id_producto']!=null) ? $_REQUEST['id_producto'] : '';

$cantidad=(isset($_REQUEST['cantidad']) && $_REQUEST['cantidad']!=null) ? $_REQUEST['cantidad'] :0;

$costo=(isset($_REQUEST['costo']) && $_REQUEST['costo']!=null) ? $_REQUEST['costo'] :0;

$id_usuario=(isset($_REQUEST['id_usuario']) && $_REQUEST['id_usuario']!=null) ? $_REQUEST['id_usuario'] :0;

if($cantidad<=0){
echo "El articulo debe de ser mayor a 0 pra poder realizar la compra.";
}
else{
	$mController->validateShop($id_producto,$cantidad,$costo,$id_usuario);

}

?>