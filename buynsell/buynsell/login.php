<?php
       session_start();
       require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>

 
  
<title>Sellgood Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">


<!-- Mdb Bootstrap -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"> 
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">


<!-- Load an icon library to show a hamburger menu (bars) on small screens -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel = "stylesheet" href = "css/menubar.css">
<link rel = "stylesheet" href = "css/style.css"
</head>
<!--<body style="background-color:white" onresize="loadfunc()"> -->
<body style="background-color:white">

<div class="header">
 <a href="index.php"><img class="sticky1" style="float:left;" src="images/unnamed3.png"></img> </a>

<div class="sticky">
     <ul class="ul">
		
		<!--  <div class="topnav2" id="myTopnav">  -->
	    <div class="topnav2" id="myTopnav">
		<b href="javascript:void(0);" class="icon" onclick="myFunction()">
       <i id="bars" class="fa fa-bars" onclick="myFunction()"></i></b>
	   
	   
		<div class="dropdown1">
		 <li class="li"><a class="active" id="href1"><div id="menuname1"></div></a></li>
		 
		 <div class="dropdown-content1" id="myDropdown">
		 <li class="li"><a class="lia"id="href2"><div id="menuname2"></div></a></li>
		<li class="li"><a class="lia" id="href3"><div id="menuname3"></div></a></li>
      
	<!--  <li><a>Contact</a></li>
		<li><a>About</a></li>   -->
	   </div>
        </div>
		</div>
     </ul>
</div>
</div>

<br><br>

