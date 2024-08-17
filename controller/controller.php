<?php
include 'interfaceController.php';
include '../Model/model.php';

class mController implements Controller {
  	

public function validateShop($id_producto,$stock_comprado,$costo,$id_usuario){
//Si se coloca afuera a nivel global crashea por que no hay un metodo main
include '../utils/connection.php';

$sql = "select * from productos where id_producto = ".$id_producto;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$stock_disponible=$row["cantidad"];
	if($stock_disponible>=$stock_comprado){
		$this->updateProd($id_producto,$stock_comprado,$stock_disponible,$costo,$id_usuario);
//echo "OK";
	}
else{
	echo "El articulo ".$row["nombre"]." no cuenta con piezas suficientes.";
}
}
else{
	echo "El articulo seleccionado no se encuentra disponible.";
}

}

 function updateProd($id_producto,$stock_comprado,$stock_disponible,$Costo_unitario,$id_usuario){
include '../utils/connection.php';

$stock_disponible=$stock_disponible-$stock_comprado;
//ctualizamos el catalogo de ventas
if($stock_disponible==0){
$sql = "DELETE FROM productos WHERE id_producto=".$id_producto;
}
else{
	$sql = "UPDATE productos SET cantidad='".$stock_disponible."' WHERE id_producto=".$id_producto;
}
//si se pudieron hacer las modificaciones se continua
if ($conn->query($sql) === TRUE) {
//verificar que el usuario tenga ya registrado un articulo con ese id

	$sql_current_shop=" select * from ventas where id_usuario=".$id_usuario." and id_producto=".$id_producto;
	$result = $conn->query($sql_current_shop);
	//si es true == update de taba y sumar la cantidad actual + la cantidad agregada
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$stock_shopped=$row["cantidad"];
	$cantidad_total=$stock_shopped+$stock_comprado;
	$total_amount=$Costo_unitario*$cantidad_total;

	$sql = "UPDATE ventas SET cantidad='".$cantidad_total."', costo_total =".$total_amount." WHERE id_producto=".$id_producto." and id_usuario=".$id_usuario;
if ($conn->query($sql) === TRUE){
echo "Su producto esta siendo preparado, cuando este listo se le notificara";
}
else{
echo "error al update producto";
}

}
else{		//no == flujo normal 


$status=1;//pagado
$descripcion='listo para empacar';
$Costo_total=$Costo_unitario*$stock_comprado;

$sql="INSERT INTO ventas (id_producto, id_usuario, cantidad,costo_total,status,descripcion)
VALUES (".$id_producto.",".$id_usuario.",". $stock_comprado.",".$Costo_total.",".$status.",'".$descripcion."')";

if ($conn->query($sql) === TRUE)
{	

/***FLUJO DE PREPARACION DE PRODUCTO***/
	echo "Su producto esta siendo preparado, cuando este listo se le notificara";
}
else{
	echo "Error al cargar la venta";
}


	}
	
	


}
else{
	echo "error al update producto";
}

}

function drop_element($cantidad,$id_producto,$id_usuario){
	include '../utils/connection.php';
$sql = "select * from productos where id_producto = ".$id_producto;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$stock_disponible=$row["cantidad"];

	$sql_update_producto = "UPDATE productos SET cantidad='".($stock_disponible+$cantidad)."' WHERE id_producto=".$id_producto;
if ($conn->query($sql_update_producto) === TRUE) {
	$sql_drop_venta="delete from ventas where id_producto=".$id_producto." and id_usuario=".$id_usuario;
	if ($conn->query($sql_drop_venta) === TRUE) {
echo "Los productos se han eliminado de tu carrito.";

	}
		else{
echo "Ha ocurrido un problema al eliminar el producto.";

		}
}
else{
echo "Ha ocurrido un problema al eliminar el producto.";
}

}

}



}

?>