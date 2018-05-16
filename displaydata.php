<?php
 session_start();
if ( !isset ($_SESSION['sess_user']))
die( "Not logged in");
?>
<?php
include 'conn.php';

$Search=$_POST["Search"];
$q="select * from Info left join Pay on Info.SEmail=Pay.REmail where (SName like '%$Search%') or (SMobile like '%$Search%')
	or (SEmail like '%$Search%') or (RMobile like '%$Search%') or (Pay.Type like '%$Search%') or
	(Pay.TranID like '%$Search%')";
$res=mysqli_query($dbc,$q);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>PMS</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="logo">
							<span class="icon fa-book"></span>
						</div>
						<div class="content">
							<div class="inner">
								<?php
								if (!mysqli_num_rows($res)>0)
								{
								echo "No result found";
								}
								else
								{
								?>
								<table>
								  <thead>
								    <tr>

                      <th>SName</th>
                      <th>Gender</th>
                      <th>DOB</th>
                      <th>BG</th>
                      <th>SMobile</th>
                      <th>SEmail</th>
                      <th>PAddress</th>


								    </tr>
								  </thead>
                  <tbody>
										<?php
										while($row=mysqli_fetch_array($res))
										{
											?>
                    <tr>


                      <td><?php echo $row['SName'] ?></td>
                      <td><?php echo $row['Gender'] ?></td>
                      <td><?php echo $row['DOB'] ?></td>
                      <td><?php echo $row['BG'] ?></td>
                      <td><?php echo $row['SMobile'] ?></td>
                      <td><?php echo $row['SEmail'] ?></td>
                      <td><?php echo $row['PAddress'] ?></td>


                    </tr>
										<?php } ?>
                  </tbody>
								</table>
								<?php
								}
								?>
							</div>
						</div>
            <nav>
              <ul>
                <li><a href="searchdata.php">Search</li></a></li>
                <li><a href="logout.php">Log Out</a></li>
              </ul>
            </nav>
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
</body>
</html>
