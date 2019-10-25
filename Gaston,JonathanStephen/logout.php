<?php 
include 'dbconfig.php';
session_start();
if (session_destroy()) {
    header("location:login.php");
}
mysqli_close($conn);
?>