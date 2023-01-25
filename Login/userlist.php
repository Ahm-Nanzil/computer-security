<?php

// require '../database.php';
// for database connection
{
    include 'C:\xampp\htdocs\Login\Config\Config.php';
    $conn = new mysqli($servername, $username, $password,$dbname); 
    $dbSuccess=FALSE;
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    else $dbSuccess=TRUE;

    }
    if($dbSuccess){

      echo '<a href="homepage.php">
        <span class="mainMenuItem">Homepage</span>
        </a> &nbsp &nbsp &nbsp &nbsp';

        echo '<a href="homepage.php?status=logout">
        <span class="mainMenuItem">Log out</span>
        </a> &nbsp &nbsp &nbsp &nbsp';

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V4</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
            <?php 
  // NavBar
    // include 'admin_navbar.php';
    
    $sql= "SELECT * FROM members where role='2'";
    $result= mysqli_query($conn, $sql);
?>

<br>
     <div class="container">
    <h4 style="text-align: center">User List</h4>
    <br>
    <table class="w3-table-all w3-card-4 w3-centered">
      <tr class="w3-green">
        <th>Name</th>
        <th>ID</th>
         <th>Email</th>
        <th>Status</th>
      </tr>
      <?php while ($row = mysqli_fetch_assoc($result))
    //    $st= $row['status'];
    //    echo $st;
      { ?>
       <tr  class=" w3-light-blue w3-hover-blue-gray">
        <td> <?php echo $row['username'] ?></td>
        <td> <?php echo $row['ID'] ?></td>
        <td> <?php echo $row['email'] ?></td>
       

        <?php if($row['status']=='active'){?>
        <td>
          <a class="btn btn-warning" href="userban.php?userid=<?php echo $row['ID']; ?>&active=active">Active</a>
        </td>
        <?php } elseif($row['status']=='deactivate'){?>
          <td>
          <a class="btn btn-warning" href="userban.php?userid=<?php echo $row['ID']; ?>&deactivate=deactivate">Deactive</a>
        </td>
      </tr>
      <?php 
        }
      }
      ?>
    </table>
  </div>

<?php

if(isset($_GET['success_msg'])){
    echo $_GET['success_msg'];
}
elseif(isset($_GET['fail_msg'])){
    echo $_GET['fail_msg'];
}
elseif(isset($_GET['cancel_msg'])){
    echo $_GET['cancel_msg'];
}
elseif(isset($_GET['package_buy'])){
  echo $_GET['package_buy'];
}
elseif(isset($_GET['status_msg'])){
  echo $_GET['status_msg'];
}
?>

			</div>
		</div>
	</div>
   
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>