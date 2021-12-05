<?php
if(!isset($_SESSION['Reg'])||$_SESSION['Reg']!='ok')header('Location: login.php');
?>
<?php
  require_once("conexion.php");
  require_once("complaints.php");  

  $complaints = new complaints(); 
  
  if(isset($_POST['create'])) {
      $complaints->add($_SESSION['user']['email'], $_POST['complaints']);
  }
  
  if(isset($_POST['search']) && $_POST["user_mail"]!=""){
    $arr=$complaints->search($_POST["user_mail"]);  
}  else{
  $arr=$complaints->lis();
}

   $view = isset($_SESSION['rol']) ? false:true;

 ?>
 
 <?php if($view) { ?>
<div class="container mt-3">
  <div class="row">
    <h2>Formulario de quejas</h2>
  </div>
  <div class="row col-12">
    <form method="POST">
        <div class="form-group">
        <label for="complaints">Ingrese su queja</label>
        <textarea class="form-control" id="complaints" name="complaints" rows="3"></textarea>
        <small id="complaints" class="form-text text-muted">Describa la situacion de la queja de manera clara y presisa.</small>
      </div>
      <div class="form-group">
      <button type="submit" name="create" class="btn btn-primary">Enviar Queja</button>
      </div>
      </form>
  </div>
</div>
<?php   }  ?>

<?php if(!$view) { ?>
<div class="container mt-3">
  
<div class="row col-12">
    <div class="col-sm-6"></div>
    <div class="col-sm-2">
      <form method="post" action="">
      <label>Correo de usuario : </label> 
    </div>
    <div class="col-sm-2">
      <input type="Text" class="form-control" name="user_mail">
    </div>
    <div class="col-sm-1">
      <input type="Submit" name="search" class="btn sm-btn btn-success" value="Buscar">
      </form>
    </div>
  </div>
  <br>
<div class="row col-sm-12">
  <table class="table  table-sm table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Correo usuario</th>
      <th scope="col">Nacimiento queja</th>
      <th colspan="2" scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
<?php 
   for($i=0;$i<count($arr);$i++){
   $id  = $arr[$i]['id'];
   $user_mail  = $arr[$i]['user_mail'];
   $complaint  = $arr[$i]['complaint'];
   ?>              
   <form method="post" action="">
   <tr>
   <td  scope="row" >
   <?php echo $id?>
   <input type="hidden" name="id" value="<?php echo $id?>">   
  </td>
   <td><input type="text" name="user_mail" value="<?php echo $user_mail?>"></td>   
   <td><input type="text" name="complaint" value="<?php echo $complaint?>"></td>   
   <td colspan="2">
     <input type="Submit" class="btn sm-btn btn-info" name="update" value="Modificar">
   <input type="Submit" class="btn sm-btn btn-danger" name="delete" value="Eliminar">
  </td>
   </tr>
   </form>                           
<?php 
} 
?>  

</tbody>

  </div>

</div>

<?php   }  ?>
