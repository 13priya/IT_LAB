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
a.button {
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;

    text-decoration: none;
    color: initial;
}
tr:nth-child(even) {
    background-color: #pink
}
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

    <a href="searchdata.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-search w3-xxlarge"></i>
    <p>Search</p>
  </a>
    <a href="cus.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-shopping-cart w3-xxlarge"></i>
    <p>Buy</p>
  </a>
     <a href="bill.html" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-file w3-xxlarge"></i>
    <p>Invoice</p>
  </a>
  <a href="Logout.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-sign-out w3-xxlarge"></i>
    <p>Logout</p>
  </a>

</nav>

<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="#" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
    <a href="#" class="w3-bar-item w3-button" style="width:25% !important">Login</a>
    <a href="#contact" class="w3-bar-item w3-button" style="width:25% !important">CONTACT</a>
  </div>
</div>

<!-- Page Content -->
<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
    <h1 class="w3-jumbo"><span class="w3-hide-small"></span> Select medicine</h1>

  </header>
<?php
// Create connection
$conn = new mysqli("localhost", "admin", "haha123", "pharma");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$query="select * from meds" ;
$result=mysqli_query($conn, $query);
?>

<table>
<th>Medicine Name</th>
<th>Price</th>
<tr>


<?php
while
($row=mysqli_fetch_array($result)){?>
<td><?php echo $row['medi'] ?></td>
<td><?php echo $row['price'] ?></td>
</tr><?php }
?>
</table>
<br />
<form method="post" action="">
          Select medicine  <select name="med1">
                <option value="">--- Select ---</option>
                <?php
                    $result=mysqli_query($conn,"SELECT medi FROM meds;");
                    while ($row = mysqli_fetch_array($result)) {
                     echo "<option value='".$row['medi']."'>".$row['medi']."</option>";
                       }
                ?>

            </select>
&nbsp;&nbsp;&nbsp;&nbsp;
          Quantity<input type="number" max="5">


        <a href="bill.php" class="button"> Generate Bill</a>
        <form>
<input type="button" value="Generate Invoice" onclick="window.location.href= 'bill.html' " />
</form>
</body>
</html>
