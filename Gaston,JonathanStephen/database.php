<?php
include 'dbconfig.php';
session_start();
if (!isset($_SESSION['user'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: login.php");
}
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
        <!-- =========css=========== -->
        <style>
            #qw
            {
                float: right; 
                margin-top: 10px;
                background-color: transparent;        
                margin-right: 10px;
            }
            body{
        background-image: url("./asset/img/111.jpg");
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
            }
        </style>
    </head>
    <body>
    
        <!-- =============start of navbar================ -->
        <header>
            <nav>
                <div class="nav-wrapper  blue lighten-2">
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul class="left hide-on-med-and-down">
                        <li><a href="index.php"><i class="material-icons">home</i></a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="shop.php">Shop</a></li>
                    </ul>            
                    <form action="" method="post">
                        <a href='logout.php' type='btn ' name='logout' id='qw' class='waves-effect waves-light btn right'>Logout</a>
                    </form>
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
        <!-- <a href="login.php" type='btn' name='edit' class='waves-effect waves-light btn'><i class="material-icons">arrow_back</i></a> -->
        <center><h1 style="color:white;" class="q1">User's Table</h1>
        
        <table style="color:white;"class="container" class="responsive-table" class="highlight">
            <th class='q1'>No.</th>
            <th class='q1'>user name</th>
            <th class='q1'>password</th>
            <th class='q1'>Option</th>
    
            <?php $result = mysqli_query($conn,"SELECT userID,userName,userPassword FROM tbl_users") ;
                while ($row = mysqli_fetch_assoc($result)) 
                {
                    echo "<tr><td class='q1'>".$row['userID']."</td>"."<td class='q1'>".$row['userName']."</td>"."<td class='q1'>".$row['userPassword']."</td>"."<td>
                    <button data-id=".$row['userID']." data-uname=".$row['userName']." data-passwd=".$row['userPassword']." name='dit' class='btnUp waves-effect orange waves-light btn modal-trigger' href='#editmodal'><i class='material-icons'>edit</i></button> 
                    <button data-id=".$row['userID']." data-uname=".$row['userName']." id='' name=del class='btn-del waves-effect red waves-light btn modal-trigger' href='#delmodal'><i class='material-icons'>delete</i></button>";
                }
            ?>
            <!-- <button href='#delmodal' type='btn' name='delete' class='btn-del waves-effect waves-light btn modal-trigger red'><i class='material-icons'>delete</i></a></button> -->
        </table></center>
        <br><br><br>

        <!-- Modal Trigger -->
        <!-- <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a> -->

        <!-- Modal edit -->
        <div id="editmodal" class="modal ">
            <div class="modal-content center">
                <h4>Edit User Account</h4>
                    <div class="row">
                        <form action="" method="post">
                            <div class="container ">
                                <input type="number" class = "id" id="disabled" name="id" hidden="">
                                <input id="username" type="text" name="uname" class="validate">
                                <input id="passwd" type="text" name="passwd" class="validate">          
                            </div>
                        </div>
                        <button type="submit" name="edit" class="modal-close waves-effect waves-green btn-flat">update</button>
                        <!-- <a href="#"  name="edit" class="modal-close waves-effect waves-green btn-flat">Update</a> -->
                    </div>
                    <div class="modal-footer">
                </form>
            </div>
        </div>

        <div id="delmodal" class="modal">
            <div class="modal-=content">
                <h4 class=center>Delete</h4>
                <p class="center">Do you want to delete this user account?</p><center>
                <form action="" method="post">
                    <button type="submit" name="delyes">Yes</button> | <button type="submit" name="delno">No</button>
                </form>
                </center>    
                <div class="modal-footer">

                </div>
            </div>
        </div>

        <br><br> 
        <footer class="page-footer light-blue accent-3">
            <div class="footer-copyright">
                <div class="container">
                    © 2014 Copyright Text
                </div>
            </div>
        </footer>

        <script src="./asset/js/script.js"></script>
        <script src="./asset/js/materialize-css.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
            });
            
            let btnedit = document.querySelectorAll(".btnUp");
            let btndel = document.querySelectorAll(".btn-del");
            for(var q=0;q<btndel.length;q++){
                btndel[q].addEventListener('click',del);
            }
            // windows.reload();
            for(var i=0;i<btnedit.length;i++){
                btnedit[i].addEventListener('click',up);
            }
            function up(e){
                let id =document.querySelector('.id');
                let uname = document.querySelector("#username");
                let pwd = document.querySelector("#passwd");
                id.value = this.dataset.id
                uname.value = this.dataset.uname;
                pwd.value = this.dataset.passwd;
                console.log(this.dataset.id);
                console.log(this.dataset.uname);
                console.log(this.dataset.passwd);
            }   
            function del(e) {
                let del = document.querySelector("#del");
                del.value= this.dataset.id;
                console.log(this.dataset.id);
            }
            
        </script>
        <?php
if (isset($_POST['edit'])) {
    $id=mysqli_real_escape_String($conn,$_POST['id']);
    $uname=mysqli_real_escape_String($conn,$_POST['uname']);
    $pwd=mysqli_real_escape_String($conn,$_POST['passwd']);
    $pwdd = md5($pwd);
    // $pwdd = md5($pwd);
    $query = mysqli_query($conn,"UPDATE `tbl_users` SET `userName`='$uname',`userPassword`='$pwdd' WHERE userID='$id'");
    if (!$query) {
        echo 'Update not';       
    }else {
        echo 'Updated';
        
    }
}
header("Refresh:0");
?>
    </body>
</html>

<?php 
// if (isset($_GET['it'])) {
//     $id=$_GET['edit']
// }
// if (isset($_POST['edit'])) {
//     $id = mysqli_real_escape_string($conn,$_POST['id']);
//     $uname = mysqli_real_escape_string($conn,$_POST['uname']);
//     $pwd = mysqli_real_escape_string($conn,$_POST['passwd']);
//     $query = mysqli_query($conn,"UPDATE `tbl_users` SET `userName`='$uname',`userPassword`='$pwd' WHERE userID='$id'");
//     if (!$query) {
//         echo 'Updated failed!!';
//     }else {
//         echo 'Updated succesfully!!';
//     }
// }
?>
