<?php
  include 'interfaceModel.php';

class Mmodel implements Model {
	var $mController;
	
	function __construct($mController){
    $this->mController=$mController;
	}
	/*TODO 
estas son los tipos de validaciones que se deben hacer aqui en el modelo
if ($conn->query($sql) === TRUE)
{	}
*/
function insertDB($sql){
	
}
function selectDB($sql){
	
}

}
?>