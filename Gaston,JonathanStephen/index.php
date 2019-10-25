<?php 

session_start(); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home page</title>
<!-- ============link============= -->
    <link rel="stylesheet" href="./asset/css/materializecss.min.css">
    <link rel="stylesheet" href="./asset/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    <link rel="stylesheet" href="./asset/css/materializecss-icons.css">
<!-- ============css============== -->
    <style>
    body{
            background-image: url("./asset/img/000.jpg");
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
        }#wq{
            float: right; 
            margin-top: 10px;
            background-color: transparent;        
            margin-right: 10px;
        }
    </style>
</head>
<body>
<!-- =============start of navbar================ -->
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
                <?php                
                    if (!isset($_SESSION['user'])) {
                        echo "<a class='dropdown-trigger btn' href='login.php' data-target='dropdown1' id='qw'>Login</a>";
                    }else {
                        echo "<a class='dropdown-trigger btn' href='database.php' data-target='dropdown1' id='qw'>User's Data</a>";
                    }
                ?>
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
    <!-- =========end of navbar========= -->
    <main>
    <header style="background-color:powderblue;color: black;border:1px solid tomato;padding:5px;font-family:Courier;font-size:150%;float:left;">
        <b><bdo dir="rtl">W  E  L  C  O  M  E</bdo></b>
        <div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['user'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['user']; ?></strong></p>
    
    <?php endif ?>
</div>
    </header><br><br>
    <p style="text-align:center;font-family:cursive;font-size:200%;color:white;font-style:italic;">
        <q>Everything in your life is a reflection of a choice you have made.<br>
        If you want a different result, make a different choice.</q>
    </p>
            
    </main>
    <footer class="page-footer">            
        <div class="footer-copyright">
            <div class="container">
            All Rights Reserved #Gaston#
            </div>
        </div>
    </footer>
            <script src="./asset/js/materialize-css.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems);
    });
    </script>
</body>
</html>
