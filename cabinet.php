<?php
include "include/header.php";
if(!isset($_SESSION['user'])) {
  header('location:login.php?error=User is not valid');
} else {}
?>
<div class="container p-4">
  <p class="display-1 text-center">
    Cabinet
  </p>
</div>
<?php
include "include/footer.php";
?>