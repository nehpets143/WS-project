<?php
require("dbconfig.php");

if(isset($_GET['id'])){
	$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM comments WHERE id='$id'");
header("location: blog.php");
}
mysqli_close($conn);
?>