<div class="givemargin" >
<div id="menunamebr"></div>
   

     <div class="indexwrapper" >
	   <center>
	      <h1>Login Form</h1>
	   <!--   <img src="images/login.jpg" class="login"/>   -->
	    </center>
		<br>
		<form class="myform" action="login.php" method = "post">
        <!--   <label ><b>Email or Phone No.:</b></label><br>  -->
		   <input id="indextext" style="height:34px;" name="user" type="text" placeholder="Type your E-mail or Phone No." required/><br>
		       <br>
		<!--   <label ><b>Password:</b></label><br>   -->
		   <input id="indextext" style="height:34px;" name="password" type="password" placeholder="Type your password" required/><br>
		   <input name="login" style="cursor:pointer;" type="submit" id="login_btn" value="Login"/><br>
		   <a href="register.php"><input type="button" style="cursor:pointer;" id="register_btn" value="Register"/></a>
        </form>
		
	 </div>
	 
	 </div>
	 <?php
	 
	        
			  if(isset($_SESSION['user_id']))
	           {
					header('location:homepage2.php');
				}
				else
				{
					
					
					//echo isset($_GET['preview']);
	   
	          if(isset($_POST['login']))
			 {
				 //echo '<script type="text/javascript"> alert("Sign up button clicked") </script>';
			 
			    
			 
			      if(isset($_SESSION['preview']))
					{
						
					    $user = mysqli_real_escape_string($con,$_POST['user']);
			             $password = mysqli_real_escape_string($con,$_POST['password']);
			       //$cpassword = $_GET['cpassword'];
			             $query="Select * from registeration where (user_mail='$user' and password='$password') or (user_mobile='$user' and password='$password');";
			         $query_run = mysqli_query($con,$query);
			    
			       if(mysqli_num_rows($query_run)>0)
				    {
					  $row = mysqli_fetch_assoc($query_run);
					   //valid
					   if(mysqli_real_escape_string($con,$row['active'])==0)
					   {
						   echo "Please activate your account first by clicking on the link sent to your e-mail account.";
					   }else
					   {
					  $_SESSION['user_id']=mysqli_real_escape_string($con,$row['user_id']);
					  $_SESSION['name']=mysqli_real_escape_string($con,$row['name']);
					  $_SESSION['user_mail']=mysqli_real_escape_string($con,$row['user_mail']);
					  $_SESSION['user_mobile']=mysqli_real_escape_string($con,$row['user_mobile']);
					  $_SESSION['password']=mysqli_real_escape_string($con,$row['password']);
					  $_SESSION['clg_id']=mysqli_real_escape_string($con,$row['clg_id']);
					  $_SESSION['time']=mysqli_real_escape_string($con,$row['time']);
					
					if($_SESSION['clg_id']!=NULL)
					{
					$sclg_id = mysqli_real_escape_string($con,$_SESSION['clg_id']);
					
					  $query="Select * from clg_details where clg_id='$sclg_id'";
					  
					     $query_run = mysqli_query($con,$query);
					     $row = mysqli_fetch_assoc($query_run);
					     $_SESSION['clg_name']=mysqli_real_escape_string($con,$row['clg_name']);
					     $_SESSION['clg_dept']=mysqli_real_escape_string($con,$row['clg_department']);
					     $_SESSION['clg_course']=mysqli_real_escape_string($con,$row['clg_course']);
					     $_SESSION['clg_year']=mysqli_real_escape_string($con,$row['clg_year']);
					}
						
						 header('location:adpreview2.php');
					/*	echo '<form action="adpreview2.php" method="GET">';
						  echo '<input name="preview" type="hidden" value="'.( $_GET['preview'] ).'" />';
							//  echo'<center><a href="login.php"><input style="width:100%; padding:20px; margin-right:20px;" type="button" id="back_btn" value="Login To Chat"/></a></center>'; 
							  echo "</form>";   */
					   }
					  }
					}
					else{
			 
			   $user = mysqli_real_escape_string($con,$_POST['user']);
			   $password = mysqli_real_escape_string($con,$_POST['password']);
			   //$cpassword = $_GET['cpassword'];
			   $query="Select * from registeration where (user_mail='$user' and password='$password') or (user_mobile='$user' and password='$password');";
			   $query_run = mysqli_query($con,$query);
			   
			   if(mysqli_num_rows($query_run)>0)
				 {
					 $row = mysqli_fetch_assoc($query_run);
					 
					  if(mysqli_real_escape_string($con,$row['active'])==0)
					   {
						   echo "Please activate your account first by clicking on the link sent to your e-mail account.";
					   }else
					   {
					//valid
					$_SESSION['user_id']=mysqli_real_escape_string($con,$row['user_id']);
					$_SESSION['name']=mysqli_real_escape_string($con,$row['name']);
					$_SESSION['user_mail']=mysqli_real_escape_string($con,$row['user_mail']);
					$_SESSION['user_mobile']=mysqli_real_escape_string($con,$row['user_mobile']);
					$_SESSION['password']=mysqli_real_escape_string($con,$row['password']);
					$_SESSION['clg_id']=mysqli_real_escape_string($con,$row['clg_id']);
					$_SESSION['time']=mysqli_real_escape_string($con,$row['time']);
					
					if($_SESSION['clg_id']!=NULL)
					{
					   $query="Select * from clg_details where clg_id='{$_SESSION['clg_id']}'";
					   $query_run = mysqli_query($con,$query);
					   $row = mysqli_fetch_assoc($query_run);
					   $_SESSION['clg_name']=mysqli_real_escape_string($con,$row['clg_name']);
					   $_SESSION['clg_dept']=mysqli_real_escape_string($con,$row['clg_department']);
					   $_SESSION['clg_course']=mysqli_real_escape_string($con,$row['clg_course']);
					   $_SESSION['clg_year']=mysqli_real_escape_string($con,$row['clg_year']);
					}
					
					header('location:adview.php');
				   }
					
				 }else{
					 
					  echo '<script type="text/javascript"> alert("Invalid Credentials") </script>';
				 
				    }  
	             }  
			  }   
			}	 
     ?>
	 
	 <!-- Footer -->
	 
	 
	 <!-- Footer -->
	 
	 <br>
	 
	 
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

	 
	<!-- <div id="demo"></div>  -->
	 
	  <script>
                 var txt = "";
                 txt += "<p>Inner width/height: " + window.innerWidth + "*" + window.innerHeight + "</p>";
                 txt += "<p>Outer width/height: " + window.outerWidth + "*" + window.outerHeight + "</p>";

                 document.getElementById("demo").innerHTML = txt;
				 
				 
				 
            </script>
			
		<!--	<script>
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

<script>

            

				if(window.innerWidth<=1147)
				{
					var menbr=document.getElementById("menunamebr");
					menbr.innerHTML = "<br><br><br><br><br>";
					var menuname1=document.getElementById("menuname1");
					menuname1.innerHTML = "Login";
					var href1=document.getElementById("href1");
					href1.href="login.php";
					var menuname2=document.getElementById("menuname2");
					menuname2.innerHTML = "Home";
					var href2=document.getElementById("href2");
					href2.href="index.php";
					var menuname3=document.getElementById("menuname3");
					menuname3.innerHTML = "Register";
					var href3=document.getElementById("href3");
					href3.href="register.php";
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
					
					var menuname3=document.getElementById("menuname3");
					menuname3.innerHTML = "Login";
					var href3=document.getElementById("href3");
					href3.href="login.php";
					href3.classList.add('active');
				}
			
			
			</script>
			
			<script>
			
			     function loadfunc()
				 {
					 
					// location.reload();
				 }
			
			</script>

     
</body>
</html>