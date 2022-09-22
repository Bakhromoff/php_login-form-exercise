<?php
include "include/header.php";
if(isset($_SESSION['user'])) {
  header('location:cabinet.php?error=Already registred');
}
?>
<div class="container">
<div class="row">
  <h1 class="text-center">Login form</h1>
  <div class="col-6 offset-3">
  <form action="check.php" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <input type="submit" name="submit" class="btn btn-primary" value="Login">
</form>
<a class="btn btn-success mt-4" href="registration.php">Register</a>
  </div>
</div>
<?php
error();
?>
</div>
<?php

include "include/footer.php";
?>