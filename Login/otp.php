<?php
// FOR IGNORE NOTICE ERROR
error_reporting (E_ALL ^ E_NOTICE);

?>
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
    if($dbSuccess){

        
        if(isset($_POST['otp1']) && $_POST['otp2'] && $_POST['otp3'] && $_POST['otp4']){
        $otp1=$_POST['otp1'];
        $otp2=$_POST['otp2'];
        $otp3=$_POST['otp3'];
        $otp4=$_POST['otp4'];

        $otp=$otp1.$otp2.$otp3.$otp4;
        
    }

        

        $userLoginID=$_COOKIE['loginID'];

        $userLoginIDSql = "SELECT * FROM userlog ";
            $userLoginIDSql .= "WHERE ID= '$userLoginID'";

            $userLoginIDSqlQueryApply = mysqli_query($conn,$userLoginIDSql); 	
            while ($row = mysqli_fetch_array($userLoginIDSqlQueryApply, MYSQLI_ASSOC)) {
                $userOTPinDB = $row['otp'];
                               
            }

            if($otp==$userOTPinDB){
                header("Location: homepage.php");
            }
            else{
                $warning="OTP didn,t match..";
            }
            
           

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
            <div class="d-flex justify-content-center align-items-center container">
        <div class="card py-5 px-3">
            <h5 class="m-0">E-mail verification</h5><span class="mobile-text">Enter the code we just send on your Email account<b class="text-danger">@</b></span>
            <span class="font-weight text-danger cursor">For using local server mailing function occur error, please fill the section with this otp--->            
            <h5 class="m-0 font-weight-bold text-black"><?php
                echo $userOTPinDB;
                ?></h5>
                </span>
                <div class="text-center mt-2">
                <span class="font-weight text-danger cursor"><?php
                if(isset($warning) && isset($_POST['verify'])){
                    echo $warning;
                }
                ?></span><br> 
                    </div>
                <form class="form" action="otp.php" method="post" >
            <div class="d-flex flex-row mt-5">
            
            <input type="text" name="otp1" pattern="[0-9]" class="form-control" autofocus="" id='ist' maxlength="1" onkeyup="clickEvent(this,'sec')">
            <input type="text" name="otp2" pattern="[0-9]" class="form-control" id="sec" maxlength="1" onkeyup="clickEvent(this,'third')">
            <input type="text" name="otp3" pattern="[0-9]" class="form-control" id="third" maxlength="1" onkeyup="clickEvent(this,'fourth')">
            <input type="text" name="otp4" pattern="[0-9]" class="form-control" id="fourth" maxlength="1"></div>

            <div class="text-center mt-2">
            <input type="submit" value="Verify" name="verify" style="margin-bottom: 10px" class="font-weight-bold text-green"/>
            <span class="d-block mobile-text">Don't receive the code?</span><span class="font-weight-bold text-danger cursor">Resend</span></div>

        </div>
        
        </form>

       
    </div>
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
    <script src="js/otp.js"></script>

</body>
</html>

