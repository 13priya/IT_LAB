
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

        <a href="remed.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
        <i class="fa fa-search w3-xxlarge"></i>
        <p>Remove Medicine</p>
      </a>
      <a href="newmed.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
      <i class="fa fa-search w3-xxlarge"></i>
      <p>ADD Medicine</p>
    </a>
        <a href="cus.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
        <i class="fa fa-shopping-cart w3-xxlarge"></i>
        <p>Buy</p>
      </a>
      <a href="removecus.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
      <i class="fa fa-search w3-xxlarge"></i>
      <p>Remove Vendor</p>
    </a>

    <a href="addcus.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-search w3-xxlarge"></i>
    <p>Add Vendor</p>
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
        <a href="index.html" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
        <a href="login.php" class="w3-bar-item w3-button" style="width:25% !important">Login</a>
        <a href="contact.html" class="w3-bar-item w3-button" style="width:25% !important">CONTACT</a>

      </div>
    </div>

    <!-- Page Content -->
    <div class="w3-padding-large" id="main">
      <!-- Header/Home -->






									<form method="POST">
										<p>Note: You can search by Email:) </p>
										Search Bar for user INFO
                    <input type="text" name="email" placeholder="Enter information">
                    <br>
										<center><button type ="submit"  name="submit" value="submit">Search</button></center>
										</form>
                  </div>
                  </div>

</div>
</div>
</header>
<!-- Footer -->
<footer id="footer">
  <p class="fl_left">&copy;@RAGI and NOT important Priyanka</p>
</footer>
</div>
<!-- BG -->
<div id="bg"></div>
<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>
<table border="1" align="center">
          <tr>
              <th>Name</th>
              <th>Gender</th>
              <th>DOB</th>
              <th>Bloodgroup</th>
              <th>Mobile</th>

              <th>Address</th>

          </tr>





<?php
if(isset($_POST["submit"]))
{
  if(!empty($_POST['email']) )
  {

     $email = $_POST['email'];
    //DB Connection
    $conn = new mysqli('localhost', 'admin', 'haha123', 'pharma') or die (mysqli_error()); // DB Connnection
$result =  mysqli_query($conn,"Select name,gender,dob,bloodgroup,mob,perm_add from signup where email='.$email.'");
//Result Message
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    ?>
                      <tr>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['gender']; ?></td>
              <td><?php echo $row['dob']; ?></td>
              <td><?php echo $row['bloodgroup']; ?></td>
              <td><?php echo $row['mob']; ?></td>
            
              <td><?php echo $row['perm_add']; ?></td>
            </tr>
                    <?php
            }
        } else {
            echo "0 results";
}}}

        ?>
</table>
 
</body>
</html>
