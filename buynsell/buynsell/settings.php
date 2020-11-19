<?php

       require 'dbconfig/config.php';
       session_start();
	   
?>

<!DOCTYPE html>
<html>
<head>

<title>Sellgood</title>
<meta name="viewport" content="width=device-width, initial-scale=1">


<!-- Mdb Bootstrap -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"> 
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">


<!-- Load an icon library to show a hamburger menu (bars) on small screens -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel = "stylesheet" href = "css/loginmenubar.css">
<link rel = "stylesheet" href = "css/style.css">
</head>
<!--<body style="background-color:#7f8c8d">   -->
<body style="background-color:white">

<a href="index.php"><img class="sticky1" src="images/unnamed3.png" style="float:left;" ></img></a>

   <div class="sticky">
     <ul class="ul">
	    
		<!--  <div class="topnav2" id="myTopnav">  -->
	    <div class="topnav2" id="myTopnav">
		<b href="javascript:void(0);" class="icon" onclick="myFunction()">
       <i id="bars" class="fa fa-bars" onclick="myFunction()"></i></b>
		
		<div class="dropdown1">
		<li class="li"><a class="active" href="settings.php">Settings</a></li>
		
		<div class="dropdown-content1" id="myDropdown">
		<li class="li"><a class="lia" href="homepage2.php">Home</a></li>
		<li class="li"><a class="lia" href="adview.php">Dashboard</a></li>
		<li class="li"><a class="lia" href="clgdetails.php">College Details</a></li>
		<li class="li"><a class="lia" href="adsubmit.php">Submit Ad</a></li>
		<li class="li"><a class="lia" href="chatlist.php">Messages</a></li>
		
		      
        <li class="li"><a class="lia"><form method="post"><input name="logout" type="submit" id="logout" value="Log Out"/></form></a></li>
		   
		</div>  
         </div>	
         </div>		 
     </ul>
    </div>

	<br><br><br><br><br><br><br>
	
     <div id = "main-wrapper2"  style="width:75%;background-color:white;">
	   <center>
	      <h1>Settings</h1>
		  
		  <br>
		  
		  
		  <?php
		      
			    if($_SESSION['user_id'])
		     {
				 if(isset($_POST['contact_btn']))
				 {
					 if( $_POST['email']== $_SESSION['user_mail'] && $_POST['phone']== $_SESSION['user_mobile'])
					 {
					   $query="UPDATE `registeration` SET `name`='{$_POST['name']}', `user_mail`='{$_POST['email']}', `user_mobile`='{$_POST['phone']}' WHERE user_id='{$_SESSION['user_id']}' ";
				       $query_run = mysqli_query($con,$query); 
					   
					   echo '<script type="text/javascript"> alert("Changes to Contact Details Saved") </script>';
					 }
					 else if( $_POST['email']!= $_SESSION['user_mail']  || $_POST['phone']!= $_SESSION['user_mobile'] )
					 {
					 $query="Select * from registeration where user_mail='{$_POST['email']}' or user_mobile='{$_POST['phone']}';";
				         $query_run = mysqli_query($con,$query);
				 
				         if(mysqli_num_rows($query_run)>0)
				         {
					 // there is already a user with the same username
					 
					         echo '<script type="text/javascript"> alert("User with same Email or Phone already exists ...... Try another Email or Phone") </script>';
				         }
					 }
				  //   if((mysqli_num_rows($query_run))>0)
				     
				 
				 }
				 
				 if(isset($_POST['pass_btn']))
				 {
				   if( empty($_POST['pass']) || empty($_POST['confpass']) )
				   {
					   echo '<script type="text/javascript"> alert("Password or Confirm Password fields can not be empty") </script>';
				   }
				   else
				   {
					   if($_POST['pass']!=$_POST['confpass'])
					   {
						   echo '<script type="text/javascript"> alert("Password and Confirm Password are not equal") </script>';
					   }
					   else if($_POST['pass']==$_SESSION['password'])
					   {
						   echo '<script type="text/javascript"> alert("Old password and New password can not be same") </script>';
					   }
					   else 
					   {
						   $query="UPDATE `registeration` SET `password`='{$_POST['pass']}' WHERE user_id='{$_SESSION['user_id']}' ";
				           $query_run = mysqli_query($con,$query); 
				 
				  //   if((mysqli_num_rows($query_run))>0)
				          {
						     echo '<script type="text/javascript"> alert("Password has been changed") </script>';
					      }
					   }
						   
				   }
				 }
				 
				 $query1="Select * from registeration where user_id='{$_SESSION['user_id']}'";
				 $query_run2 = mysqli_query($con,$query1);
				 
				  if(mysqli_num_rows($query_run2)>0)
				 {
				 
				    if($row = mysqli_fetch_array($query_run2, MYSQLI_ASSOC)) 
					{
						$_SESSION['name']=$row['name'];
					   $_SESSION['user_mail']=$row['user_mail'];
					   $_SESSION['user_mobile']=$row['user_mobile'];
					}
				 }
				 
			 }
			 else
			 {
				 header('location:index.php');
			 }
				
	  		
					if(isset($_POST['logout']))
			       {
		           session_destroy();
                   header('location:login.php');				   
			       }

		  
		  ?>
		  
		  
		  <h2 id="settingslabel"><a href="clgdetails.php" >Change College Details</a></h2>
		  <br>
		  <u><h2 id="settingslabel" >Change Contact Details</h2></u> 
		  <br>
		  <form action="settings.php" method="post">
		  <input type="text" id="settingstext" class="inputvalues" placeholder="Phone No." name="phone" value="<?php echo $_SESSION['user_mobile'];  ?>"></input> <br>
		<!--  <input type="submit" id="signup_btn" style="background-color:green;width:9%;margin-right:635px;height:35px;" value="Update" />     -->
		  <br>
	<!--	  <u><h2 style="margin-right:600px;">Change Email</h2></u>  -->
	<!--	  <form action="settings.php" method="GET">  -->
		  <input type="text" id="settingstext" class="inputvalues" placeholder="Email" name="email" value="<?php echo $_SESSION['user_mail'];  ?>"></input> <br>
		<!--  <input type="submit" id="signup_btn" style="background-color:green;width:9%;margin-right:635px;height:35px;" value="Update" /> -->
		  
		  <br>
		<!--  <u><h2 style="margin-right:600px;">Change Name</h2></u>   -->
	<!--	  <form action="settings.php" method="GET">  -->
		  <input type="text" id="settingstext" class="inputvalues" placeholder="Name" name="name" value="<?php echo $_SESSION['name'];  ?>"></input> <br>
	      <input type="submit" id="settingsbtn" name="contact_btn" value="Update" />   
		  </form><br>
		  <u><h2 id="settingslabel" >Change Password</h2></u>
		  <br>
		  <form action="settings.php" method="post">
		  <input type="text" id="settingstext" class="inputvalues" placeholder="New Password" name="pass"></input> <br><br>
		  <input type="text" id="settingstext" class="inputvalues" placeholder="Confirm New Password" name="confpass" ></input> <br>
		  <input type="submit" id="settingsbtn" name="pass_btn" value="Update" />
		  </form><br>
		  <u><h2 id="settingslabel">Delete Account</h2></u>
		  <form action="settings.php" method="post">
		  <input type="submit" id="settingsbtn" name="delete_btn" style="background-color:red;width:150px;" value="Delete Account" />
		  </form><br>
		  
		  
		  
		  </div>
		  
		  
		  <footer style="margin-top:45px;" class="page-footer font-small blue pt-4">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-6 mt-md-0 mt-3">

          <!-- Content -->
          <h5 class="text-uppercase">Sell Good, Buy Good</h5>
          <p>Enjoy Buying and Selling goods, nothing like anything before !!</p>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none pb-3">

        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3">

            <!-- Links -->
           <h5 class="text-uppercase">About Us</h5>

            <ul class="list-unstyled">
              <li>
                <a href="#!">About Sellgood</a>
              </li>
              <li>
                <a href="#!">Careers</a>
              </li>
              <li>
                <a href="#!">Contact Us</a>
              </li>
              <li>
                <a href="#!">Become our Partner</a>
              </li>
            </ul>

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 mb-md-0 mb-3">

            <!-- Links -->
            <h5 class="text-uppercase">Sellgood</h5>

            <ul class="list-unstyled">
              <li>
                <a href="#!">Help</a>
              </li>
              <li>
                <a href="#!">Sitemap</a>
              </li>
              <li>
                <a href="#!">Earn Money</a>
              </li>
              <li>
                <a href="#!">Legal & Privacy Information</a>
              </li>
            </ul>

          </div>
          <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->
	
	  <!-- Footer -->
	 
	

    <!-- Footer Elements -->
    <div class="container">

      <!-- Grid row-->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-12 py-5">
          <div class="mb-5 flex-center">

            <!-- Facebook -->
            <a class="fb-ic">
              <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
            </a>
            <!-- Twitter -->
            <a class="tw-ic">
              <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
            </a>
            <!-- Google +-->
            <a class="gplus-ic">
              <i class="fab fa-google-plus-g fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
            </a>
            <!--Linkedin -->
            <a class="li-ic">
              <i class="fab fa-linkedin-in fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
            </a>
            <!--Instagram-->
            <a class="ins-ic">
              <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
            </a>
            <!--Pinterest-->
            <a class="pin-ic">
              <i class="fab fa-pinterest fa-lg white-text fa-2x"> </i>
            </a>
          </div>
        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->

    </div>
    <!-- Footer Elements -->


  
    
    <div class="footer-copyright text-center py-3">© 2018 Copyright:
      <a href="https://mdbootstrap.com/education/bootstrap/"> Sellgood.in</a>
    </div>

  </footer>
		  
		<!--   <div id="demo"></div>  
	 
	  <script>
                 var txt = "";
                 txt += "<p>Inner width/height: " + window.innerWidth + "*" + window.innerHeight + "</p>";
                 txt += "<p>Outer width/height: " + window.outerWidth + "*" + window.outerHeight + "</p>";

                 document.getElementById("demo").innerHTML = txt;
				 
				 
				 
            </script>  -->
		  
	<!--	  <script>
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
			   
       </script>  -->
	   
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
          

</body>
</html>
