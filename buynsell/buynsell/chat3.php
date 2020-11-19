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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
<body style="background-color:white" onload="mybar()"> 
<a href="index.php"><img class="sticky1" src="images/unnamed3.png" style="float:left;" ></img> </a>

<div class="sticky">
     <ul class="ul">
	    
		<!--  <div class="topnav2" id="myTopnav">  -->
	    <div class="topnav2" id="myTopnav">
		 <b href="javascript:void(0);" class="icon" onclick="myFunction()">
         <i id="bars" class="fa fa-bars" onclick="myFunction()"></i></b>
		
		<div class="dropdown1">
		<li class="li"><a id="href1" href="chatlist.php">Messages</a></li>
		
		
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

     <div id = "main-wrapper" style="width:75%;background-color:lightblue;">
	   <center>
	      <h1>Chat</h1> 
		</center>
		
		<br>
		
		
		<?php
		
		//echo $_SESSION['user_id'];
		
		
		
		      if($_SESSION['user_id'])
				{
					
					
					if(isset($_POST['roomid']) && isset($_POST['client']))
		            {
			               $_SESSION['roomid']=$_POST['roomid'];
						   $_SESSION['client']=$_POST['client'];
						   
		            }
					
					
					if(!isset($_SESSION['roomid']) || !isset($_SESSION['client']))
		            {
			               header('location:adview.php');
		            }
					else
					{
						$sroomid = mysqli_real_escape_string($con,$_SESSION['roomid']);
						$sclient = mysqli_real_escape_string($con,$_SESSION['client']);
					}
		
					
					if(isset($_POST['entermessage']) && !empty($_POST['message']))
					{
						$message= $_POST['message'];
						
						     //   $sroomid = mysqli_real_escape_string($con,$_SESSION['roomid']);
								
								$query4="select * from chatroom where roomid='$sroomid'";  
								$query_run4 = mysqli_query($con,$query4);
								
								if(mysqli_num_rows($query_run4)>0)
				               {
								 $row4 = mysqli_fetch_array($query_run4, MYSQLI_ASSOC);
							
								if($_SESSION['user_id']==$row4['client1'])
								{
								 $query2="Insert into chat(`roomid`, `message`,`flag`) values('$sroomid','$message','0');";
								}
								else if($_SESSION['user_id']==$row4['client2'])
								{
									$query2="Insert into chat(`roomid`, `message`,`flag`) values('$sroomid','$message','1');";
								}
								
								// $query2="Insert into chat(`roomid`, `message`) values('{$_SESSION['roomid']}','$message');";
					             $query_run2 = mysqli_query($con,$query2);
							   }
								 
							$_POST['message']='';
					}
						
						
					   
				}
				else
               {
				   header('location:index.php');
			   }
		
		          if(isset($_POST['logout']))
			       {
		           session_destroy();
                   header('location:index.php');				   
			       }
		
		?>
		
		
		
		
		
		
	<!--	<iframe src="chatframe.php" id="frame" style="margin-left:100px;margin-bottom:30px;border:4px solid #d35400;" height="100" width="850" ></iframe>  -->
		
	<!--	<div style="padding:8px;margin-left:100px;margin-bottom:30px;height:150px;width:850px;border:solid 2px #d35400;overflow:auto;overflow-x:scroll;overflow-y:scroll;">   -->
		<div id="frame" onload="mybar()">
		
		
		<?php
		
		//echo $_SESSION['user_id'];
		
		//echo $_SESSION['roomid'];
		//echo $_SESSION['client'];
		
		    /*  if($_SESSION['user_id'])
				{
					$query="Select * from  chat where roomid='$sroomid';";
					$query_run = mysqli_query($con,$query);
					
					$query2="Select * from  chatroom where roomid='$sroomid';";
					$query_run2 = mysqli_query($con,$query2);
					

					
					if(mysqli_num_rows($query_run2)>0 )
					{
						$row1 = mysqli_fetch_array($query_run2, MYSQLI_ASSOC);
						$rclient1 = mysqli_real_escape_string($con,$row1['client1']);
						$rclient2 = mysqli_real_escape_string($con,$row1['client2']);
					}
					
					
				 
				 if(mysqli_num_rows($query_run)>0 )
				 {
					  while ($row = mysqli_fetch_array($query_run, MYSQLI_ASSOC)) 
					{
						if($row['flag']==0)
						{
							if($row1['client1']!=$_SESSION['user_id'])
							{
							   $query3="Select * from  registeration where user_id='$rclient1';";
							   $point=0;
							}
							else
							{
								$point=1;
							}
						}
						else if($row['flag']==1)
						{
							if($row1['client2']!=$_SESSION['user_id'])							
							{
							     $query3="Select * from  registeration where user_id='$rclient2';";
								 $point=0;
							}
							else
							{
								$point=1;
							}
						}
					
					if($point==0)							
				    {	
					    $query_run3 = mysqli_query($con,$query3);
					}
					
					if($point==0 && mysqli_num_rows($query_run3)>0 )
					{
						$row2 = mysqli_fetch_array($query_run3, MYSQLI_ASSOC);
						
					}
						
						echo '<span style="color:red;">';
						if($point==1)
						{
						   echo 'You'.' : ';
						}
						else
						{
							echo $row2['name'].' : ';
						}
						
						echo '</span>';
						echo $row['message'];
						echo "<br>";
					//	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					//	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
						echo '<span style="float:right">';
						echo $row['timestamp'];
						echo '</span>';
						echo "<br><br>";
					}
				 }
				}
				else
               {
				   header('location:index.php');
			   }
		           
		          */
		
		?> 
		</div>

		
		
		<form action="chat3.php" method="post" >
		
		
		
	<!--	<input name="name" style="width:60%;height:40px;margin-left:80px;" type="text" class="inputvalues" placeholder="Type your message here" required/> -->
		
	<!--	<input name="pricefrom" style="width:10%;height:50px;" type="number" class="inputvalues" placeholder="Price From" />
		<input name="priceto" style="width:10%;height:50px;" type="number" class="inputvalues" placeholder="Price To" />  -->
		
					   
					   
					   <textarea name="message" id="chat2" placeholder="Enter Your Message Here" ></textarea>
		
		
		       <input style="width:100px;height:50px;margin-left:20px;margin-bottom:50px;cursor:pointer;" name="entermessage" type="submit" id="back_btn" onclick="mybar()" value="Enter"/>
			   
		</form>
		
		
		
		
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

          </div>          <!-- Grid column -->

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
		
		
	<!--	<div id="demo"></div>  
	 
	  <script>
                 var txt = "";
                 txt += "<p>Inner width/height: " + window.innerWidth + "*" + window.innerHeight + "</p>";
                 txt += "<p>Outer width/height: " + window.outerWidth + "*" + window.outerHeight + "</p>";

                 document.getElementById("demo").innerHTML = txt;
				 
				 
				 
            </script> -->

    
	 
	 <script type="text/javascript" language="javascript">
            
				$(document).ready(function() { /// Wait till page is loaded
                        setInterval(timingLoad, 200);
					//	setInterval(timingLoad2, 100);
					
				//	timingLoad2();
                             function timingLoad() {
                              $('#frame').load('chatreload.php');
							  
                                     }
                                     
                                     function mybar()
                                     {
									 
									    setTimeout(timingLoad2, 600);
                                     }
									 
							  function timingLoad2() {
								  
								  var objDiv = document.getElementById("frame");
                               objDiv.scrollTop = objDiv.scrollHeight;
							  }
                                    }); //// End of Wait till page is loaded
       </script>
	   
	    <script> 
		
		function mybar()
                                     {
									 
									    setTimeout(timingLoad2, 600);
                                     }
									 
							  function timingLoad2() {
								  
								  var objDiv = document.getElementById("frame");
                               objDiv.scrollTop = objDiv.scrollHeight;
							  }
	 
	 var objDiv = document.getElementById("frame");
     objDiv.scrollTop = objDiv.scrollHeight;
	  //   var elem = document.getElementById('frame');
      //   elem.scrollTop = elem.scrollHeight;
	  
	 // $('frame').scrollTop($('frame')[0].scrollHeight);
	 
	/* $(window).load(function ()
      {
    var $contents = $('#frame').contents();
    $contents.scrollTop($contents.height());
     });   */
	 
	 </script>
	 
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