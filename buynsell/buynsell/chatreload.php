<?php
      // header('Cache-Control: no cache'); //no cache
      // session_cache_limiter('private_no_expire');
       session_start();
	   require 'dbconfig/config.php';
?>

<!--<script>
 {
	 setInterval(timingLoad, 5000);
	 function timingLoad()
	 {
         location.reload();
	 }
}
</script> -->

<?php



 if($_SESSION['user_id'])
				{
					$sroomid = mysqli_real_escape_string($con,$_SESSION['roomid']);
						$sclient = mysqli_real_escape_string($con,$_SESSION['client']);
					
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
				


?>