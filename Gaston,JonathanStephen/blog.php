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
    <title>Blog</title>
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
     <script>
        function commentSubmit(){
            if(form1.name.value == '' && form1.comments.value == ''){ //exit if one of the field is blank
                alert('Enter your message !');
            return;
            }
            var name = form1.name.value;
            var comments = form1.comments.value;
            var xmlhttp = new XMLHttpRequest(); //http request instance
    
            xmlhttp.onreadystatechange = function(){ //display the content of insert.php once successfully loaded
            if(xmlhttp.readyState==4&&xmlhttp.status==200){
                document.getElementById('comComment').innerHTML = xmlhttp.responseText; //the chatlogs from the db will be displayed inside the div section
            }
        }
        xmlhttp.open('GET', 'insert.php?comName='+name+'&comComments='+comments, true); //open and send http request
        xmlhttp.send();
    }

    $(document).ready(function(e) {
        $.ajaxSetup({cache:false});
        setInterval(function() {$('#comment_logs').load('logs.php');}, 2000);
    });
    
</script>
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
                    if (!isset($_SESSION['login'])) {
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
    <h1 style="background-color:black;padding:30px;text-align:center;color:blue;border: 1px solid blue;font-family:cursive;">Quotes about Life</h1>
    <hr>
    <pre style="color:white;font-size:150%;">
                   <q>Reflecting back on your life is not only food for thought, but a wiseman's bridge
                                   looking at how and why, you made your path for today!
                    Will be most important, when you find yourself at the crossroads of tomorrow.
                         Remember the goals you set yourself, travel the path closest to your heart.
                                    Trust your heart, your instincts, your soul.</q></pre>
    <hr>
    <pre style="color:white;font-size:150%;">
                                  <q>Whenever you're making an important decision, first ask
                                    if it gets you closer to your goals or farther away.
                                         If the answer is closer, pull the trigger.
                                       If it's father away, make a different choice.</q></pre>
    <hr>     
    <div style="background-color:#FFF;width:50%;padding:10px;margin:20px;margin-left:auto;margin-right:auto;">
    <div class="page_content">
    	Comment Here....
    </div>	
        <div id="comment_input">
            <form name="form1">
        	    <span style="color:black;"><input type="text" name="name" placeholder="Name..."/></span><br><br>
                <textarea name="comments"  style="color:black;" placeholder="Leave Comments Here..." style="width:610px; height:100px;"></textarea><br><br>
                <a href="#" onClick="commentSubmit()" class="button">Post</a><br>
            </form>
        </div>
        <div id="comment_logs">
    	    Loading comments...
        </div>
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
