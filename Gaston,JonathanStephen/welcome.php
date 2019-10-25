<?php 
session_start();
if (!isset($_SESSION['login'])) {
    header("location:login.php");
}
include 'dbconfig.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>welcome page</title>

    <!-- ==========link========= -->
    <link rel="stylesheet" href="./asset/css/materializecss.min.css">
    <link rel="stylesheet" href="./asset/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="./asset/css/materializecss-icons.css">
    <link rel="stylesheet" href="../css/materializecss.min.css">
    <!-- ==========css========== -->
    <style>
        body{
            background-image: url("./asset/img/111.jpg");
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
        }#p2{
            color: white;
        }#wq{
            float: right; 
            margin-top: 10px;
            background-color: transparent;        
            margin-right: 10px;
        }
        .q1{
            color: white;
        }
    </style>
</head>

<body>
    <!-- ==============navbar================ -->
<header>
        <nav>
        <div class="nav-wrapper blue lighten-2">
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="left hide-on-med-and-down">
                        <li><a href="index.php"><i class="material-icons">home</i></a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        
                      
                </ul>
                <a class='dropdown-trigger btn' href='logout.php' data-target='dropdown1' id="wq">Logout</a>
                <ul id='dropdown1' class='dropdown-content'>
                    <li><a href="#!">one</a></li>
                    <li><a href="#!">two</a></li>
                    <li class="divider" tabindex="-1"></li>
                    <li><a href="#!">three</a></li>
                    <li><a href="#!"><i class="material-icons">view_module</i>four</a></li>
                    <li><a href="#!"><i class="material-icons">cloud</i>five</a></li>
                  </ul>
            </div>
        </nav>
        <ul class="sidenav" id="mobile-demo">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="login.php">logout</a></li>
        </ul>
    </header>
        <center><h1 class="q1">Welcome <?php echo $_SESSION['uname']; ?></h1>
<br><br><br><br><br><br><br>
      <a class="waves-effect waves-light btn" href="register.php">Register</a>  <a href="database.php" class="waves-effect waves-light btn">user's</a>  
      </center>
    <br><br><br>
    <br><br><br><br>
    <br>
    <br>
    
    <footer class="page-footer">            
        <div class="footer-copyright">
            <div class="container">
                All Rights Reserved 2019 © WS101
                <?php
                    if ($conn->connect_error) {
                        die(" Not connected to". $conn->connect_error);
                    }else {
                        echo " Connected to ". $db ;
                    }
                ?>
            </div>
        </div>
    </footer>
        <!-- ===========scripts============== -->
    <script src="./asset/js/materialize-css.min.js"></script>
    <script src="./asset/js/scrip.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems);
    });
    </script>
</body>
</html>
