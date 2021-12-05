<?php
session_start();
if(!isset($_SESSION['Reg'])){
	
	header('Location: login.php');

}else{

	if($_SESSION['Reg']!='ok'){
		header('Location: login.php');
	}else{
		include("navbar.php");

		if(isset($_GET['b'])){
			session_destroy();
			header('Location: login.php');
		}
		if(!isset($_SESSION['rol'])||$_SESSION['rol']!='ADMIN'){
			include("crudComplaints.php");
		} else{
			if (isset($_GET['complaints'])){
				include("crudComplaints.php");
			}else{
				include("crudUsers.php");
			}
		}
	}
}

?>
