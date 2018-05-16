
<!DOCTYPE html>
<html>
<title>PMS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <link rel="stylesheet" href="css/style.css">

<style>
body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
.w3-row-padding img {margin-bottom: 12px}
/* Set the width of the sidebar to 120px */
.w3-sidebar {width: 120px;background: #222;}
/* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
#main {margin-left: 120px}
/* Remove margins from "page content" on small screens */
@media only screen and (max-width: 600px) {#main {margin-left: 0}}
</style>
<body class="w3-black">

<!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
  <!-- Avatar image in top left corner -->
  <img src="1.jpg" style="width:100%">
  <a href="index.html" class="w3-bar-item w3-button w3-padding-large ">
    <i class="fa fa-home w3-xxlarge"></i>
    <p>HOME</p>
  </a>

     <a href="signup.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-user w3-xxlarge"></i>
    <p>Sign Up</p>
  </a>
  <a href="contact.html" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-envelope w3-xxlarge"></i>
    <p>CONTACT</p>
  </a>
</nav>



<!-- Page Content -->
<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
    <form  method= "POST">
    								<center><h2> Login </h2></center>



    							 Email<input type="text" name="SEmail" required placeholder="abc@gmail.com">
    							 <br>
                                Password<input type="password" name="SPassword" required placeholder="Password">
    							 <br>


    							<center><button type ="submit" name="submit">Login</button></center>


              </form>






      <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script  src="js/index.js"></script>
  </header>

    </div>

</body>
</html>


<?php
session_start();

include 'conn.php';
if(isset($_POST["submit"])){
 if(!empty($_POST["SEmail"]) && !empty($_POST['SPassword'])){

$user = $_POST['SEmail'];
 $pass = $_POST['SPassword'];

 $query = mysqli_query($dbc, "select * from signup WHERE email='".$user."' AND password='".$pass."'");
 $n = mysqli_num_rows($query);
 if($n!=0)
 {
 while($row = mysqli_fetch_assoc($query))
 {
 $dbusername=$row['email'];
 $dbpassword=$row['password'];
 }
 if($user == $dbusername && $pass == $dbpassword)
 {
 session_start();
 $_SESSION['sess_user']=$user;
 //Redirect Browser
 header("Location:customer.php");
 }

 else
 {
 echo "Invalid Username or Password!";
 }
 }
 else
 {
 echo "Required All fields!";
 }
}

$admin="admin";
if($user == $admin && $pass == $admin)
{
session_start();
$_SESSION['sess_user']=$user;
//Redirect Browser
header("Location:firstlog.html");
}}
?>
