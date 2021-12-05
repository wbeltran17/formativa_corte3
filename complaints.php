<?php
class complaints{

	public function add($user_mail,$complaint){
		$c   = new conexion();
		$lin = $c->conectar();
		
		$sql = "INSERT INTO  complaints(user_mail,complaint)
		                   VALUES ('$user_mail','$complaint')";

		$result = $lin->prepare($sql);
		$result->execute();
	}
	
	
	public function search($user_email){
		$c   = new conexion();
		$lin = $c->conectar();

		$sql = "SELECT * FROM complaints where user_mail like '%$user_email%'";
		$result = $lin->query($sql);	
		$arr=array();
		while ($fila = $result->fetch_assoc()){
			$arr[]=$fila;
		}
		return($arr);		
	}
	
	
	//ok
	public function delete ($id){
		$c   = new conexion();
		$lin = $c->conectar();

		$sql ="DELETE FROM complaints WHERE id = '$id'";
		$result = $lin->prepare($sql);
		$result->execute();
	}
	
	//ok
	public function update($id,$user_mail,$complaint){
		$c   = new conexion();
		$lin = $c->conectar();
		$sql = "UPDATE complaints SET user_mail = '$user_mail',
		                         complaint ='$complaint'
		                  WHERE  id = 'id'";
		$result = $lin->prepare($sql);
		$result->execute();
	}
	//ok
	public function lis(){
		$c   = new conexion();
		$lin = $c->conectar();

		$sql = "SELECT * FROM complaints";
		$result = $lin->query($sql);	
		$arr=array();
		while ($fila = $result->fetch_assoc()){
			$arr[]=$fila;
		}
		return($arr);
	}
}
?>