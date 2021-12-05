<?php
if(!isset($_SESSION['Reg'])||$_SESSION['Reg']!='ok')header('Location: login.php');
?>
<?php
  require_once("conexion.php");
  require_once("users.php");  

  $usu = new users(); 
  
  if(isset($_POST['create'])) {
    $pass =  $_POST['pass'];
    $confirm_pass = $_POST['confirm_pass'];
    if (strcmp($pass, $confirm_pass) !== 0){
echo('<script>alert("La clave ingresada no es igual a la confirmacion")</script>');
    }else{
      $usu->update($_POST['no_id'], $_POST['name'], $_POST['mail'], $_POST['birth_date'], $pass);
    }
  }

  if(isset($_POST['update'])) {
      $usu->update($_POST['no_id'], $_POST['name'], $_POST['mail'], $_POST['birth_date'], $_POST['pass']);
  }

  if(isset($_POST['delete'])){
    $no_id = $_POST['no_id']; 
    $usu->delete($no_id);
   }  

   if(isset($_POST['search']) && $_POST["no_id"]!=""){
      $arr=$usu->search($_POST["no_id"]);  
  }  else{
    $arr=$usu->lis();
  }
   
 ?>
 
<div class="container mt-3">
  <div class="row col-12">
    
  <div class="col-sm-6">
    </div>
    <div class="col-sm-2">
      <form method="post" action="">
        <label>
          Identificacion :
        </label> 
    </div>
    <div class="col-sm-2">
      <input type="Text" class="form-control" name="no_id">
    </div>
    <div class="col-sm-1">
      <input type="Submit" name="search" class="btn sm-btn btn-success" value="Buscar">
      </form>
    </div>
  </div>
  <br>
  <div class="row col-sm-12">
    <div class="col-sm-2"> <label>Identificacion:</label></div>
    <div class="col-lg-2"> <label>Nombre:</label></div>
    <div class="col-sm-2"> <label>Correo:</label></div>
    <div class="col-sm-2"> <label>Nacimiento:</label></div>
    <div class="col-sm-2"> <label>Clave:</label></div>
    <div class="col-sm-2"> <label>Confirmar Clave:</label></div>
   </form>
  </div>
  <form method="post" action="">
  <div class="row col-sm-12">
    <div class="col-sm-2"> <input type="text" class="form-control" name="no_id"></div>
    <div class="col-sm-2"> <input type="text" class="form-control" name="name"></div>
    <div class="col-sm-2"> <input type="text" class="form-control" name="mail"></div>
    <div class="col-sm-2"> <input type="text" class="form-control" name="birth_date"></div>
    <div class="col-sm-2"> <input type="text" class="form-control" name="pass"></div>
    <div class="col-sm-2"> <input type="text" class="form-control" name="confirm_pass"></div>
    <div class="col-sm-2"> <input type="Submit" class="btn sm-btn btn-warning m-1" name="create" value="Agregar Usuario"></div>  
   </form>
  </div>

  <div class="row col-sm-12">
  <table class="table  table-sm table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Identificacion</th>
      <th scope="col">Nombre</th>
      <th scope="col">Correo</th>
      <th scope="col">Nacimiento</th>
      <th scope="col">Clave</th>
      <th colspan="2" scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
<?php 
   for($i=0;$i<count($arr);$i++){
   $id  = $arr[$i]['id'];
   $no_id  = $arr[$i]['no_id'];
   $nom  = $arr[$i]['name'];
   $mail = $arr[$i]['email'];
   $birth_date = $arr[$i]['birth_date'];
   $pass = $arr[$i]['password'];
   ?>              
   <form method="post" action="">
   <tr>
   <td  scope="row" >
   <?php echo $id?></td>
   <td  >
   <input type="hidden" name="no_id" value="<?php echo $no_id?>"> 
   <?php echo $no_id?></td>
   <td><input type="text" name="name" value="<?php echo $nom?>"></td>         
   <td><input type="text" name="mail" value="<?php echo $mail?>"></td>   
   <td><input type="text" name="birth_date" value="<?php echo $birth_date?>"></td>   
   <td><input type="text" name="pass" value="<?php echo $pass?>"></td>   
   <td><input type="Submit" class="btn sm-btn btn-info" name="update" value="Modificar"></td>
   <td colspan="2"><input type="Submit" class="btn sm-btn btn-danger" name="delete" value="Eliminar"></td>
   </tr>
   </form>                           
<?php 
} 
?>  

</tbody>

  </div>

</div>
