<?php
     //  header('Cache-Control: no cache'); //no cache
     //  session_cache_limiter('private_no_expire');
       session_start();
	   require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>

<style>
ul {
    list-style-type: none;
    margin-bottom: 40px;
    padding:0;
    overflow: hidden;
    background-color:#333;
}

li {
    float: right;
    border-right:1px solid #bbb;
}

// li:last-child {
  //  border-right: none;
 // } 

li a {
    display: block;
    color: white;
    text-align: center;
	font-size:20px;
    padding: 30px 70px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}
  </style>

<title>Home Page</title>
<link rel = "stylesheet" href = "css/style.css"
</head>
<body style="background-color:#7f8c8d"> 

<div class="sticky">
     <ul>
	    <li><a></a></li>
		
		
		<li><a href="register.php">Register</a></li>
      <li><a href="index.php">Login</a></li>
	  <li><a>Contact</a></li>
		<li><a>About</a></li>
	  <li><a class="active" href="homepage.php">Home</a></li>
        
     </ul>
</div>



     <div id = "main-wrapper" style="width:1100px;background-color:white;">
	   <center>
	      <h1>Home Page</h1> 
		</center>
		
		<br>
		
		<form action="homepage.php" method="post" >
		
		
		
		<input name="name" style="width:60%;height:40px;margin-left:80px;" type="text" class="inputvalues" placeholder="Search Your Book Here" required/>
		
	<!--	<input name="pricefrom" style="width:10%;height:50px;" type="number" class="inputvalues" placeholder="Price From" />
		<input name="priceto" style="width:10%;height:50px;" type="number" class="inputvalues" placeholder="Price To" />  -->
		
					   
		
		
		       <input style="width:100px;height:50px;margin-left:20px;" type="submit" id="back_btn" value="Search"/>
			   
			   
			   <?php  
			   
			     if (isset($_POST['name']))
				 {
		          echo '  <hr> <br>  <p style="margin-left:70px;">Price Range</p> 
					          
					          <input name="pricefrom" style="width:10%;height:40px;margin-left:70px;" type="number" class="inputvalues" placeholder="Price From" /> &nbsp;
		                     -<input name="priceto" style="width:10%;height:40px;" type="number" class="inputvalues" placeholder="Price To" /> 
							 
							 
							   <br><br><hr>';
				 }
				 
		?>		
		       
		
        </form>
		
		
		
		</div>

     
</body>
</html>
