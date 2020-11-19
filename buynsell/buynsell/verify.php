<?php
      require 'dbconfig/config.php';
	  session_start();
?>

<!DOCTYPE html>
<html>
<head>

  
  
<title>Sellgood Registeration</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Load an icon library to show a hamburger menu (bars) on small screens -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel = "stylesheet" href = "css/menubar.css">
<link rel = "stylesheet" href = "css/style.css">


</head>
<body style="background-color:white" onresize="loadfunc()"> 
<a href="index.php"><img class="sticky1" src="images/unnamed3.png" style="float:left;" ></img></a>

<div class="sticky">
     <ul>
	    
		<!--  <div class="topnav2" id="myTopnav">  -->
	    <div class="topnav2" id="myTopnav">
		<b href="javascript:void(0);" class="icon" onclick="myFunction()">
       <i id="bars" class="fa fa-bars" onclick="myFunction()"></i></b>
	   
	   <div class="dropdown">
		<li><a id="href1" style="padding:15px 54px;" class="active"><div id="menuname1"></div></a></li>
		
		<div class="dropdown-content" id="myDropdown">
		<li><a id="href2"><div id="menuname2"></div></a></li>
      <li><a id="href3"><div id="menuname3"></div></a></li>
	 
	  </div>
	  </div>
	  </div>
        
     </ul>
</div>

     <br><br><br><br><br><br><br><br><br><br><br>

    <?php
	
	       if(isset($_GET['email']) && !empty($_GET['email']) && isset($_GET['hash']) && !empty($_GET['hash']))
		   
		  {
                 // Verify data
                 $email = mysqli_real_escape_string($con,$_GET['email']); // Set email variable
                 $hash = mysqli_real_escape_string($con,$_GET['hash']); // Set hash variable
          
	
	       $search="SELECT user_mail, hash, active FROM registeration WHERE user_mail='".$email."' AND hash='".$hash."';" or die(mysqli_error());
				 $query_run = mysqli_query($con,$search);
	     //  $search = mysql_query("SELECT email, hash, active FROM registeration WHERE email='".$email."' AND hash='".$hash."' ") or die(mysql_error()); 
           $match  = mysqli_num_rows($query_run);
		   
		  // echo "No. of matches are ".$match."email=".$email."hash=".$hash;
		   
		   if($match >0)
		   {
			   $row = mysqli_fetch_array($query_run, MYSQLI_ASSOC);
			   if(mysqli_real_escape_string($con,$row['active'])==0)
			   {
			   $query="UPDATE registeration SET active='1' WHERE user_mail='".$email."' AND hash='".$hash."' AND active='0';" or die(mysqli_error());
				 $query_run2 = mysqli_query($con,$query);
				 if($query_run2)
				 {
					 echo "Congratulations your account has been activated, you can now login ";
				 }
			   }else
			   {
				   echo "Your account has already been registered and verified";
			   }
		   }
		   else
		   {
			   echo "The url is invalid ";
		   }
		  }
		  else
		  {
			  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Invalid approach, please use the link that has been send to your email.";
		  }
	
	?>


<!--
<script>
                  function myFunction()
				  {
                       var x = document.getElementById("myTopnav");
                       if (x.className === "topnav2") {
                        x.className += " responsive";
                  } 
				  else 
				  {
                         x.className = "topnav2";
                   }
               }
			   
       </script> -->
	   
	     <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}



// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
	
	if(e.target.matches('#bars'))
  {
	  //if(i===0)
	   {
	  var myDropdown = document.getElementById("myDropdown");
    
      myDropdown.classList.toggle("show");
	  }
  }
	
	
	
   if (!(e.target.matches('.icon')) && !(e.target.matches('#bars'))) {
	  
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
		
      myDropdown.classList.remove('show');
    }
  }
  
}


</script>

<script>
				if(window.innerWidth<=1147)
				{
					var menuname1=document.getElementById("menuname1");
					menuname1.innerHTML = "Register";
					var href1=document.getElementById("href1");
					href1.href="register.php";
					var menuname2=document.getElementById("menuname2");
					menuname2.innerHTML = "Home";
					var href2=document.getElementById("href2");
					href2.href="index.php";
					var menuname3=document.getElementById("menuname3");
					menuname3.innerHTML = "Login";
					var href3=document.getElementById("href3");
					href3.href="login.php";
				}
				if(window.innerWidth>1147)
				{
					var menuname1=document.getElementById("menuname1");
					menuname1.innerHTML = "Home";
					var href1=document.getElementById("href1");
					href1.href="index.php";
					href1.classList.remove('active');
					var menuname2=document.getElementById("menuname2");
					menuname2.innerHTML = "Register";
					var href2=document.getElementById("href2");
					href2.href="register.php";
					href2.classList.add('active');
					var menuname3=document.getElementById("menuname3");
					menuname3.innerHTML = "Login";
					var href3=document.getElementById("href3");
					href3.href="login.php";
				}
			
			
			</script>
			
			<script>
			
			     function loadfunc()
				 {
					 location.reload();
				 }
			
			</script>

     
</body>
</html>