<?php
session_start();

?>

<!DOCTYPE html>

<!-- downloads -->

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>ITEM</title>
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

<body>

<?php
//connection
$con = mysqli_connect("localhost","root","","sweethome");
if(!$con){
die('Failed to connect to server: ' . mysqli_error());
}
?>

    <nav>
        <div class="logo">
            <a href="home.php">sweet<em>home</em></a>
        </div>
      <div class="menu-icon">
        <span></span>
      </div>
    </nav>

    <div class="page-heading">
        <div class="container">
            <div class="heading-content">
                <h1> Item <em></em></h1>
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
							<?php
							 	
		//get information from link to display certain item
	$items=$_GET['id'];
	$sqel="SELECT * FROM item WHERE id=$items";
	$resulto = mysqli_query($con, $sqel);
	while($rows = mysqli_fetch_assoc($resulto)){
 ?>
                                <img src="<?php echo 'data:images/jpg;base64,'.base64_encode($rows['image'] );?>" >
                                <div class="text-content">
                                    <h2><?php echo $rows['name'];?> </h2>
                                    
                                    <p><?php echo $rows['discription'];?></p>
                                  

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			
            <div class="col-md-3">
                <div class="side-bar">
                    <div class="search">
					<form method="post" action=<?php print"item.php?id=$items"?>> <!-- add comment form -->
                        <fieldset>
                            <input name="comment" type="text" class="form-control" id="search" placeholder="Enter your comment.." required="">
							<br>
							<input type="submit" name="submit" value="submit" >
                        </fieldset>
						</form>
						
						<div class="archives">
                        <div class="sidebar-heding">
                    
                 

                
  
                </div>
            </div>
                    </div>
          
        </div>
   
<?php
}
?>




<h3> COMMENTS:<h3/>
<?php
// display all comments belong to the item
$sql="SELECT * FROM comment WHERE item_id=$items";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result)){
?>
 <h5 style="color:white;" >- <?php echo $row['body']; ?> </h5> <br>  <!-- display comments -->
	
	
<?php
}
?>	
     

    <?php
	// add comment form the comment field to database
	if (isset($_POST['submit'])){
if ($_POST["submit"]=="submit"){
	$comm=$_POST["comment"];
$sql="INSERT INTO comment (item_id,body) VALUES ('$items','$comm')";
$result = mysqli_query($con, $sql);
if ($result){
	echo '<script>alert("comment added ")</script>'; 
	echo "<meta http-equiv='refresh' content='0'>"; // refresh page

}
else {
	echo '<script>alert("comment not added")</script>';  
echo "<meta http-equiv='refresh' content='0'>"; // refresh page
	}
	}}

?>
         
      

		
<?php

 	// to check session for adding control-panel page to menu

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
</html>