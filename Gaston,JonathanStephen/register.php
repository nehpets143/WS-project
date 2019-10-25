<?php 
session_start();

include 'dbconfig.php';
?>
<?php
    // initializing variables
$lname = "";
$fname = "";
$mname = "";
$username = "";
$email    = "";
$errors = array(); 


// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $lname = mysqli_real_escape_string($conn, $_POST['lname']);
  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  $mname = mysqli_real_escape_string($conn, $_POST['mname']);
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($lname)) { array_push($errors, "Last Name is required"); }
  if (empty($fname)) { array_push($errors, "First Name is required"); }
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM tbl_users WHERE userName='$username' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['userName'] === $username) {
      array_push($errors, "Username already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
      echo count($errors);
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO tbl_users (userID,lName,fName,mName,userName, email, userPassword) 
  			  VALUES('','$lname','$fname','$mname','$username', '$email', '$password')";
  	mysqli_query($conn, $query);
  	$_SESSION['user'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
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
        .q1{
            color: while;
        } #s1{
            color: red;
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
                <a class='dropdown-trigger btn' href='login.php' data-target='dropdown1' id="wq">Logout</a>
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
            <li><a href="login.php">lgout</a></li>
        </ul>
    </header>
    <a href="welcome.php" type='btn' name='edit' class='waves-effect waves-light btn'><i class="material-icons">arrow_back</i></a><br><br>
    <!-- ==========title===========-->
    <div class="container">
            
            <center><h1 id="p2">WELCOME</h1><h3 id="p2">to Registration</h3><center>
    </div>
    <br>
    <!-- ===========Input text=============== -->
    <div class="container">
    <div class="section no-pad-bot">
  <div class="container">
  <div class="container">
  <div class="container" style="background-color:white;">
  <div class="container">
    <div class="section">

      <div class="row">
        <div class="col s12 center">
          
          <div class="row center">
          <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
      <div class="input-group">
  	  <label>Last Name</label>
  	  <input type="text" name="lname" value="<?php echo $lname; ?>">
  	</div>
      <div class="input-group">
  	  <label>First Name</label>
  	  <input type="text" name="fname" value="<?php echo $fname; ?>">
  	</div>
      <div class="input-group">
  	  <label>Middle Name</label>
  	  <input type="text" name="mname" value="<?php echo $mname; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
      <br>
  </form>
                
          </div>
        </div>
        
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
    
   <br>
    <br><br><br><br>
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
                        echo " Connected to ". $conn ;
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
    // M.toast({html: 'I am a toast!'})
    </script>
</body>
</html>

