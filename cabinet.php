<?php
include "include/header.php";
if(!isset($_SESSION['user'])) {
  header('location:index.php');
} else {

}
?>
<div class="container p-4">
  <p class="display-1 text-center">
    Cabinet
  </p>
  <h1 class="mt-4 text-center alert alert-info">
    Salom <?=$_SESSION['fname'];?>
  </h1>
  <div class="row">
    <div class="col-2 offset-8">
      <a class="btn btn-outline-danger" href="cabinet.php?s=log">Log out</a>
    </div>
  </div>
</div>
<?php
error();
if(isset($_GET['s'])){
  session_destroy();
  header('location:index.php');
}
include "include/footer.php";
?>
