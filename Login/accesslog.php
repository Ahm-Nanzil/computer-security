<?php
/*

*	File:			functions_accessLog.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	a set of functions to record access in table tAccesLog
*
*
*=====================================
*/
include 'C:\xampp\htdocs\Login\Config\Config.php';
    $conn = new mysqli($servername, $username, $password,$dbname); 
    $dbSuccess=FALSE;
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    else $dbSuccess=TRUE;

	function insertLogin($userID) {
		$success = false;
		//	Get current date-time in MySQL format
		$nowTimeStamp = date("Y-m-d H:i:s");
		//	Get user's IP address
		$userIP = $_SERVER['REMOTE_ADDR'];
	
		$insertLogin_SQL = 'INSERT INTO UserLog (
										userID, 
										timeLogin, 
										IPaddress
									) VALUES (
										'.$userID.',
										"'.$nowTimeStamp.'",
										"'.$userIP.'"
									)';
									
			if (mysqli_query($conn,$insertLogin_SQL))  {	
				$success = true;
			} else {
				$success = $insertLogin_SQL."<br />".mysqli_error($insertLogin_SQL);		
			}	
			
		return $success;	
	}


?>