
<?php
session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  		<title>Category</title>
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
<?php
//connection
$con = mysqli_connect("localhost","root","","sweethome");
if(!$con){
die('Failed to connect to server: ' . mysqli_error());
}
?>



    <nav>

        <div class="logo">
            <a href="home.php">sweet<em> Home</em></a>
        </div>
        <div class="menu-icon">
        <span></span>
      </div>
    </nav>

    <div id="video-container">
        <div class="video-overlay"></div>
        <div class="video-content">
            <div class="inner">
              <h1>Welcome to <em>sweet home</em></h1>
              <p>A world for inspiration <br> for your home</p>

           
            </div>
        </div>
        <video autoplay="" loop="" muted>
        	<source src="vid.mp4" type="video/mp4" />
        </video>


    </div>
		  <div class="full-screen-portfolio" id="portfolio">
        <div class="container-fluid">
	<?php
	//get information from link to display certain category with its items
	$items=$_GET['id'];
	$sqel="SELECT * FROM item WHERE category_id=$items";
	$resulto = mysqli_query($con, $sqel);
	while($rows = mysqli_fetch_assoc($resulto)){
 ?>



  
            <div class="col-md-4 col-sm-6">
                <div class="portfolio-item">
                  
                        <div class="hover-effect">
                            <div class="hover-content">
                                <p><?php echo $rows['name']; ?></p>
								<?php  $id=$rows['id'];
								$name=$rows['name'];
								print "<a href='item.php?id=$id'>  >
								
								<p>Click here</p></a>";
								?>
								
                            </div>
                        </div>
                        <div class="image">
                            <?php // display image 
 echo '<img src="data:images/jpg;base64,'.base64_encode($rows['image'] ).'" height="200" width="200" class="img-thumnail" />';
    ?><div class="thumb"></div> </div> 
                </div>
            </div>
  

<?php
}
?>
      </div>
    </div>



    <footer>


    

 <?php
if (!isset($_SESSION['USERNAME'])){
	// to check session for adding control-panel page to menu
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



<script>  

</body>
</html>
