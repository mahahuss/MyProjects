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
                <h1> Update <em></em></h1>
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
	<!----------------------END template code ----------------------->
		
<br/>
<br/>

<div id="editform2">
<form method="post"  name="Form"  enctype="multipart/form-data" action="submit.php" name="Form">
 <?php
 //get information and display it into form fields
 if (isset($_POST['edit'])) {
	$editid=$_POST['id'];
	$qr="SELECT * FROM item WHERE id=$editid";
	$result = mysqli_query($con, $qr);
	$editrow = mysqli_fetch_assoc($result);
 }
 ?>
 <input type="hidden" name="id" value="<?php echo $editrow['id'];?>">

<p> Category <select name="category_id" value=<?php echo $editrow['category_id'];?> >
<option name='1' value="1" <?php if($editrow['category_id']==1) echo 'selected';?>>bedroom</option>
<option name='2' value="2" <?php if($editrow['category_id']==2) echo 'selected';?>>living room</option>
<option name='3' value="3" <?php if($editrow['category_id']==3) echo 'selected';?>>bathroom</option>
<option name='4' value="4" <?php if($editrow['category_id']==4) echo 'selected';?>>kitchen</option>
<option name='5' value="5" <?php if($editrow['category_id']==5) echo 'selected';?>>outdoor</option>
<option name='6' value="6" <?php if($editrow['category_id']==6) echo 'selected';?>>dining room</option>
</select>
</p>

<p>Name<input type="text" name="name" value="<?php echo $editrow['name'];?>"/></p>

<p>Discription<input type="text" name="discription" value="<?php echo $editrow['discription'];?>"/></p>

<p> Image <input type="file" name="image" id="image"> </p>

<p><input name="Update" type="submit" value="Update" /></p>

</form>
</div>




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



form {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
  <div class="text-content">
                                   

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
<!----------------------END template code ----------------------->
</html>
