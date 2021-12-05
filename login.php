<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
	
</head>
<body>
<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card px-5 py-5" id="form1">
         <form  action="" method="POST">
                <div class="form-data" v-if="!submitted">
				<div class="form-group">
    				<label for="Mail">Usuario</label>
    				<input name="Mail" type="email" class="form-control"  id="Mail"  placeholder="Ingrese su usuario">
     			</div>
				<div class="form-group">
					<label for="Password">Contraseña</label>
					<input name="Password" type="password" class="form-control" id="Password" placeholder="Ingrese su clave">
				</div>
  				<div class="form-group">
                    <div class="mt-3">
	       				<input v-on:click.stop.prevent="submit" class="btn btn-dark w-100" type="submit" name="login">
					</div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>




<?PHP	
if(isset($_POST['login'])){
	
	$con = new mysqli('localhost','root','','quejas_baq');
	
	if ($con->connect_errno) {
			echo "Falló la conexión a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
		}else{
			$mail = $_POST['Mail'];
			$password = $_POST['Password'];

			$sql ="SELECT * FROM users WHERE email = '$mail' and password = '$password'";

			$result = $con->query($sql);

			if($user =  $result->fetch_assoc()){
				session_start();
				$_SESSION['Reg']='ok';
				$_SESSION['user']=$user;
				if (strcmp($mail, "admin@admin.com") == 0  ){
					$_SESSION['rol']='ADMIN';
				}
				header('Location: index.php');
			}else{
				$_SESSION['Reg']='fail';
				echo "Usuario o Contraseña Incorrecto";
			}
		}
	mysqli_close($con);
}
?>