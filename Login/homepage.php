<?php
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

$loginAuthorised = ($_COOKIE["loginAuthorised"] == "loginAuthorised");

if ($loginAuthorised)
{

   $accessLevel = $_COOKIE["accessLevel"];
   $userID = $_COOKIE["userID"];
   $userLoginID=$_COOKIE['loginID'];

   

   if (isset($_GET['status']) AND ($_GET['status'] == "logout")) {

	   #for logout time insert in db_------------------------------------------------------------------------------------
	   $tday = new DateTime("now", new DateTimeZone('ASIA/DHAKA'));
	   $nowTimeStamp=$tday->format('Y-m-d H:i:s');  
	   
	   $success=FALSE;
	   $insertLogout_SQL="UPDATE UserLog set timeLogout='$nowTimeStamp' where ID='$userLoginID' ";
		
	if (mysqli_query($conn,$insertLogout_SQL))  {	
                         $success = true;
                     } else {
                         $success = $insertLogout_SQL."<br />".mysqli_error($insertLogout_SQL);		
                     }


	   setcookie("loginAuthorised", "", time()-3600,"/");
	   setcookie("userID", "", time()-3600,"/");
	   setcookie("loginID", "", time()-3600,"/");


	if($success)	{
	   header("Location: index.php");
	}
	   //$loginAuthorised= FALSE;
   }
   else{

			if($accessLevel==1){

    echo '<a href="index.php?content=profile">
			<span class="mainMenuItem">Profile</span>
			</a> &nbsp &nbsp &nbsp &nbsp';

    echo '<a href="index.php?content=address">
			<span class="mainMenuItem">Address</span>
			</a>&nbsp &nbsp &nbsp &nbsp';

    echo '<a href="index.php?content=instution">
			<span class="mainMenuItem">Instution</span>
			</a>&nbsp &nbsp &nbsp &nbsp';

    echo '<a href="index.php?content=userlist">
			<span class="mainMenuItem">User list/Ban</span>
			</a>&nbsp &nbsp &nbsp &nbsp';

    echo '<a href="index.php?content=delete">
			<span class="mainMenuItem">Delete User</span>
			</a>&nbsp &nbsp &nbsp &nbsp';

    echo '<a href="index.php?content=add">
			<span class="mainMenuItem">Add User</span>
			</a>&nbsp &nbsp &nbsp &nbsp';

    
}

else if($accessLevel==2){

    echo '<a href="index.php?content=profile">
			<span class="mainMenuItem">Profile</span>
			</a> &nbsp &nbsp &nbsp &nbsp';

    echo '<a href="index.php?content=address">
			<span class="mainMenuItem">Address</span>
			</a>&nbsp &nbsp &nbsp &nbsp';

    echo '<a href="index.php?content=instution">
			<span class="mainMenuItem">Instution</span>
			</a>&nbsp &nbsp &nbsp &nbsp';

    echo '<a href="index.php?content=adminlist">
			<span class="mainMenuItem">Admin list</span>
			</a>&nbsp &nbsp &nbsp &nbsp';

    echo '<a href="index.php?content=help">
			<span class="mainMenuItem">Help</span>
			</a>&nbsp &nbsp &nbsp &nbsp';
  
}
echo '<a href="homepage.php?status=logout">
			<span class="mainMenuItem">Log out</span>
			</a> &nbsp &nbsp &nbsp &nbsp';
}
}
else{
		header("Location: index.php");
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
				<h5 text='center'>homepage  for all
                    
                </h5>
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