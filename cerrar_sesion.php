<?php
  session_start();
   
  // Elimina la variable email en sesión.
  unset($_SESSION['email']);
 
  // Elimina la sesion.
  session_destroy();
   
  header("Location: apli.php");
?>