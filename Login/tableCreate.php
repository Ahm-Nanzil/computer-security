<?php
	
//		File in initialise folder:              table_tAccessLog.php

{ 		//	Secure Connection Script
    include 'C:\xampp\htdocs\Login\Config\Config.php';
    $conn = new mysqli($servername, $username, $password,$dbname); 
    $dbSuccess=FALSE;
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    else $dbSuccess=TRUE;
		//	END	Secure Connection Script
}

	$newTableName = "UserLog";
	
	{		//	drop & create table
		$dropTestTable = 'DROP TABLE '.$newTableName;
			if (mysqli_query($conn,$dropTestTable))  {	
				echo 'Table Dropped.<br /><br />';
			} else {
				echo '<span style="color:red; ">
						FAILED to DROP table.'.$newTableName.'</span>
						<br /><br />';
				echo mysqli_error($dropTestTable);
			}

		$createTestTable = 'CREATE TABLE '.$newTableName.' (
									ID INT (11) NOT NULL  AUTO_INCREMENT PRIMARY KEY ,
									userID INT( 11 ) NOT NULL, 
									timeLogin DATETIME, 
									timeLogout DATETIME,
									IPaddress VARCHAR (15) 
								)';		
											
			if (mysqli_query($conn,$createTestTable))  {	
				echo '<br />Table '.$newTableName.' Added.<br /><br />';
			} else {
				echo '<span style="color:red; "><br />FAILED to Add table '
						.$newTableName.'.</span><br /><br />';
				echo mysqli_error($createTestTable);
			}
	}

	// $bantime = DATE_ADD(NOW(), INTERVAL  DAY);
	//

?>