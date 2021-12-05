<?php
class users{

	public function add($no_id,$name,$birth_date,$email,$password){
		$c   = new conexion();
		$lin = $c->conectar();
		
		$sql = "INSERT INTO  users(no_id,name,birth_date, email, password)
		                   VALUES ('$no_id','$name','$birth_date','$email','$password')";

		$result = $lin->prepare($sql);
		$result->execute();
	}
	
	
	public function search($no_id){
		$c   = new conexion();
		$lin = $c->conectar();

		$sql = "SELECT * FROM users where no_id='$no_id'";
		$result = $lin->query($sql);	
		$arr=array();
		while ($fila = $result->fetch_assoc()){
			$arr[]=$fila;
		}
		return($arr);		
	}
	
	
	//ok
	public function delete ($no_id){
		$c   = new conexion();
		$lin = $c->conectar();

		$sql ="DELETE FROM users WHERE no_id = '$no_id'";
		$result = $lin->prepare($sql);
		$result->execute();
	}
	
	//ok
	public function update($no_id,$name,$email,$birth_date,$password){
		$c   = new conexion();
		$lin = $c->conectar();
		$password = empty($password) ? "password" :"'$password'";

		$sql = "UPDATE users SET name = '$name',
		                         birth_date ='$birth_date',
		                         email = '$email',
		                         password = $password
		                  WHERE  no_id = '$no_id'";

		$result = $lin->prepare($sql);
		$result->execute();
	}
	//ok
	public function lis(){
		$conexion   = new conexion();
		$con = $conexion->conectar();

		$sql = "SELECT * FROM users";
		$result = $con->query($sql);	
		$arr=array();
		while ($fila = $result->fetch_assoc()){
			$arr[]=$fila;
		}
		return($arr);
	}
}
?>