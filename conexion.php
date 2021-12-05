<?php
class conexion{

	public function conectar(){
		 $conn = mysqli_connect('localhost','quejas_baq','quejas_baq','quejas_baq');		
		 return $conn;			
	}
}
?>