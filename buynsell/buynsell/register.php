<?php
      require 'dbconfig/config.php';
	  require_once 'phpmailer/PHPMailerAutoload.php';
	  session_start();
?>

<!DOCTYPE html>
<html>
<head>

  
  
<title>Sellgood Registeration</title>

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
<link rel = "stylesheet" href = "css/style.css">


</head>
<body style="background-color:white"> 

<div class="header">
<a href="index.php"><img class="sticky1" src="images/unnamed3.png" style="float:left;" ></img></a>

<div class="sticky">
     <ul class="ul">
	    
		<!--  <div class="topnav2" id="myTopnav">  -->
	    <div class="topnav2" id="myTopnav">
		<b href="javascript:void(0);" class="icon" onclick="myFunction()">
       <i id="bars" class="fa fa-bars" onclick="myFunction()"></i></b>
	   
	   <div class="dropdown1">
		<li class="li"><a id="href1" style="padding:15px 54px;" class="active"><div id="menuname1"></div></a></li>
		
		<div class="dropdown-content1" id="myDropdown">
		
		<li class="li"><a class="lia" id="href2"><div id="menuname2"></div></a></li>
      <li class="li"><a class="lia" id="href3"><div id="menuname3"></div></a></li>
	 
	  </div>
	  </div>
	  </div>
        
     </ul>
</div>
</div>

<br>

