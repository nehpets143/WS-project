<?php
	
$name = $_REQUEST['comName'];
$comments = $_REQUEST['comComments'];


require("dbconfig.php");

mysqli_query($conn, "INSERT INTO tbl_blog(comName, comComment) VALUES('$name','$comments')");

$result = mysqli_query($conn, "SELECT * FROM tbl_blog ORDER BY ID ASC");
while($row=mysqli_fetch_array($result)){
echo "<div class='comments_content'>";
echo "<h6><a href='delete1.php?id=" . $row['ID'] . "'>x</a></h6>";
echo "<h5>" . $row['comName'] . "</h5>";
echo "<h6>" . $row['comDate'] . "</h6></br></br>";
echo "<h6>" . $row['comComment'] . "</h6>";
echo "</div>";
}
mysqli_close($conn);
?>