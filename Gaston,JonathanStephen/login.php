<?php 
include 'dbconfig.php';
session_start();
$errors = array(); 
?>

    <?php
    if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($conn, $_POST['user']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM tbl_users WHERE userName='$username' AND userPassword='$password'";
        $results = mysqli_query($conn, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['user'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: database.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>

    <!-- ==========link========= -->
    <link rel="stylesheet" href="./asset/css/materializecss.min.css">
    <link rel="stylesheet" href="./asset/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="./asset/css/materializecss-icons.css">
    
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
        #s1{
            color: red;
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
                <a class='dropdown-trigger btn' href='login.php' data-target='dropdown1' id="wq">Login</a>
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
            <li><a href="login.php">login</a></li>
        </ul>
    </header>
    <!-- ==========title===========-->
    <div class="container">
            
            <center><h1 id="p2">WELCOME</h1><center>
    </div>
    <br>

    <!-- ===========Input text=============== -->
    <div id="index-banner" class="parallax-container">
        <div class="section no-pad-bot">
 
            <div class="container" style="background-color:white;">
                <div class="container">
                    <div class="section">

                        <div class="row">
                            <div class="col s12 center">
                                <h5 style="color:black;">Login</h5>
                                    <div class="row center">
                                        <form method="post" action="login.php">
  	                                        <?php include('errors.php'); ?>
  	                                        <div class="input-group">
  		                                        <label>Username</label>
  		                                        <input type="text" name="user" >
  	                                        </div>
  	                                        <div class="input-group">
  		                                        <label>Password</label>
  		                                        <input type="password" name="password">
  	                                        </div>
  	                                        <div class="input-group">
  		                                        <button type="submit" class="btn" name="login_user">Login</button>
  	                                        </div>
  	                                        <p>
  		                                        Not yet a member? <a href="register.php">Sign up</a>
  	                                        </p>
                                            </form>
                
                                    </div>
                                </div>
                                <div class="parallax"><img src="img/bg2.jpg" alt="Unsplashed background img 1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <br>
    <br>
    <br>
    
    
    <footer class="page-footer">            
        <div class="footer-copyright">
            <div class="container">
            All Rights Reserved #Gaston#
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
    <script >
        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems);
    });
      
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });
    </script>
</body>
</html>

