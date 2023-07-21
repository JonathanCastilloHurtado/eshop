<?php
include 'interfaceController.php';
include '../Model/model.php';

class mController implements Controller {
  	

public function validateShop($id_producto,$stock_comprado,$costo,$id_usuario){
//Si se coloca afuera a nivel global crashea por que no hay un metodo main
include '../utils/connection.php';

$sql = "select * from productos where ID_Producto = ".$id_producto;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$stock_disponible=$row["Cantidad"];
	if($stock_disponible>=$stock_comprado){
		$this->updateProd($id_producto,$stock_comprado,$stock_disponible,$costo,$id_usuario);
//echo "OK";
	}
else{
	echo "El articulo ".$row["Nombre"]." no cuenta con piezas suficientes.";
}
}
else{
	echo "El articulo seleccionado no se encuentra disponible.";
}

}

 function updateProd($id_producto,$stock_comprado,$stock_disponible,$Costo_unitario,$id_usuario){
include '../utils/connection.php';

$stock_disponible=$stock_disponible-$stock_comprado;

if($stock_disponible==0){
$sql = "DELETE FROM productos WHERE ID_Producto=".$id_producto;
}
else{
	$sql = "UPDATE productos SET cantidad='".$stock_disponible."' WHERE ID_Producto=".$id_producto;
}

if ($conn->query($sql) === TRUE) {

$status=1;//pagado
$descripcion='listo para empacar';
$Costo_total=$Costo_unitario*$stock_comprado;

$sql="INSERT INTO ventas (ID_Producto, ID_Usuario, Cantidad,Costo_total,Status,Descripcion)
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
else{
	echo "error al update producto";
}

}

}

?>