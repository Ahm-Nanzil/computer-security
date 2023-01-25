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
			
		$count=$_GET['count'];
		$UserNameFromLogin =mysqli_real_escape_string($conn,$_POST['usernameFromLogin']);
		$PasswordFromLogin =mysqli_real_escape_string($conn,$_POST['passFromLogin']);

        // $UserNameFromLogin = $_POST["usernameFromLogin"];
        // $PasswordFromLogin = $_POST["passFromLogin"];	
		// $enp=md5($PasswordFromLogin);
		// print $enp;
        print $UserNameFromLogin;
        $userFindSql = "SELECT * FROM members ";
            $userFindSql .= "WHERE username = '$UserNameFromLogin' AND password= '$PasswordFromLogin'";

            $userFindQueryApply = mysqli_query($conn,$userFindSql); 	
            while ($row = mysqli_fetch_array($userFindQueryApply, MYSQLI_ASSOC)) {
                $userID = $row['ID'];
                $userNameInDB = $row['username'];
                $passwordInDB = $row['password'];
                $emailInDB= $row['email'];
                $role=$row['role'];
                $statusInDB=$row['status'];
               
            }
                
            // mysqli_free_result($tUser_SQLselect_Query);

            if (!empty($passwordInDB) AND ($PasswordFromLogin == $passwordInDB)){

                            setcookie("accessLevel", $role, time()+3600, "/");	
							setcookie("userID", $userID, time()+3600, "/");	
							setcookie("loginAuthorised", "loginAuthorised", time()+3600, "/");
							setcookie("email", $emailInDB, time()+3600, "/");
							setcookie("password", $passwordInDB, time()+3600, "/");
							// setcookie("register", $register, time()+3600, "/");
				$flag=1;
                 
                
                 $success = false;
                 //	Get current date-time in MySQL format
                 $tday = new DateTime("now", new DateTimeZone('ASIA/DHAKA'));
		        $nowTimeStamp=$tday->format('Y-m-d H:i:s');
                 //	Get user's IP address
                 $userIP = $_SERVER['REMOTE_ADDR'];
                 $otp=rand(1000,9999);
             
                 $insertLogin_SQL = 'INSERT INTO UserLog (
                                                 userID, 
                                                 timeLogin, 
                                                 IPaddress,
                                                 otp
                                             ) VALUES (
                                                 '.$userID.',
                                                 "'.$nowTimeStamp.'",
                                                 "'.$userIP.'",
                                                 "'.$otp.'"
                                             )';
                                             
                     if (mysqli_query($conn,$insertLogin_SQL))  {	
                         $success = true;
                     } else {
                         $success = $insertLogin_SQL."<br />".mysqli_error($insertLogin_SQL);		
                     }


					if ($success) {

            $userLoginIDSql = "SELECT * FROM userlog ";
            $userLoginIDSql .= "WHERE userID= '$userID'";

            $userLoginIDSqlQueryApply = mysqli_query($conn,$userLoginIDSql); 	
            while ($row = mysqli_fetch_array($userLoginIDSqlQueryApply, MYSQLI_ASSOC)) {
                $userLoginID = $row['ID'];
                $userOtp=$row['otp'];
                               
            }
            
                        setcookie("loginID", $userLoginID, time()+3600, "/");
                        if($statusInDB=='deactivate'){
                            setcookie("loginAuthorised", "", time()-3600,"/");
	                        setcookie("userID", "", time()-3600,"/");
	                        setcookie("loginID", "", time()-3600,"/");
                            header("Location: index.php?count=1");
                        
                        }
                        else{
                            
                            
                            header("Location: otp.php");
                        }
					} else {
						echo 'Session Logging ERROR.<br /><br />';
						echo $success;
						// echo '<a href="'.$thisScriptName.'">Login Anyway</a>';
					}
                 
            }

			
				else {
					echo $userFindSql;}
			
            

    }

?>


