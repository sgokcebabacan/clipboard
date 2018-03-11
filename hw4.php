<?php

// Create connection
$con = mysqli_connect("localhost","root","","hw4");

// Check connection
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

$URL =$_GET['URL'];
$NOTE = "";
if($URL==NULL){
	echo "<script> alert('Please enter your URL');</script>";
	header("Refresh:0,url=hw4.html");
}

$res=mysqli_query($con, "SELECT * FROM hw4db WHERE URL='$URL'");
$db_result=mysqli_fetch_array($res);

if($db_result==NULL){
		mysqli_query($con, "INSERT INTO hw4db(URL) VALUES('$URL')");}
		else {
			$NOTE = $db_result['NOTE'];
		}
?>

<!DOCTYPE HTML>		
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>Internet Clipboard</title>
    <!-- CSS  -->
     <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="hw4.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>

<body>

<div class="container">
       
    <form class="col s12" action='hw4_1.php' method="POST">

    		<br><br>
            <p class="blue-text bosluklu"> Internet Clipboard </p>

            	<div class="row">
            	<div class="col s10 m22 l22">
            		<input type ="text" name ="URL" class=" bosluklu" value ='<?php echo "$URL" ?>' readonly>
            	</div>
       		 	</div>

            	<div class="row">
            	<div class="col s10 m22 l22">
            		<br><br>
	                <textarea name="NOTE" rows="5" cols="40" ><?php echo "$NOTE"?></textarea>
	                <br><br>
           		</div>
       		 	</div>
                       
                <button class="btn waves-effect waves-light teal #41AAB1 lighten-2 white-text rounded fullwidth" type="submit" name="action">COPY
                </button>              
    </form>
</div>
 <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/js/materialize.min.js"></script>
</body>
</html>