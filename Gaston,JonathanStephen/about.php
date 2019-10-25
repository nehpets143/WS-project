<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About</title>
    <link rel="stylesheet" href="./asset/icon/flUhRq6tzZclQEJ-Vdg-IuiaDsNc.woff2">
    <link rel="stylesheet" href="./asset/css/materializecss-icons.css">
    <link rel="stylesheet" href="./asset/css/materializecss.min.css">
    <link rel="stylesheet" href="./asset/css/style.css">
    
    
    <style>
    body{
        background-image: url("./asset/img/222.jpeg");
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
  
    }#sadam{
        float: right; 
        margin-top: 10px;
        background-color: transparent;        
        margin-right: 10px;
    }
    </style>
</head>
<body>
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
    <main>
    <p style="text-align:center;color:white;font-family:Courier;font-size:200%;"><b>
        JONATHAN STEPHEN B. GASTON</b></p><hr/>
    <img src="asset\img\444.jpg" width="490" height="442" style="float:right;border-radius: 50%;margin-right:40px">
    <p style="text-align:center;color:white;font-family:'Verdana';font-size:100%;font-style:italic;">
        Rizal-Cuerdo Streets, Barangay 10,<br>
        Gingoog City, Misamis Oriental 9014<br>
        Contact No.: (+63) 967 579 7087<br>
        E-mail Ad: tphentot@gmail.com<br>
    </p>
    <div style="font-family:'Courier';background-color:thistle;color:black;font-size:115%;float:left;margin-left: 50px;">
    Sex: Male<br>
    Age: 23 years old<br>
    Date of Birth: January 01, 1996<br>
    Place of Birth: Valenzuela City, Metro Manila<br>
    Nationality: Filipino<br>
    Civil Status: Single<br>
    Religion: Roman Catholic<br>
    Language: Cebuano, Tagalog, English<br>
    Father's Name: John Paul P. Gaston<br>
    Occupation: Agriculturist<br>
    Mother's Name: Genara L. Batajoy<br>
    Occupation: Barangay Treasurer<br>
    Hobbies & Interest: Computer Games, Movies, Nature, Music, Food
    </div>
    </main>

    <footer class="page-footer">            
        <div class="footer-copyright">
            <div class="container">
              All Rights Reserved #Gaston#    
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
