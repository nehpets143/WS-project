<?php 
session_start();
?>
<?php 
include 'dbconfig.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop</title>
    <!-- ============link============= -->
    <link rel="stylesheet" href="./asset/css/materializecss.min.css">
    <link rel="stylesheet" href="./asset/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="./asset/icon/flUhRq6tzZclQEJ-Vdg-IuiaDsNc.woff2">
    <link rel="stylesheet" href="./asset/css/materializecss-icons.css">
    <!-- ============css============== -->
    <style>
    body{
        background-image: url("./asset/img/111.jpg");
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
        
    }#p3{
        color: white;

    }#s3{
        color: white;
        text-align: center;
    }#wq{
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

    <header style="background-color:powderblue;color: black;border:1px solid tomato;padding:5px;font-family:Courier;font-size:150%;float:center;"><b>Gina's Clothing Shop</b></header>
    <?php
    $query = mysqli_query($conn,"SELECT * FROM tbl_shop");
    $num = mysqli_num_rows($query);

    for($x=0;$x<$num;$x++){
        echo '<hr>';
        $row = mysqli_fetch_assoc($query)
    
    
    ?>
    
        <table class="container" class="responsive-table" class="highlight" style="width:auto;border-spacing: 15px;">
            <tr>
                <td style="border: 2px solid black;border-collapse: collapse;background-color: pink;"><span><img src="<?php echo $row['prodImg'];?>" alt="Buy Me" style="height: 200px;width: 200px;"></span></td><td style="border: 2px solid black;border-collapse: collapse;background-color: pink;">Product Name: <span><?php echo $row['prodName'];?></span><br><div>Description: <span><?php echo $row['prodDesc'];?></span><br></div><div>Price: Php <span><?php echo $row['prodPrice'];?></span></div><div><button>Add To Cart</button></div></td>        
            </tr>
        </table>
    
        <?php
        
    }
    ?>
    
    
    
    
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
