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

if(isset($_GET['userid']) && isset($_GET['active'])){
   
    $userid=$_GET['userid'];
    $sql="UPDATE members set status='deactivate' where ID='$userid' ";
    if(mysqli_query($conn,$sql)){
        setcookie("bannedUserId", $userid, time()+60, "/");
        header("Location: userlist.php?status_msg=Employer is deactivated ");
        exit();
    }
}

if(isset($_GET['userid']) && isset($_GET['deactivate'])){
    // echo $_GET['employeeid']."<br>";
    // echo $_GET['active']."<br>";
    $userid=$_GET['userid'];
    $sql="UPDATE members set status='active' where ID='$userid' ";
    if(mysqli_query($conn,$sql)){
        header("Location: userlist.php?status_msg=Employer is actived ");
        exit();
    }
}
    }

?>