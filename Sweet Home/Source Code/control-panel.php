<?php
session_start();
if (!isset($_SESSION['USERNAME'])){
	//check session
	header("location: login.php");
exit(); }
	

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Control Panel</title>
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
                <h1> control panel <em></em></h1>
            </div>
        </div>
    </div>



</form>
</div>
    <div class="blog-entries">
        <div class="container">
           
         
           
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



.form {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

#insert{
	background-color: #4CAF50;
}
</style>

<div class="form">
<form method="post" action="control-panel.php"  >
 <p>DELETE</p>
 <select name="id">
 <?php
 // display names of the items in dropdownlist to select and delete
	$sql="SELECT * FROM item";
	$result = mysqli_query($con, $sql);
	while($row = mysqli_fetch_assoc($result)){
 ?>
 <option value="<?php echo $row["id"]; ?>">
 <?php echo $row["name"]; ?> </option>
 
<?php
 } 
 
 ?>
 <input type="submit" name="submit" value="delete" >

</select>

</form>
<form method="post" enctype="multipart/form-data" action="control-panel.php" name="Form" onsubmit="return validateForm()" >  
 <p>ADD</p> <!-- add form -->
<p> name <input type="text" name="name" id="name" > </p>
<p> discription <input type="text" name="discription" id="discription" > </p>
<p> category <select name="category_id">
<option value="1">bedroom</option>
<option value="2">living room</option>
<option value="3">bathroom</option>
<option value="4">kitchen</option>
<option value="5">outdoor</option>
<option value="6">dining room</option>
</select>
</p>
 
<p> image <input type="file" name="image" id="image" > </p>
<br />  
					
<input type="submit" name="submit" id="insert" value="Insert"  />  
					 
</form> 




<form method="post" action="update.php" >
 <p>EDIT</p>
 <select name="id">
 <?php
// display names of the items in dropdownlist to select and edit
 
	$sql="SELECT * FROM item";
	$result = mysqli_query($con, $sql);
	while($editrow = mysqli_fetch_assoc($result)){
 ?>
 <option value="<?php echo $editrow["id"]; ?>">
 <?php echo $editrow["name"]; ?> </option>
 
<?php
 } 
 ?>
 <input type="submit" name="edit" value="edit">



</select>

</form>

</div>




 


		

<?php  

//check weather submit button for add or delete


 if (isset($_POST['submit'])){
    if ($_POST["submit"]=="Insert"){
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"])); // to format the image for database
	$cat=$_POST['category_id'];
	$nam=$_POST['name'];
	$dis=$_POST['discription'];	  
      $query = "INSERT INTO item(category_id,name,discription,image) VALUES ('$cat','$nam','$dis','$file')";  
      if(mysqli_query($con, $query))  
      {  
           echo '<script>alert("item Inserted into Database")</script>'; 
		   echo "<meta http-equiv='refresh' content='0'>";	// refrech the page	   
      }
else{
echo '<script>alert("item not Inserted into Database")</script>';  	
}
 }
else if ($_POST["submit"]=="delete"){
	$deletItem=$_POST["id"];
$sql="DELETE FROM item WHERE id= $deletItem";
$result = mysqli_query($con, $sql);
if ($result){
	echo '<script>alert("item deleted successfully")</script>'; 
	echo "<meta http-equiv='refresh' content='0'>"; //refresh the page
}
else {
	echo '<script>alert("item not deleted")</script>';  
	echo "<meta http-equiv='refresh' content='0'>";
	}
}
 }
 
 
 ?>  
 
				

 



<script type="text/javascript">
  function validateForm() { //check if add form is empty
    var a = document.forms["Form"]["name"].value;
    var b = document.forms["Form"]["discription"].value;
    var c = document.forms["Form"]["category_id"].value;
    var d = document.forms["Form"]["image"].value;
    if (a == null || a == "" || b == null || b == ""|| c == null || c == ""|| d == null || d == "") {
      alert("Please Fill All Required Field");
      return false;
    }
  }
</script>


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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>
    
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
   </div>
   </div>
</body>
</html>