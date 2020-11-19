<?php
       header('Cache-Control: no cache'); //no cache
       session_cache_limiter('private_no_expire');
       session_start();
	   require 'dbconfig/config.php';
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
<link rel = "stylesheet" href = "css/menubar.css">
<link rel = "stylesheet" href = "css/style.css">
</head>
<body style="background-color:white"> 

<div class="header" >
<a href="index.php"><img class="sticky1" src="images/unnamed3.png" style="float:left;" ></img></a>

<div class="sticky">
     <ul class="ul">
	    
		
		<!--  <div class="topnav2" id="myTopnav">  -->
	   <div class="topnav2" id="myTopnav">
		<b href="javascript:void(0);" class="icon" onclick="myFunction()">
         <i id="bars" class="fa fa-bars" onclick="myFunction()"></i></b>
		 
		 <div class="dropdown1">
	     <li class="li"><a id="href1" href="index.php">Home</a></li>
		 
		 <div class="dropdown-content1" id="myDropdown">
		 <li class="li"><a class="lia" href="register.php">Register</a></li>
         <li class="li"><a class="lia" href="login.php">Login</a></li>
	  
	    </div>
		</div>
		</div>
        
     </ul>
</div>
</div>

     <br><br><br><br><br><br><br><br>

     <div id = "main-wrapper2" class="adprevwrap" style="padding-left:7%;width:75%;background-color:#00cc00;">
	  <!-- <center>
	      <h1>Ad Preview</h1>
		  </center>
		  
		  
		  
		  
		  
	      
	    </center>
		<br>
		-->
		
           
		   
		   
        
		
		<?php
		
		
		if(isset($_SESSION['user_id']))
	           {
					header('location:adpreview2.php');
				}
		
		      else 
				{
					
					
					
					
					if(isset($_POST['preview']))
					{
					   $_SESSION['preview']=$_POST['preview'];
					  // $spreview = mysqli_real_escape_string($con, $_SESSION['preview']);
					   $ppreview = mysqli_real_escape_string($con, $_POST['preview']);
					
					   $result = mysqli_query($con,"Select * from ad_submit where ad_id ='$ppreview'");
					}
					else
					{
						 $spreview = mysqli_real_escape_string($con, $_SESSION['preview']);
						$result = mysqli_query($con,"Select * from ad_submit where ad_id ='$spreview'");
					}
						
					
					$i=1;
					
					
					
					if(mysqli_num_rows($result)>0)
				       {
						   
						   
						   echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>";
						   
						   while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
					{
						
						echo "<h2>";
						echo '<font color="white">';
						echo $row['ad_title'];
						echo '</font>';
						echo "</h2>";
						 echo "<br>";echo "<br>";
						
						echo '<img style="float:left;" src="'.( $row['photo_id'] ).'" height="200px" width="200px" onerror=this.src="images/ad.jpg" />';
					//	echo "<br>";echo "<br>";
						
						//$user = $row['user_id'];
						$ruser_id = mysqli_real_escape_string($con, $row['user_id']);
						$result2 = mysqli_query($con,"Select * from registeration where user_id = '$ruser_id';");
						
						if(mysqli_num_rows($result2)>0)
				       {
						   
						   
						 //  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>";
						 echo "<br>";
						   
						   while ($row1 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) 
					      {
							  echo '<span style="float:right; margin-right:50px;">';
							  echo '<span style=" margin-left:10px;">';
							  echo '<img style="float:left;" src="images/user.png" height="80px" width="80px" />';
							  echo "<br><br>&nbsp;";
							  echo '<h3 style="float:left;">';
							  echo $row1['name'];
							  echo "</h3>";
							  echo '</span>';
							  echo '<form action="login.php" method="post">';
							  echo '<input name="preview" type="hidden" value="'.( $row['ad_id'] ).'" />';
							  echo'<center><input style="width:100%; padding:20px; margin-right:20px;cursor:pointer;" type="submit" id="back_btn" value="Login To Chat"/></center>'; 
							  echo "</form>";
							  echo '</span>';
						  }
					   }
						
						echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
						echo "<h3>";
						 echo "Category:";
						 echo "</h3>";
						 echo '<font color="white">';
						 echo $row['category'];
						 echo '</font>';
						 echo "<br>";echo "<br>";
						 
						 
						 $rprod_id = mysqli_real_escape_string($con, $row['prod_id']);
					$result1 = mysqli_query($con,"Select * from book_details where book_id='$rprod_id';");
						 
						 if(mysqli_num_rows($result1)>0)
				         {
							 
							  while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) 
					    {
						   echo "<h3>";
						 echo "Book Title:";
						 echo "</h3>";
						 echo '<font color="white">';
						 echo $row1['title'];
						 echo '</font>';
						 echo "<br>";echo "<br>";
						 
						 echo "<h3>";
						 echo "Book Subject:";
						 echo "</h3>";
						 echo '<font color="white">';
						 echo $row1['subject'];
						 echo '</font>';
						 echo "<br>";echo "<br>";
						 
						 echo "<h3>";
						 echo "Author:";
						 echo "</h3>";
						 echo '<font color="white">';
						 echo $row1['author'];
						 echo '</font>';
						 echo "<br>";echo "<br>";
						 
						 echo "<h3>";
						 echo "Publisher:";
						 echo "</h3>";
						 echo '<font color="white">';
						 echo $row1['publisher'];
						 echo '</font>';
						 echo "<br>";echo "<br>";
						 
						 
						}
						 
					   }
						 
						 echo "<h3>";
						 echo "Description:";
						 echo "</h3>";
						 echo '<font color="white">';
						 echo $row['description'];
						 echo '</font>';
						 echo "<br>";echo "<br>";
						 
						/* echo "<h3>";
						 echo "Views:";
						 echo "</h3>";
						 echo $row['views'];
						 echo "<br>";echo "<br>"; */
						 
						 echo "<h3>";
						 echo "Ad Date and Time:";
						 echo "</h3>";
						 echo '<font color="white">';
						 echo $row['time'];
						 echo '</font>';
						 echo "<br>";echo "<br>";
						 
						 $rclg_id = mysqli_real_escape_string($con, $row['clg_id']);
						 $result1 = mysqli_query($con,"Select * from clg_details where clg_id = '$rclg_id'");
						 
						 if(mysqli_num_rows($result1)>0)
				         {
							 
							  while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) 
					    {
						   echo "<h3>";
						 echo "Colege Name:";
						 echo "</h3>";
						 echo '<font color="white">';
						 echo $row1['clg_name'];
						 echo '</font>';
						 echo "<br>";echo "<br>";
						 
						 echo "<h3>";
						 echo "College Department:";
						 echo "</h3>";
						 echo '<font color="white">';
						 echo $row1['clg_department'];
						 echo '</font>';
						 echo "<br>";echo "<br>";
						 
						 echo "<h3>";
						 echo "College Course:";
						 echo "</h3>";
						 echo '<font color="white">';
						 echo $row1['clg_course'];
						 echo '</font>';
						 echo "<br>";echo "<br>";
						 
						 echo "<h3>";
						 echo "College Year:";
						 echo "</h3>";
						 echo '<font color="white">';
						 echo $row1['clg_year'];
						 echo '</font>';
						 echo "<br>";echo "<br>";
						 
						 
						}
						 
					   }
					   
					//   $result1 = mysqli_query($con,"Select * from registeration where user_id = '{$row['user_id']}';");
						 
						 if(mysqli_num_rows($result2)>0)
				         {
							 
							  while ($row1 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) 
					    {
						   echo "<h3>";
						 echo "User Mail:";
						 echo "</h3>";
						 echo '<font color="white">';
						 echo $row1['user_mail'];
						 echo '</font>';
						 echo "<br>";echo "<br>";
						 
						 echo "<h3>";
						 echo "User Mobile:";
						 echo "</h3>";
						 echo '<font color="white">';
						 echo $row1['user_mobile'];
						 echo '</font>';
						 echo "<br>";echo "<br>";
						 
						 echo "<h3>";
						 echo "Date and Time of Ad Creation:";
						 echo "</h3>";
						 echo '<font color="white">';
						 echo $row1['time'];
						 echo '</font>';
						 echo "<br>";echo "<br>";
						 
						 
						 
						 
						}
						 
					   }
						
					  }
						   
						   
					}
					
					
				}
                
		   
		?>
		
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