<div class="givemargin" >
<div id="menunamebr"></div>
    
   <form class="myform" name="form1" action="register.php" method="post" enctype="multipart/form-data" >
     <div class="regwrapper" >
	   <center>
	      <h1>Registeration Form</h1>
	    <!-- <img id="uploadPreview" src="images/register1.png" class="login"/><br>  -->
		<!--  <input type="file" id="imagelink" name="imagelink" accept=".jpg,.jpeg,.png" onchange="PreviewImage();"/>  -->
	    </center>
		
		<br>
        <!--   <label class="inputvalues"><b>Name:</b></label><br>  -->
		   <input name="name" style="height:34px;" type="text" id="regtext" placeholder="Type your Full Name" required/><br>
		       <br>
		<!--	   <label class="inputvalues"><b>E-Mail:</b></label><br>  -->
		   <input name="email" style="height:34px;" type="text" id="regtext" class="inputvalues" placeholder="Type your E-mail" onblur="ValidateEmail(document.form1.email)" required/>
		   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label id ="inv" style="visibility:hidden;color:red;">invalid email address!</label><br>
		       
		<!--	   <label class="inputvalues"><b>Phone No.:</b></label><br> -->
		   <input name="phoneno" style="height:34px;" type="text" id="regtext" class="inputvalues" placeholder="Type your Phone No." required/><br>
		       <br>
		<!--   <label class="inputvalues"><b>Password:</b></label><br>  -->
		   <input name="password" style="height:34px;" type="password" id="regtext" class="inputvalues" placeholder="Type your password" required/>
		   <br><br>
		<!--   <label class="inputvalues"><b>Confirm Password:</b></label><br>  -->
		   <input name="cpassword" style="height:34px;" type="password" id="regtext" class="inputvalues" placeholder="Confirm password" required/><br><br>
		   <input name="submit_btn" style="cursor:pointer;" type="submit" id="signup_btn" value="Sign Up" /><br>
		  <!-- <a href="login.php"><input style="cursor:pointer;" type="button" id="back_btn" value="<< Back"/></a> -->
    </form>
	
	<script type="text/javascript">

      function ValidateEmail(inputText)
     {
         var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
         if(inputText.value.match(mailformat))
        {
          // document.form1.email.focus();
		  document.getElementById("inv").style.visibility = "hidden";
             return true;
        }
        else
        {
			
           document.getElementById("inv").style.visibility = "visible";
           document.form1.email.focus();
            return false;
        }
     }  

     </script>
		
		<?php
		
		echo isset($_SESSION['user_id']);
		if(isset($_SESSION['user_id']))
	           {
					header('location:homepage2.php');
				}
		
		
		     else if(isset($_POST['submit_btn']))
			 {
				 //echo '<script type="text/javascript"> alert("Sign up button clicked") </script>';
			 
			   $name = mysqli_real_escape_string($con,$_POST['name']);
			   $email= mysqli_real_escape_string($con,$_POST['email']);
			   $phoneno= mysqli_real_escape_string($con,$_POST['phoneno']);
			   $password = mysqli_real_escape_string($con,$_POST['password']);
			   $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);
			 
			   
			   
			   if($password==$cpassword)
			   {
				 $query="Select * from registeration where user_mail='$email' or user_mobile='$phoneno';";
				 $query_run = mysqli_query($con,$query);
				 
				 if(mysqli_num_rows($query_run)>0)
				 {
					 // there is already a user with the same username
					 
					 echo '<script type="text/javascript"> alert("User with same Email or Phone already exists ...... Try another Email or Phone") </script>';
				 }
				 
				 
				 else{
					 
					   $hash = md5( rand(0,1000) );
					   
					   $query="Insert into registeration(`name`, `user_mail`, `user_mobile`, `password`,`hash`) values('$name','$email','$phoneno','$password','$hash');";
					   $query_run = mysqli_query($con,$query);
					   
					   if($query_run)
					   {
						   
						 //  echo '<script type="text/javascript"> alert("Your account has been made, please verify it by clicking the activation link that has been send to your email. Also check your spam folder.") </script>';
						   //header('location:login.php');
						   
						 /*  $to      = $email; // Send email to our user
						   $subject = 'Signup | Verification'; // Give the email a subject 
						   $message = '
						   Thanks for signing up!
                           
 
                            Please click this link to activate your account:
                            http://www.sellgood.in/verify.php?email='.$email.'&hash='.$hash; // Our message above including the link
							
							$headers = 'From:sellgood.in@gmail.com' . "\r\n"; // Set from headers
							$headers .= "Reply-To: sellgood.in@gmail.com\r\n";
                            $headers .= "Return-Path: sellgood.in@gmail.com\r\n";
                             mail($to, $subject, $message, $headers); // Send our email */
							 
							/* $mail=new PHPMailer();
                             $mail->isSMTP();
                             $mail->Host='mail.sellgood.in';
                             $mail->Port=587;
                             $mail->SMTPAuth=true;
                             $mail->SMTPSecure='tls';
                             $mail->Username='admin@sellgood.in';//your account
                             $mail->Password ='4mgnaaak12'; 	//your password
                              $mail->setFrom('sellgood.in@gmail.com','Sellgood');
                              $mail->addAddress($email);
                              $mail->addReplyTo('sellgood.in@gmail.com');   */
							  
							  $mail=new PHPMailer();
                              $mail->isSMTP();
                              $mail->Host='smtp.gmail.com';
                              $mail->Port=587;
                              $mail->SMTPAuth=true;
                              $mail->SMTPSecure='tls';
                              $mail->Username='sellgood.in@gmail.com';//your account
                              $mail->Password ='%4mgnaaak12$'; 	//your password
                              $mail->setFrom('sellgood.in@gmail.com','Sellgood');
                              $mail->addAddress($email);
							  $mail->addReplyTo('sellgood.in@gmail.com');
							  
							  
							  
                             /* for ($i = 0; $i < count($_FILES["file"]["tmp_name"]); $i++) {

                                          $mail->addAttachment($_FILES["file"]["tmp_name"][$i], $_FILES["file"]["name"][$i]);
                                       } */
                               $mail->isHTML(true);
                               $mail->Subject='Signup | Verification';
							   
							   $message = 'Thanks for signing up!
							   Please click this link to activate your account:http://www.sellgood.in/verify.php?email='.$email.'&hash='.$hash; // Our message above including the link
                               $mail->Body=$message;
                               if($mail->send())
                               {
                                          // echo '<script>alert("Message has been sent successfully..");</script>';
										  echo '<script type="text/javascript"> alert("Your account has been made, please verify it by clicking the activation link that has been send to your email. Also check your spam folder.") </script>';
										  
                                }
                                else {
                                        echo '<script>alert("something went wrong...");</script>';
                                    }
						   
						   
					   }else{
						   
						   echo '<script type="text/javascript"> alert("Error !!") </script>';
						   
					   }
					 
				 }
				 
			  }else{
				 
				        echo '<script type="text/javascript"> alert("Password and Confirm password do not match !!") </script>';
				 }
			}
			
		?>
		
	 </div>
	 </div>
	 
	 	 <!-- Footer -->
	 
	 
	 <!-- Footer -->
	 
	 
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
	 
	<!-- <div id="demo"></div> 
	 
	  <script>
                 var txt = "";
                 txt += "<p>Inner width/height: " + window.innerWidth + "*" + window.innerHeight + "</p>";
                 txt += "<p>Outer width/height: " + window.outerWidth + "*" + window.outerHeight + "</p>";

                 document.getElementById("demo").innerHTML = txt;
				 
				 
				 
            </script>  -->
	 
	<!-- <script>
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
					var menbr=document.getElementById("menunamebr");
					menbr.innerHTML = "<br><br><br><br>";
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
					// location.reload();
				 }
			
			</script>

     
</body>
</html>

