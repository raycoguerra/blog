<?php
include 'header.php';

if(isset($_GET['error_login']) && $_GET['error_login'] == 1){
  echo '<div class="alert alert-danger">
    <strong>Error!</strong> No existe el usuario o la contraseña
  </div>';
}
?>

<form action="./validaUser.php" method="POST"class="d-flex flex-column align-items-center">
  <div class="form-group">
    <label for="user">User:</label>
    <input type="text" class="form-control" name = "user"placeholder="Enter user" id="user">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="pass" placeholder="Enter password" id="pwd">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
<?php
include 'footer.php';
?>