<?php
session_start();


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
 </head>
 <body>

        <?php 
		//connection
            $con = mysqli_connect("localhost","root","","sweethome");
            if(!$con){
            die('Failed to connect to server: ' . mysqli_error());
            }
        
		//get information from post array
    $inUsername = $_POST["username"]; 
        // as the method type in the form is "post" we are using $_POST
        
    $inPassword = $_POST["password"]; 
        
        //////////////////////////////
        
    $qry="SELECT * FROM admin WHERE username='$inUsername' AND password='$inPassword'"; //check
	$result=mysqli_query($con,$qry);
	if ($result){
		if (mysqli_num_rows($result)==1){ 
			$member=mysqli_fetch_assoc($result);
			$_SESSION['USERNAME']=$member['username']; 
			$_SESSION['PASSWORD']=$member['password'];
			echo "<script>location='control-panel.php'</script>"; //redirect to control panel if true
			exit();
		}
		else{
			//login failed
			echo "<script>alert('incorrect username or password');</script>";
			echo "<script>location='login.php'</script>"; // redirect to login page if false
			exit();
		}
	}
else {
	die("query failes");
}
	
?>

</body>
</html>
