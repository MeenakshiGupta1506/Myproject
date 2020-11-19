<?php
      // header('Cache-Control: no cache'); //no cache
      // session_cache_limiter('private_no_expire');
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
<link rel = "stylesheet" href = "css/loginmenubar.css">
<link rel = "stylesheet" href = "css/style.css">
</head>
<body style="background-color:white"> 
<a href="index.php"><img class="sticky1" src="images/unnamed3.png" style="float:left;" ></img></a>

<div class="sticky">
     <ul class="ul">
	 
	     <!--  <div class="topnav2" id="myTopnav">  -->
	    <div class="topnav2" id="myTopnav">
		<b href="javascript:void(0);" class="icon" onclick="myFunction()">
       <i id="bars" class="fa fa-bars" onclick="myFunction()"></i></b>
	    
		<div class="dropdown1">
		<li class="li"><a class="active" style="padding: 15px 57px;" href="chatlist.php">Messages</a></li>
		
		<div class="dropdown-content1" id="myDropdown">
		<li class="li"><a class="lia" href="homepage2.php">Home</a></li>
		<li class="li"><a class="lia" href="adview.php">Dashboard</a></li>
		<li class="li"><a class="lia" href="clgdetails.php">College Details</a></li>
		<li class="li"><a class="lia" href="adsubmit.php">Submit Ad</a></li>
		
		<li class="li"><a class="lia" href="settings.php">Settings</a></li>
		
	
		<li class="li"><a class="lia"><form method="post"><input name="logout" type="submit" id="logout" value="Log Out"/></form></a></li>
		   
		   </div>
		   </div>
		   </div>
		   
     </ul>
</div>

      <br><br><br><br><br><br><br>

     <div id = "main-wrapper2" style="width:75%;background-color:#ffff66;">
	   <center>
	      <h1>Chat List</h1> 
		</center>
		
		
		<br>
		
		<?php
	 
	         if(isset($_SESSION['user_id']))
		     {
			 $query="Select * from chatroom where client1='{$_SESSION['user_id']}' or '{$_SESSION['user_id']}'=client2";
				 $query_run = mysqli_query($con,$query);
				 
				 if(mysqli_num_rows($query_run)>0)
				 {
				 
				    while ($row = mysqli_fetch_array($query_run, MYSQLI_ASSOC)) 
					{
				      echo '<div style="margin-left:4%;margin-bottom:30px;height:70px;width:90%;background-color:lightblue;">';
					  
					  if($_SESSION['user_id']==$row['client1'])
					  {
						  $client=$row['client2'];
						  $query1="Select * from registeration where user_id='{$row['client2']}';";
				          $query_run1 = mysqli_query($con,$query1);
					  }
					  else if($_SESSION['user_id']==$row['client2'])
					  {
						  $client=$row['client1'];
						  $query1="Select * from registeration where user_id='{$row['client1']}';";
				          $query_run1 = mysqli_query($con,$query1);
					  }
					  
					  if(mysqli_num_rows($query_run1)>0)
				      {
						  $row1 = mysqli_fetch_array($query_run1, MYSQLI_ASSOC);
						  echo '<div style="padding:30px;padding-left:80px;">';
						  echo '<span style="font-size:30px;"">';
						  echo '<font id="messagename" size="5">'.$row1['name'].':</font>';
						  echo '</span>';
						  echo '<form action="chat3.php" method="post">';
						  
						  echo '<input name="prevbtn" type="submit" id="messagebtn" value="Open Chat" ) " />';
						  echo '<input name="roomid" type="hidden" value="'.( $row['roomid'] ).'" />'; 
						  echo '<input name="client" type="hidden" value="'.( $client ).'" />'; 
						  
						  echo '</form>';
						  echo '</div>';
					  }
					  
				      
				      echo '</div>';
					  echo '</br>';
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
		
	 </div>
	 
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