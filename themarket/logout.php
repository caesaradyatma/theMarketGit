<?php
  include 'connectdb/connect.php';

  //Removes user from Session
  unset($_SESSION['email']);

  //Removes current Session;
  session_destroy();

  //Redirects to home page
  header('Location:login.html');
  //echo "<script type='text/javascript'> window.location.replace(\"index.php\");</script>";

 ?>



