<?php
session_start();
include "include/configuration.php";
if(isset($_POST['submit'])) {
  if($_POST['submit'] == "Login"){
    if(isset($_POST['login']) && isset($_POST['password'])){
          if($_POST['login'] != "" && $_POST['password'] != "") {
            $login = $_POST["login"];
            $password = md5(md5($_POST['password'])."012");
            $sql = "select * from users where login = '$login' and password = '$password'";
            $r = mysqli_query($con, $sql);
            $user = mysqli_fetch_assoc($r);
            if($user)
            {
              $_SESSION['user'] = $user['login'];
              $_SESSION['fname'] = $user["fullname"];
              header('location:cabinet.php');
            }
            else
            {
              header('location:index.php?error=Pssword or Login is incorrect');
            }
          } else {
            header('location:index.php?error=Enter login and password');
          }
        } else {
          header('location:index.php?error=Enter login and password');
        }
  } elseif ($_POST['submit'] == "Register") {
    if(
      isset($_POST['login'])&&
      isset($_POST['password'])&&
      isset($_POST['conf-password'])
      ) {
        if(
          ($_POST['login'] != "") &&
          ($_POST['password'] != "") &&
          ($_POST['conf-password'] != "")
        ) {
        if($_POST['password'] === $_POST['conf-password']) {
        if (strlen($_POST['password']) > 6) {
        $fullname = "unknown";
        $gender = "0";
        if(isset($_POST['fullname'])) {
          $fullname = addslashes($_POST['fullname']);
        }
        if(isset($_POST['gender'])) {
          $gender = 1;
        }
        $login = $_POST['login'];
        $password = md5(md5($_POST['password'])."012");
        $sql = "select * from users where login = '$login'";
        $r = mysqli_query($con, $sql);
        if(mysqli_num_rows($r)>0){
          header('location:registration.php?error=This login is already exist');
        } else {
        $sql = "insert into users  values (NULL, '$fullname', '$login', '$password', '$gender')";
        $r = mysqli_query($con, $sql);
        if($r) {
          $_SESSION['user'] = $login;
          $_SESSION['fname'] = $fullname;
          header('location:cabinet.php');
        }
        }

        } else {
          header('location:registration.php?error=The length of password must be more than 6 symbols');
        }
        } else {
          header('location:registration.php?error=Password and confirm password is not match');
        }
        } else {
          header('location:registration.php?error=Fill in the form');
        }
    } else {
      header('location:registration.php?error=Fill in the form');

    }
  } else {
    header('location:index.php');
  }
} else {
  header('location:index.php');
}
?>