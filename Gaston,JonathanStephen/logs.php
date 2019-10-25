<?php

require("dbconfig.php");
$result = mysqli_query($conn, "SELECT * FROM tbl_blog ORDER BY ID ASC");
while($row=mysqli_fetch_array($result)){
echo "<div class='comments_content'>";
echo "<h6><a href='delete1.php?id=" . $row['ID'] . "'>x</a></h6>";
echo "<h5>" . $row['name'] . "</h5>";
echo "<h6>" . $row['date_publish'] . "</h6></br></br>";
echo "<h6>" . $row['comments'] . "</h6>";
echo "</div>";
}
mysqli_close($conn);

?>