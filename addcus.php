<!DOCTYPE html>
<html>
<title>PMS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
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
  <a href="bill.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-file w3-xxlarge"></i>
    <p>Invoice</p>
  </a>

    <a href="remed.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-plus w3-xxlarge"></i>
    <p>Remove Medicines</p>
  </a>
  <a href="addcus.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
  <i class="fa fa-user-plus w3-xxlarge"></i>
  <p>Add Users</p>
</a>
    <a href="removecus.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-user-plus w3-xxlarge"></i>
    <p>Remove Users</p>
  </a>
    <a href="searchdata.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-search w3-xxlarge"></i>
    <p>Search Database</p>
  </a>


  <a href="Logout.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-sign-out w3-xxlarge"></i>
    <p>Logout</p>
  </a>
</nav>


<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="index.html" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
    <a href="login.php" class="w3-bar-item w3-button" style="width:25% !important">Login</a>
    <a href="contact.html" class="w3-bar-item w3-button" style="width:25% !important">CONTACT</a>

  </div>
</div>

<!-- Page Content -->
<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
    <h1 class="w3-jumbo"><span class="w3-hide-small">Pharmacy</span> Management System</h1>
    <form method="post">
  </header>

  <form action=" " method=POST>
                  <center><h2> Customer Details </h2></center>
                  <center><h4>---- All are Mandatory Fields----</h4></center>

                 Name<input type="text" name="SName" required placeholder="FirstName MiddleName LastName">
                 <br>
                 Gender<input type="text" name="Gender" required placeholder="M / F / Other">
                 <br>
                 Date of Birth<input type="text" name="DOB" required placeholder="YYYY-MM-DD">
                 <br>
                 Blood Group<input type="text" name="BG" required placeholder="Blood Group (+ve / -ve)">
                 <br>
                 Mobile Number<input type="text" name="SMobile" required placeholder="XXXXXXXXXXX"  min="10" max="10">
                 <br>
                 Email<input type="text" name="SEmail" required placeholder="abc@gmail.com">
                 <br>
                              Password<input type="password" name="SPassword" required placeholder="Password">
                 <br>
                 Permanent Address<textarea rows="5" cols="50" name="PAddress" required placeholder="Enter Address here."></textarea>
                 <br>

                <p> <b> NOTE: </b>The registered mobile number will be the number used for communication. The applicant are expected to be available in this number all the time. In case of any change in number, it should be updated in person. </p>

                <center><button type ="submit">Signup</button></center>


            </form>


  <?php
  if
  (
  !empty($_POST['SName'])
  && !empty($_POST['Gender'])
  && !empty($_POST['DOB'])
  && !empty($_POST['BG'])
  && !empty($_POST['SMobile'])
  && !empty($_POST['SEmail'])
  && !empty($_POST['SPassword'])
  && !empty($_POST['PAddress'])

)
{
    $SName = $_POST['SName'];
    $Gender = $_POST['Gender'];
    $DOB = $_POST['DOB'];
    $BG = $_POST['BG'];
    $SMobile = $_POST['SMobile'];
    $SEmail = $_POST['SEmail'];
    $SPassword = $_POST['SPassword'];
    $PAddress = $_POST['PAddress'];

include 'conn.php';
   $conn =mysqli_connect('localhost', 'admin', 'haha123','pharma') or die (mysqli_error()); // DB Connection
   //$db = mysqli_select_db($conn, 'pharma') or die("DB Error"); // Select DB from database
   //Selecting Database
   $result = mysqli_query($dbc,"INSERT INTO signup (name,gender,dob,bloodgroup,mob,email,password,perm_add)
    VALUES('$SName','$Gender','$DOB','$BG','$SMobile','$SEmail','$SPassword','$PAddress')") or die("Could not query database");

    if($result)
      {
      echo "<h3>Your info is stored</h3>";
      }
   else
    {
      echo "Failure!";
    }
   }
   else
   {
   echo "<h3> Enter all fields </h3>";
   }
   ?>

</body>
</html>
