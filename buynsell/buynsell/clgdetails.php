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
<link rel = "stylesheet" href = "css/style.css"
</head>
<body onload="myfunction()" style="background-color:white"> 
<a href="index.php"><img class="sticky1" src="images/unnamed3.png" style="float:left;" ></img></a>

<div class="sticky">
     <ul class="ul">
	    
		<!--  <div class="topnav2" id="myTopnav">  -->
	    <div id="bars" class="topnav2" id="myTopnav">
		<b href="javascript:void(0);" class="icon" onclick="myFunction()">
       <i id="bars" class="fa fa-bars" onclick="myFunction()"></i></b>
		
		<div class="dropdown1">
		<li class="li"><a class="active" href="clgdetails.php" style="padding: 15px 36px;">College Details</a></li>
		
		<div class="dropdown-content1" id="myDropdown">
		<li class="li"><a class="lia" href="homepage2.php">Home</a></li>
		<li class="li"><a class="lia" href="adview.php">Dashboard</a></li>
		
		<li class="li"><a class="lia" href="adsubmit.php">Submit Ad</a></li>
		<li class="li"><a class="lia" href="chatlist.php">Messages</a></li>
		<li class="li"><a class="lia" href="settings.php">Settings</a></li>
		
		
		
        <li><a ><form method="post"><input name="logout" type="submit" id="logout" value="Log Out"/></form></a></li>
		   
     </ul>
    </div>
	</div>
	</div>
	
	<?php 
		        
				if(!isset($_SESSION['user_id']))
				{
					header('location:index.php');
				}
    ?>
     <br><br><br><br><br><br><br>
    
   <form   class="myform" name="form1" action="clgdetails.php" method="post" enctype="multipart/form-data" >
     <div class="regwrapper">
	   <center>
	      <h1>College Details</h1>
	     <img id="uploadPreview" src="images/clg.jpg" class="login"/><br>
		<!--  <input type="file" id="imagelink" name="imagelink" accept=".jpg,.jpeg,.png" onchange="PreviewImage();"/>  -->
	    </center>
		
		<?php
		
		        if(isset($_POST['update_btn']))
				  {
					  $query="UPDATE `clg_details` SET `clg_name`='{$_POST['clgname']}',`clg_department`='{$_POST['dept']}',`clg_course`='{$_POST['course']}',`clg_year`='{$_POST['year']}' WHERE clg_id='{$_SESSION['clg_id']}'";
					   $query_run = mysqli_query($con,$query);
				  }
				
		        if($_SESSION['clg_id']==NULL)
				   {
					   echo '<script type="text/javascript"> alert("First Enter Your college details here then only submit an Ad") </script>';
				   }
				   else{ 
					   
					   $query="Select * from clg_details where clg_id='{$_SESSION['clg_id']}'";
					   $query_run = mysqli_query($con,$query);
					   $row = mysqli_fetch_assoc($query_run);
					   $_SESSION['clg_name']=$row['clg_name'];
					   $_SESSION['clg_dept']=$row['clg_department'];
					   $_SESSION['clg_course']=$row['clg_course'];
					   $_SESSION['clg_year']=$row['clg_year'];
					   
					  // echo $_SESSION['clg_name'];
				   }
		?>
		
		
		<br>
          <!-- <label style="color:black;"><b>College Name:</b></label><br> -->
		   <input name="clgname" id="regtext" type="text" style="height:34px;" class="inputvalues"  placeholder="Name" value="<?php  if($_SESSION['clg_id']!=NULL)echo $_SESSION['clg_name'] ?>" required/><br>
		       <br>
			<!--   <label><b>College Department:</b></label><br>  -->
		   <input name="dept" type="text" id="regtext" style="height:34px;" class="inputvalues" placeholder="Department" value="<?php  if($_SESSION['clg_id']!=NULL)echo $_SESSION['clg_dept'] ?>" required/>
		   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label id ="inv" style="visibility:hidden;color:red;">invalid email address!</label><br>
		       
			<!--   <label><b>College Course:</b></label><br>  -->
		   <input name="course" type="text" id="regtext" style="height:34px;" class="inputvalues" placeholder="Course" value="<?php  if($_SESSION['clg_id']!=NULL)echo $_SESSION['clg_course'] ?>" required/><br>
		       <br>
		<!--   <label class="inputvalues"><b>College Year:</b></label><br>  -->
		   <input name="year" type="number" id="regtext" style="height:34px;" class="inputvalues" placeholder="Year" value="<?php  if($_SESSION['clg_id']!=NULL)echo $_SESSION['clg_year'] ?>" required/>
		   <br><br>
		   <?php  if($_SESSION['clg_id']==NULL)   
		          {
		               echo '<input name="submit_btn" style="background-color:green;cursor:pointer;" type="submit" id="signup_btn" value="Submit" /><br>' ;
				  }	
				  else
				  {
					   echo '<input name="update_btn" style="background-color:green;cursor:pointer;" type="submit" id="signup_btn" value="Update" /><br>' ;
				  }

                  				  
			 ?>	  
		  
    </form>
	
	  
	
		  
		  <?php 
		        
				if(isset($_SESSION['user_id']))
				{
					
					if(isset($_POST['logout']))
			       {
		           session_destroy();
                   header('location:index.php');				   
			       }
					
					
				//	echo "{$_SESSION['clg_id']}<br>";
					
					//echo "{$_SESSION['clg_name']}";
					
					
					
				  if(isset($_POST['submit_btn']))
				  {
					$clgname = $_POST['clgname'];
					$dept = $_POST['dept'];
					$course = $_POST['course'];
					$year = $_POST['year'];
					
					
				   if($_SESSION['clg_id']==NULL)
				   {
					  // echo '<script type="text/javascript"> alert("First Enter Your college details here then only submit an Ad") </script>';
					   
					   $query="Select clg_id from clg_details where clg_name like '%{$clgname}%' and clg_department like '%{$dept}%' and clg_course like '%{$course}%' and clg_year like '%{$year}%'";
					   $query_run = mysqli_query($con,$query);
					   
					   if(mysqli_num_rows($query_run)>0)
				       {
						   $row = mysqli_fetch_assoc($query_run);
				           $clg_id = $row['clg_id'];
						   $query="Update registeration SET clg_id='$clg_id' where user_id='{$_SESSION['user_id']}'";
						   $query_run = mysqli_query($con,$query);
						   $_SESSION['clg_id']=$clg_id;
					   }
					   else
					   {
						   
					    $query="Insert into clg_details(`clg_name`, `clg_department`, `clg_course`, `clg_year`) values('$clgname','$dept','$course','$year') ";
					   $query_run = mysqli_query($con,$query);
						   $query2="Select max(clg_id) from clg_details";
					   $query_run2 = mysqli_query($con,$query2);
					   $row = mysqli_fetch_assoc($query_run2);
					   $clgid=$row['max(clg_id)'];
					   $query3="Update registeration SET clg_id='$clgid' where user_id='{$_SESSION['user_id']}'";
					   $query_run3 = mysqli_query($con,$query3);
					  // echo "{$_SESSION['clg_id']}<br>";
					   $_SESSION['clg_id']=$clgid;
					  // echo "{$_SESSION['clg_id']}<br>";
					   }
					   
					   header('location:adview.php');
				   }
                   else	
				   {  
			   
			            
					   
				   }
				  }
				}
                else
               {
				   header('location:index.php');
			   }
	        ?>
		  
		  </h2>
		  
	      
	    </center>
		<br>
		
		
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
			   
       </script>

     <script> 
					   
				/*	   function myfunction()
					   {
						   alert("Hello");
					      document.getElementById("name").value = "hello"; 
					      document.getElementById("dept").value = "<?php echo $dept  ?>"; 
					    document.getElementByName("course").value = "<?php echo $course  ?>"; 
					      document.getElementByName("year").value = "<?php echo $year  ?>";  
					   } */
					   
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

