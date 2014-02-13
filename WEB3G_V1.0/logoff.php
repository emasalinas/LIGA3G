<?
session_start();
session_destroy();
//unset($_SESSION[exito]);
header("location:index.php");

?>