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
<!--  <body style="background-color:#7f8c8d">   -->
<body style="background-color:white"> 
<a href="index.php"><img class="sticky1" src="images/unnamed3.png" style="float:left;" ></img></a>

<div class="sticky">
     <ul class="ul">
	    
		
		<!--  <div class="topnav2" id="myTopnav">  -->
	    <div class="topnav2" id="myTopnav">
		<b href="javascript:void(0);" class="icon" onclick="myFunction()">
       <i id="bars" class="fa fa-bars" onclick="myFunction()"></i></b>
	   
	   <div class="dropdown1">
	   <li class="li"><a class="active" style="padding: 15px 55px;" href="adview.php">Dashboard</a></li>
		
		
		<div class="dropdown-content1" id="myDropdown">
		<li class="li"><a class="lia" href="homepage2.php">Home</a></li>
		<li class="li"><a class="lia" href="clgdetails.php">College Details</a></li>
		<li class="li"><a class="lia" href="adsubmit.php">Submit Ad</a></li>
		
		<li class="li"><a class="lia" href="chatlist.php">Messages</a></li>
		<li class="li"><a class="lia" href="settings.php">Settings</a></li>
		
        <li class="li"><a class="lia"><form method="post"><input name="logout" type="submit" id="logout" value="Log Out"/></form></a></li>
		   </div>
		   </div>
		   </div>
     </ul>
</div>

<br><br><br><br><br><br><br>

     <div id = "main-wrapper2"  style="width:75%;background-color:white;">
	   <center>
	      <h1>Your Ads</h1>
		  
		  
	      
	    </center>
		<br>
		<form class="myform" action="adview.php" method = "post">
           
		   
		   
        </form>
		
		<?php
		
		        
		
		   
		
		      if(isset($_SESSION['user_id']))
				{
					
					if(isset($_POST['logout']))
			       {
		           session_destroy();
                   header('location:login.php');				   
			       }
				   
				   if(isset($_POST['preview']))
					{
						
						$prev = mysqli_real_escape_string($con,$_POST['preview']);
						$delquery = " DELETE FROM ad_submit WHERE ad_id='$prev'";
						$delresult = mysqli_query($con,$delquery);
					}
				   
					
					$suser_id = mysqli_real_escape_string($con,$_SESSION['user_id']);
					$result = mysqli_query($con,"Select * from ad_submit where user_id ='$suser_id'");
					
					$i=1;
					
					$sclg_id = mysqli_real_escape_string($con,$_SESSION['clg_id']);
					$query="Select * from clg_details where clg_id='$sclg_id '";
					   $query_run = mysqli_query($con,$query);
					   $row = mysqli_fetch_assoc($query_run);
					   $_SESSION['clg_name']=$row['clg_name'];
					   $_SESSION['clg_dept']=$row['clg_department'];
					   $_SESSION['clg_course']=$row['clg_course'];
					   $_SESSION['clg_year']=$row['clg_year'];
					
					
				//	echo '<form action="adpreview2.php" method="POST">';
					 if(mysqli_num_rows($result)>0)
				       {
				 /*	echo "<table >";
					echo "<tr>";
						echo "<td>";
						echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						echo "<h3>No.</h3>";
						echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						echo "</td>";
						
						echo "<td>";
						echo "<h3>Image</h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						echo "</td>";
						
						echo "<td>";
						echo "<h3>Ad Title</h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						echo "</td>";
						
						echo "<td>";
						echo "<h3>Category</h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						echo "</td>";
						
						echo "<td>";
						echo "<h3>Views</h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						echo "</td>";
						
						echo "<td>";
						echo "<h3>Date</h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						echo "</td>"; */
						
					while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
					{
						//echo '<form action="adpreview2.php" method="post">';
						
						echo '<form name="searchform'.$i.'" action="adpreview2.php" method="post">';
						  echo '<div  style="" class="row">';
						    echo '<div onClick="document.forms[\'searchform'.$i.'\'].submit();" style="cursor:pointer;margin-left:10px;background-color:lightgreen;" class="column" >';
							/*echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['photo_id'] ).'"/>'; */
							echo '<h3 style="float:left;margin-left:10px;">'.$i.')</h3>'; 
							echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					        echo '<img style="float:left;margin-left:30px;" src="'.( $row['photo_id'] ).'"  height="100px" width="100px" onerror=this.src="images/ad.jpg" />';
						    
							echo '<h2 style="float:left;margin-left:20px;">'.$row['ad_title'].'</h2>';
							echo '<br><br>';
						    echo '<p style="float:left;margin-left:20px;">'. $row['time'].'</p>';
							
							$rprod_id=mysqli_real_escape_string($con,$row['prod_id']);
							$result2 = mysqli_query($con,"Select price from book_details where book_id ='$rprod_id'");
							$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
						    echo '<h3 style="float:right;">Rs.'.$row2['price'].'</h3>';
							echo '<input name="preview" type="hidden" value="'.( $row['ad_id'] ).'" />'; 
						
						/*    echo '<input style="width:10%;cursor:pointer;" name="prevbtn" type="submit" id="back_btn" value="Preview" ) " />'; */
						    echo '</div>';
							
							
						/*echo "<tr>";
						echo "<td >";
						echo "&nbsp;&nbsp;&nbsp;&nbsp;";
						echo $i++;
						echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						echo "</td>";
						echo "<td>";
                       // echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['photo_id'] ).'"/>';
					   echo '<img src="'.( $row['photo_id'] ).'" height="100px" width="100px" />';
					   
					   echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					   echo "</td>";
						echo "<td>";
						echo $row['ad_title'];
						echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						echo "</td>";
						echo "<td>";
						
						echo $row['category'];
						echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						echo "</td>";
						echo "<td>";
						echo $row['views'];
						echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						echo "</td>";
						echo "<td>";
						echo $row['time'];
						echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						echo "</td>";
						
						echo "<td>";
						echo '<input name="preview" type="hidden" value="'.( $row['ad_id'] ).'" />'; 
						echo '<input style="width:100%;cursor:pointer;" name="prevbtn" type="submit" id="back_btn" value="Preview" ) " />';
						echo "</td>";
						echo "</tr>"; */
						
						echo '</div>';
						echo "</form>";
						echo '<form name="searchform2'.$i.'" action="adview.php" method="post">';
							echo '<div onClick="document.forms[\'searchform2'.($i++).'\'].submit();" style="cursor:pointer;background-color:lightgreen;"  >';
							echo '<input name="preview" type="hidden" value="'.( $row['ad_id'] ).'" />';
							echo '<input  style="margin-left:400px;margin-bottom:10px;" type="submit" value="Delete" />';
							
							echo '</div>';
						    echo '</form>'; 
						  echo '<br>';
                    }
				//	echo "</table>";
				//	echo "<br><br><br>";
				//	echo "</form>";
			      }
				  else{
					  
					  echo "No ads to display";
					  echo "<br><br>";
				  }
					
				}
                else
               {
				   header('location:index.php');
			   }
		
		       
		
		?>
		
		<div id="demo2"></div>  
			 
			 <script>
	    document.getElementById("demo2").innerHTML = "<p>.</p>";
	 </script>
		
	 </div>
	 
	 <br><br>
	 
	 
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

