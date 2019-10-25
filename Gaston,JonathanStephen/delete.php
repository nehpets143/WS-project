<?php
include 'dbconfig.php';
if (isset($_GET['del'])) {
    $id=$_GET['del'];
    $query = mysqli_query($conn,"DELETE FROM tbl_users WHERE userID = '$id'");
    header ("location:database.php");
  }
?>