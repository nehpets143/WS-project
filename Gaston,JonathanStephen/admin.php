<?php 
    session_start();
    if (!isset($_SESSION['login'])) 
    {
        header("location: login.php");
    }
    include 'dbconfig.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Home page</title>
        <!-- ============link============= -->
        <link rel="stylesheet" href="./assets/css/materializecss.min.css">
        <link rel="stylesheet" href="./assets/css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="./assets/css/materializecss-icons.css">
        <!-- =========css=========== -->
        <style>
            #qw
            {
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
                <div class="nav-wrapper  blue accent-4">
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
        <center><h1 class="q1">User's Table</h1>
        <table class="container" class="responsive-table" class="highlight">
            <th class='q1'>No.</th>
            <th class='q1'>user name</th>
            <th class='q1'>password</th>
            <th class='q1'>Option's</th>
    
            <?php $result = mysqli_query($conn,"SELECT id,username,passwd FROM tbl_user") ;
                while ($row = mysqli_fetch_assoc($result)) 
                {
                    echo "<tr><td class='q1'>".$row['id']."</td>"."<td class='q1'>".$row['username']."</td>"."<td class='q1'>".$row['passwd']."</td>"."<td>
                    <button data-id=".$row['id']." data-uname=".$row['username']." data-passwd=".$row['passwd']." name='dit' class='btnUp waves-effect orange waves-light btn modal-trigger' href='#editmodal'><i class='material-icons'>edit</i></button> 
                    <button data-id=".$row['id']." data-uname=".$row['username']." id='' name=del class='btn-del waves-effect red waves-light btn modal-trigger' href='#delmodal'><i class='material-icons'>delete</i></button>";
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
                <h4>Edit user.</h4>
                    <div class="row">
                        <form  method="post">
                            <div class="container ">
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
                <p class="center">Do you want to delete this user </p><center>
                <form action="" method="post">
                    <button type="submit" name="delyes">yes</button> | <button type="submit" name="delno">no</button>
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

        <script src="./assets/js/scrip.js"></script>
        <script src="./assets/js/materialize-css.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
            });


            let btnedit = document.querySelectorAll(".btnUp");
            for(var i =0;i<btnedit.length;i++){
                btnedit[i].addEventListener('click',up);
            }
            function up(e){
                let uname = document.querySelector("#username");
                let pwd = document.querySelector("#passwd");
                uname.value = this.dataset.uname;
                pwd.value = this.dataset.passwd;

                // console.log(this.dataset.uname);
                // console.log(this.dataset.passwd);
            }   
        </script>
    </body>
</html>

<?php 
// if (isset($_GET['it'])) {
//     $id=$_GET['edit']
// }
if (isset($_POST['username'])) {
    $uname=mysqli_real_escape_string($conn,$_POST['uname']);
    $pwd=mysqli_real_escape_string($conn,$_POST['passwd']);
    $query = mysqli_query($conn,"UPDATE `tbl_user` SET username = '$uname', passwd = '$pwd', fname ='$fname', lname ='$lname' WHERE id = '$id' ");
    if (!$query) {
        echo 'Updated faild!!';
    }else {
        echo 'Updated succesfully!!';
    }
}
?>
