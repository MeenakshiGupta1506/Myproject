<?php
      // header('Cache-Control: no cache'); //no cache
      // session_cache_limiter('private_no_expire');
       session_start();
	   require 'dbconfig/config.php';
?>

<html>
<head>
</head>
<body>

<div id="frame">
<?php
		
		//echo $_SESSION['user_id'];
		
		      if($_SESSION['user_id'])
				{
					$query="Select * from  chat where roomid='{$_SESSION['roomid']}';";
					$query_run = mysqli_query($con,$query);
				 
				 if(mysqli_num_rows($query_run)>0)
				 {
					  while ($row = mysqli_fetch_array($query_run, MYSQLI_ASSOC)) 
					{
						echo $row['message'];
						echo "<br>";
					}
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
	 
	    // var elem = document.getElementById('frame'); 
        // body.scrollTop = body.scrollHeight; 
		 
		 $('#frame').scrollTop($('#frame')[0].scrollHeight);
	 
	 </script>
	 
</body>
</html>