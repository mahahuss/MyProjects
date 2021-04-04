
<?php
session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>edit</title>
<!-- 

Highway Template

https://templatemo.com/tm-520-highway

-->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/light-box.css">
        <link rel="stylesheet" href="css/templatemo-style.css">

        <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300,400,500,600,700,800,900" rel="stylesheet">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
		
    </head>
<body>

<!-- database connection-->
<?php
//connection
$con = mysqli_connect("localhost","root","","sweethome");
if(!$con){
die('Failed to connect to server: ' . mysqli_error());
}

?>
<!---------------------- template code DON'T TOUCH----------------------->

    <nav>
        <div class="logo">
            <a href="index.html">sweet<em>home</em></a>
        </div>
      <div class="menu-icon">
        <span></span>
      </div>
    </nav>

    <div class="page-heading">
        <div class="container">
            <div class="heading-content">
                <h1> submit <em></em></h1>
            </div>
        </div>
    </div>
    <div class="blog-entries">
        <div class="container">
            <div class="col-md-9">
                <div class="blog-posts">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="single-blog-post">
                                <img src="" alt="">
                              
                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>	
<br/>
<br/>

<?php
if (isset($_POST['Update'])){
	$id=$_POST['id'];
	$cat=$_POST['category_id'];
	$nam=$_POST['name'];
	$dis=$_POST['discription'];
	if (!isset($_POST['image']) || $_POST['image']==null || $_POST['image']=="" ){ // if admin want image remain the original 
    $query = "UPDATE item SET category_id='$cat',name='$nam',discription='$dis' WHERE id='$id'"; 
	}	
	else if (isset($_POST['image'])){ // if admin choose another image
	$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"])); // format the new image to insert it to database
	$query = "UPDATE item SET category_id='$cat',name='$nam',discription='$dis', image='$file' WHERE id='$id'"; 
	
	}
     // if(
	 $retval= mysqli_query($con, $query);
	  
	     if(! $retval ) {
      die('Could not update data: ' . mysql_error());
   }else {

	   echo '<script>alert("Item Updated successfully")</script>'; 
	   echo"<script>location='control-panel.php'</script>";
   }
 
}
else{
	echo '<script>alert("error")</script>';

echo "<script>location='control-panel.php'</script>";	
}
	
?>
   

<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

form {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
  <div class="text-content">
                              

<?php
if (!isset($_SESSION['USERNAME'])){
?>
   <section class="overlay-menu">
      <div class="container">
        <div class="row">
          <div class="main-menu">
              <ul>
                  <li>
                      <a href="home.php">Home</a>
                  </li>
               
                  <li>
                      <a href="login.php">Admin login</a>
                  </li>
              
              </ul>
 
          </div>
        </div>
      </div>
    </section>
<?php
}
else{
	?>

   <section class="overlay-menu">
      <div class="container">
        <div class="row">
          <div class="main-menu">
              <ul>
                  <li>
                      <a href="home.php">Home</a>
                  </li>
                  <li>
                      <a href="login.php">Admin login</a>
                  </li>
               <li>
                      <a href="control-panel.php">Control panel</a>
                  </li>
              </ul>
 
          </div>
        </div>
      </div>
    </section>
<?php
}
?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>
    
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>
<!----------------------END template code ----------------------->
</html>
