<?php
      // header('Cache-Control: no cache'); //no cache
      // session_cache_limiter('private_no_expire');
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
    background-color:#555;
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

<title>Chat</title>
<link rel = "stylesheet" href = "css/style.css"
</head>
<body style="background-color:#7f8c8d"> 

<div class="sticky">
     <ul>
	    
		<li><a ><form method="GET"><input name="logout" type="submit" style="background-color:#27ae60;border-radius:10px;
	width:100%;height:30px;color:white;" value="Log Out"/></form></a></li>
		
		<li><a href="adsubmit.php">Submit Ad</a></li>
		<li><a href="clgdetails.php">College Details</a></li>
        <li><a href="adview.php">Dashboard</a></li>
        <li><a href="homepage2.php">Home</a></li>
		   
     </ul>
</div>



     <div id = "main-wrapper" style="width:1100px;background-color:white;">
	   <center>
	      <h1>Chat</h1> 
		</center>
		
		<br>
		
		<iframe src="chatframe.php" id="frame" style="margin-left:100px;margin-bottom:30px;border:4px solid #d35400;" height="100" width="850" ></iframe>
		
		<form action="chat2.php" method="GET" >
		
		
		
	<!--	<input name="name" style="width:60%;height:40px;margin-left:80px;" type="text" class="inputvalues" placeholder="Type your message here" required/> -->
		
	<!--	<input name="pricefrom" style="width:10%;height:50px;" type="number" class="inputvalues" placeholder="Price From" />
		<input name="priceto" style="width:10%;height:50px;" type="number" class="inputvalues" placeholder="Price To" />  -->
		
					   
					   
					   <textarea name="message" style="margin-left:100px;float:left;border:2px solid #4CAF50;" placeholder="Enter Your Message Here" rows="5" cols="100"></textarea>
		
		
		       <input style="width:100px;height:50px;margin-left:20px;margin-bottom:50px;" name="entermessage" type="submit" id="back_btn" value="Enter"/>
			   
		</form>
		
		<?php
		
		//echo $_SESSION['user_id'];
		
		      if($_SESSION['user_id'])
				{
					if(isset($_GET['entermessage']) && !empty($_GET['message']))
					{
						$message= $_GET['message'];
						
						
								
								 $query2="Insert into chat(`roomid`, `message`) values('{$_SESSION['roomid']}','$message');";
					             $query_run2 = mysqli_query($con,$query2);
								 
							$_GET['message']='';
					}
						
						
					   
				}
				else
               {
				   header('location:index.php');
			   }
		
		          if(isset($_GET['logout']))
			       {
		           session_destroy();
                   header('location:homepage.php');				   
			       }
		
		?>
		
		
		</div>

     <script> 
	 
	  //   var elem = document.getElementById('frame');
      //   elem.scrollTop = elem.scrollHeight;
	  
	 // $('frame').scrollTop($('frame')[0].scrollHeight);
	 
	 $(window).load(function ()
      {
    var $contents = $('#frame').contents();
    $contents.scrollTop($contents.height());
     });
	 
	 </script>
</body>
</html>