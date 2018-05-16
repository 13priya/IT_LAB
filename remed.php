<?php
 session_start();
if ( !isset ($_SESSION['sess_user']))
die( "not logged in");
?>
<!DOCTYPE html>
<html>
<title>PMS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  <a href="bill.html" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-file w3-xxlarge"></i>
    <p>Invoice</p>
  </a>
  <a href="newmed.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
  <i class="fa fa-plus w3-xxlarge"></i>
  <p>Add Medicines</p>
</a>

  <a href="addcus.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
  <i class="fa fa-user-plus w3-xxlarge"></i>
  <p>Add Users</p>
</a>
<a href="removecus.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
<i class="fa fa-search w3-xxlarge"></i>
<p>Remove Vendor</p>
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

  <form action="" method="post">

  <label>Name of the medicine :</label><input  name="medi" required>

  <input type="submit" value="Remove" name="submit">
  </form>

<?php
$servername = "localhost";
$username = "admin";
$password = "haha123";
$dbname = "pharma";
$name = $_POST['medi'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$sql = "DELETE FROM meds WHERE medi='$name'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
 <!--Javascript Alert -->

</body>
</html>
