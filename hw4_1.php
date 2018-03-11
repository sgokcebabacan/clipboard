<?php

// Create connection
$con = new mysqli("localhost","root","","hw4");

// Check connection
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

$URL =$_POST["URL"];
$NOTE =$_POST["NOTE"];

$sql = "UPDATE hw4db SET NOTE='$NOTE' WHERE URL='$URL'";

$result = $con->query($sql);

if($result === TRUE){
	header("Refresh:0,url=hw4.php?URL=$URL");
}else{
	echo "cannot update";
}


mysqli_close($con);


