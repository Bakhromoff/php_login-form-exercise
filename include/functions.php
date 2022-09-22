<?php
function error() {
  if(isset($_GET['error'])) {
    ?>
    <div class="col-6 offset-3">
    <p class="mt-4 alert alert-danger text-center"><?=$_GET['error'];?></p>
    </div>
    <?php
  }
}
?>