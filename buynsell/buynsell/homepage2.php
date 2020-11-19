<?php
      // header('Cache-Control: no cache'); //no cache
     //  session_cache_limiter('private_no_expire');
	// session_cache_limiter('public');
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
<link rel = "stylesheet" href = "css/style.css"
</head>
<body style="background-color:white"> 
<a href="index.php"><img id="sticky1" class="sticky1" src="images/unnamed3.png" style="float:left;" ></img> </a>

<div class="sticky">
     <ul class="ul">
	    
		<!--  <div class="topnav2" id="myTopnav">  -->
	    <div class="topnav2" id="myTopnav">
		<b href="javascript:void(0);" class="icon" onclick="myFunction()">
       <i id="bars" class="fa fa-bars" onclick="myFunction()" ></i></b>
		
		
		<div class="dropdown1">
		<li class="li"><a class="active" href="homepage2.php">Home</a></li>
		
		<div class="dropdown-content1" id="myDropdown">
		<li class="li"><a class="lia" href="adview.php">Dashboard</a></li>
		<li class="li"><a class="lia" href="clgdetails.php">College Details</a></li>
		
		<li class="li"><a class="lia" href="adsubmit.php">Submit Ad</a></li>
		<li class="li"><a class="lia" href="chatlist.php">Messages</a></li>
        <li class="li"><a class="lia" href="settings.php">Settings</a></li>
        
		   <li><a ><form method="GET"><input name="logout" type="submit" id="logout" value="Log Out"/></form></a></li>
		   </div>
		   </div>
		   </div>
		   
     </ul>
</div>

<form action="homepage2.php" method="get" >
		
	<div>	<input id="homepagetext" name="name" style="height:40px;" type="text" class="inputvalues" placeholder="Search Your Book Here" required/>
		
	
		
					   
		
		
		       <input style="width:100px;height:50px;margin-left:20px;cursor:pointer;" type="submit" id="back_btn" value="Search"/> </div>
			   
			   <?php  
			   
			     if (isset($_GET['name']))
				 {
					 $photoflag=1;
		          echo '  <hr>   <p style="margin-left:70px;">Price Range</p> 
					          
					          <input id="pricerange" name="pricefrom" style="margin-left:70px;height:25px;" type="number" class="inputvalues" placeholder="Price From" /> &nbsp;
		                     -<input id="pricerange" name="priceto" style="height:25px;" type="number" class="inputvalues" placeholder="Price To" /> 
							 
							 
							   <br><br><hr>';
				 }
				 else
				 {
					
					$photoflag=0;
					
				 }
		?>		
		
        </form>



 

     <div id = "main-wrapper2" style="width:85%;height:relative;background-color:white;">
	 
            
         <?php 
		
		
		if($photoflag==0)
		{
			echo '<div><img id="bookposter"  style="height:380px;" src="images/bookposter.jpg" /> </div>';
		
			echo '<p id="introtext" > <span style="font-weight:bold;">Hello Guys Welcome to sellgood.in !!</span><br><br> Here you can buy and sell used books. Type the book you want and 
                   	get it from student in your college at cheaper price.	<br><br>
                    Steps to buy: <br> 		1) Search your desired book. <br> 	2) Chat with the seller about the details and place of exchange by logging in.	
                 <br>    3) Get the book and enjoy.			<br><br>	Steps to sell : <br> 1) Login and post your Ad.
                 <br>  2) Wait for buyer to contact you.	<br> 			 </p>'; 
			
		}			
				
	      ?>			
		   
        
		
		<?php
		
		
		
		     if(isset($_SESSION['user_id']) )
				{
					
					
					if (isset($_GET['name']) && empty($_GET['pricefrom']) && empty($_GET['priceto']))
				   {
					  
					   
					   
					   $keywords = preg_split("/[\W]+/", $_GET['name']);
					   $flag=0;
					   $k=0;
					   $l=0;
					   
					   $str="Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where book_details.title like '%{$keywords[0]}%' UNION 
				   Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where ad_submit.ad_title like '%{$keywords[0]}%' UNION
				   Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where book_details.subject like '%{$keywords[0]}%' UNION
				   Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where book_details.author like '%{$keywords[0]}%' UNION
				   Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where book_details.publisher like '%{$keywords[0]}%'";
					   
					for($k=1;$k<count($keywords);$k++)
					{
				        
				         $str = $str." UNION Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where book_details.title like '%{$keywords[$k]}%' UNION 
				   Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where ad_submit.ad_title like '%{$keywords[$k]}%' UNION
				   Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where book_details.subject like '%{$keywords[$k]}%' UNION
				   Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where book_details.author like '%{$keywords[$k]}%' UNION
				   Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where book_details.publisher like '%{$keywords[$k]}%'";
				   
				   
				   
				
					}
					
					$result = mysqli_query($con,$str);
					
					$i=1;
					
					
						
						if(mysqli_num_rows($result)>0 )
					      {
						     $flag=1;
					      }
					
					
					
					if( $flag)
					{
						   
				
						
					while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
					{
						echo '<form name="searchform'.$i.'" action="adpreview2.php" method="post">';
						  echo '<div onClick="document.forms[\'searchform'.$i.'\'].submit();" style="cursor:pointer;" class="row">';
						    echo '<div class="column" style="margin-left:10px;background-color:lightgreen;">';
							/*echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['photo_id'] ).'"/>'; */
							echo '<h3 style="float:left;margin-left:10px;">'.($i++).')</h3>'; 
							echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					        echo '<img style="float:left;margin-left:30px;" src="'.( $row['photo_id'] ).'" height="100px" width="100px" onerror=this.src="images/ad.jpg" />';
						    
							echo '<h2 style="float:left;margin-left:20px;">'.$row['ad_title'].'</h2>';
							echo '<br><br>';
						    echo '<p style="float:left;margin-left:20px;">'. $row['time'].'</p>';
							
						    echo '<h3 style="float:right;">Rs.'.$row['price'].'</h3>';
							echo '<input name="preview" type="hidden" value="'.( $row['ad_id'] ).'" />'; 
						
						/*    echo '<input style="width:10%;cursor:pointer;" name="prevbtn" type="submit" id="back_btn" value="Preview" ) " />'; */
						    echo '</div>';
						  echo '</div>';
						  echo '<br>';
						  
					
						echo "</form>";
                    }
					
				   
				}
				  
				  else{
					  
					  echo "No ads to display";
					  echo "<br><br>";
				  }
					
				 }
				 else if (isset($_GET['name']) && !empty($_GET['pricefrom']) && empty($_GET['priceto']))
				   {
					 
							   
							   $keywords = preg_split("/[\W]+/", $_GET['name']);
					   $flag=0;
					   $k=0;
					   $l=0;
					   
					   $str="Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where book_details.title like '%{$keywords[0]}%' and book_details.price between '{$_GET['pricefrom']}' and '10000000' UNION 
				   Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where ad_submit.ad_title like '%{$keywords[0]}%' and book_details.price between '{$_GET['pricefrom']}' and '10000000' UNION
				   Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where book_details.subject like '%{$keywords[0]}%' and book_details.price between '{$_GET['pricefrom']}' and '10000000' UNION
				   Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where book_details.author like '%{$keywords[0]}%' and book_details.price between '{$_GET['pricefrom']}' and '10000000' UNION
				   Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where book_details.publisher like '%{$keywords[0]}%' and book_details.price between '{$_GET['pricefrom']}' and '10000000'";
					   
					for($k=1;$k<count($keywords);$k++)
					{
				 
				   
				   $str=$str." UNION Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where book_details.title like '%{$keywords[$k]}%' and book_details.price between '{$_GET['pricefrom']}' and '10000000' UNION 
				   Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where ad_submit.ad_title like '%{$keywords[$k]}%' and book_details.price between '{$_GET['pricefrom']}' and '10000000' UNION
				   Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where book_details.subject like '%{$keywords[$k]}%' and book_details.price between '{$_GET['pricefrom']}' and '10000000' UNION
				   Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where book_details.author like '%{$keywords[$k]}%' and book_details.price between '{$_GET['pricefrom']}' and '10000000' UNION
				   Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where book_details.publisher like '%{$keywords[$k]}%' and book_details.price between '{$_GET['pricefrom']}' and '10000000'";
				
					}
					
					$result = mysqli_query($con,$str);
					
					$i=1;
					
					if(mysqli_num_rows($result)>0 )
					      {
						     $flag=1;
					      }
					
					
					
					if( $flag)
					{
						   
				
						
					while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
					{
						echo '<form name="searchform'.$i.'" action="adpreview2.php" method="post">';
						  echo '<div onClick="document.forms[\'searchform'.$i.'\'].submit();" style="cursor:pointer;" class="row">';
						    echo '<div class="column" style="margin-left:10px;background-color:lightgreen;">';
							/*echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['photo_id'] ).'"/>'; */
							echo '<h3 style="float:left;margin-left:10px;">'.($i++).')</h3>'; 
							echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					        echo '<img style="float:left;margin-left:30px;" src="'.( $row['photo_id'] ).'" height="100px" width="100px" onerror=this.src="images/ad.jpg" />';
						    
							echo '<h2 style="float:left;margin-left:20px;">'.$row['ad_title'].'</h2>';
							echo '<br><br>';
						    echo '<p style="float:left;margin-left:20px;">'. $row['time'].'</p>';
							
						    echo '<h3 style="float:right;">Rs.'.$row['price'].'</h3>';
							echo '<input name="preview" type="hidden" value="'.( $row['ad_id'] ).'" />'; 
						
						/*    echo '<input style="width:10%;cursor:pointer;" name="prevbtn" type="submit" id="back_btn" value="Preview" ) " />'; */
						    echo '</div>';
						  echo '</div>';
						  echo '<br>';
						  
					
						echo "</form>";
                    }
					
				   
				}
				  
				  else{
					  
					  echo "No ads to display";
					  echo "<br><br>";
				  }
					
				 }
				
				 else if (isset($_GET['name']) && empty($_GET['pricefrom']) && !empty($_GET['priceto']))
				   {
					  
							   
							 $keywords = preg_split("/[\W]+/", $_GET['name']);
					   $flag=0;
					   $k=0;
					   $l=0;
					   
					
					
					
					$str="Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where book_details.title like '%{$keywords[0]}%' and book_details.price between '0' and '{$_GET['priceto']}' UNION 
				   Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where ad_submit.ad_title like '%{$keywords[0]}%' and book_details.price between '0' and '{$_GET['priceto']}' UNION
				   Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where book_details.subject like '%{$keywords[0]}%' and book_details.price between '0' and '{$_GET['priceto']}' UNION
				   Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where book_details.author like '%{$keywords[0]}%' and book_details.price between '0' and '{$_GET['priceto']}' UNION
				   Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where book_details.publisher like '%{$keywords[0]}%' and book_details.price between '0' and '{$_GET['priceto']}'";
					   
					for($k=1;$k<count($keywords);$k++)
					{
				 
				   
				   $str=$str." UNION Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where book_details.title like '%{$keywords[$k]}%' and book_details.price between '0' and '{$_GET['priceto']}' UNION 
				   Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where ad_submit.ad_title like '%{$keywords[$k]}%' and book_details.price between '0' and '{$_GET['priceto']}' UNION
				   Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where book_details.subject like '%{$keywords[$k]}%' and book_details.price between '0' and '{$_GET['priceto']}' UNION
				   Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where book_details.author like '%{$keywords[$k]}%' and book_details.price between '0' and '{$_GET['priceto']}' UNION
				   Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where book_details.publisher like '%{$keywords[$k]}%' and book_details.price between '0' and '{$_GET['priceto']}'";
				
					}
					
					$result = mysqli_query($con,$str);
					
					$i=1;
					
					if(mysqli_num_rows($result)>0 )
					      {
						     $flag=1;
					      }

					
					
					
					if( $flag)
					{
						   
				
						
					while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
					{
						echo '<form name="searchform'.$i.'" action="adpreview2.php" method="post">';
						  echo '<div onClick="document.forms[\'searchform'.$i.'\'].submit();" style="cursor:pointer;" class="row">';
						    echo '<div class="column" style="margin-left:10px;background-color:lightgreen;">';
							/*echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['photo_id'] ).'"/>'; */
							echo '<h3 style="float:left;margin-left:10px;">'.($i++).')</h3>'; 
							echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					        echo '<img style="float:left;margin-left:30px;" src="'.( $row['photo_id'] ).'" height="100px" width="100px" onerror=this.src="images/ad.jpg" />';
						    
							echo '<h2 style="float:left;margin-left:20px;">'.$row['ad_title'].'</h2>';
							echo '<br><br>';
						    echo '<p style="float:left;margin-left:20px;">'. $row['time'].'</p>';
							
						    echo '<h3 style="float:right;">Rs.'.$row['price'].'</h3>';
							echo '<input name="preview" type="hidden" value="'.( $row['ad_id'] ).'" />'; 
						
						/*    echo '<input style="width:10%;cursor:pointer;" name="prevbtn" type="submit" id="back_btn" value="Preview" ) " />'; */
						    echo '</div>';
						  echo '</div>';
						  echo '<br>';
						  
					
						echo "</form>";
                    }
					
				   
				}
				  
				  else{
					  
					  echo "No ads to display";
					  echo "<br><br>";
				  }
					
				 } 
				
				  else if (isset($_GET['name']) && !empty($_GET['pricefrom']) && !empty($_GET['priceto']))
				   {
					  
							   
							 $keywords = preg_split("/[\W]+/", $_GET['name']);
					   $flag=0;
					   $k=0;
					   $l=0;
					   
				
					
					
					$str="Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where book_details.title like '%{$keywords[0]}%' and book_details.price between '{$_GET['pricefrom']}' and '{$_GET['priceto']}' UNION 
				   Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where ad_submit.ad_title like '%{$keywords[0]}%' and book_details.price between '{$_GET['pricefrom']}' and '{$_GET['priceto']}' UNION
				   Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where book_details.subject like '%{$keywords[0]}%' and book_details.price between '{$_GET['pricefrom']}' and '{$_GET['priceto']}' UNION
				   Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where book_details.author like '%{$keywords[0]}%' and book_details.price between '{$_GET['pricefrom']}' and '{$_GET['priceto']}' UNION
				   Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where book_details.publisher like '%{$keywords[0]}%' and book_details.price between '{$_GET['pricefrom']}' and '{$_GET['priceto']}'";
					   
					for($k=1;$k<count($keywords);$k++)
					{
				 
				   
				   $str=$str." UNION Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where book_details.title like '%{$keywords[$k]}%' and book_details.price between '{$_GET['pricefrom']}' and '{$_GET['priceto']}' UNION 
				   Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where ad_submit.ad_title like '%{$keywords[$k]}%' and book_details.price between '{$_GET['pricefrom']}' and '{$_GET['priceto']}' UNION
				   Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where book_details.subject like '%{$keywords[$k]}%' and book_details.price between '{$_GET['pricefrom']}' and '{$_GET['priceto']}' UNION
				   Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where book_details.author like '%{$keywords[$k]}%' and book_details.price between '{$_GET['pricefrom']}' and '{$_GET['priceto']}' UNION
				   Select ad_submit.ad_id,ad_submit.ad_title,ad_submit.category,ad_submit.photo_id,ad_submit.clg_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id where book_details.publisher like '%{$keywords[$k]}%' and book_details.price between '{$_GET['pricefrom']}' and '{$_GET['priceto']}'";
				
					}
					
					$result = mysqli_query($con,$str);
					
					$i=1;
					
					if(mysqli_num_rows($result)>0 )
					      {
						     $flag=1;
					      }
					
					
					
					if( $flag)
					{
						   
				
						
					while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
					{
						echo '<form name="searchform'.$i.'" action="adpreview2.php" method="post">';
						  echo '<div onClick="document.forms[\'searchform'.$i.'\'].submit();" style="cursor:pointer;" class="row">';
						    echo '<div class="column" style="margin-left:10px;background-color:lightgreen;">';
							/*echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['photo_id'] ).'"/>'; */
							echo '<h3 style="float:left;margin-left:10px;">'.($i++).')</h3>'; 
							echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					        echo '<img style="float:left;margin-left:30px;" src="'.( $row['photo_id'] ).'" height="100px" width="100px" onerror=this.src="images/ad.jpg" />';
						    
							echo '<h2 style="float:left;margin-left:20px;">'.$row['ad_title'].'</h2>';
							echo '<br><br>';
						    echo '<p style="float:left;margin-left:20px;">'. $row['time'].'</p>';
							
						    echo '<h3 style="float:right;">Rs.'.$row['price'].'</h3>';
							echo '<input name="preview" type="hidden" value="'.( $row['ad_id'] ).'" />'; 
						
						/*    echo '<input style="width:10%;cursor:pointer;" name="prevbtn" type="submit" id="back_btn" value="Preview" ) " />'; */
						    echo '</div>';
						  echo '</div>';
						  echo '<br>';
						  
					
						echo "</form>";
                    }
					
				   
				}
				  
				  else{
					  
					  echo "No ads to display";
					  echo "<br><br>";
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
                   header('location:login.php');				   
			   }
		   
		?>
		
		<div id="demo2"></div>
		
	 </div>
	 
	 <?php
	 
	 
	 $carouselquery = " SELECT ad_submit.ad_id,ad_submit.ad_title,ad_submit.photo_id,ad_submit.time,book_details.price from ad_submit INNER JOIN book_details on ad_submit.prod_id=book_details.book_id ORDER BY ad_id DESC LIMIT 20 ";
	 
	 $carouselresult = mysqli_query($con,$carouselquery);
					
					
					
		if(mysqli_num_rows($carouselresult)>0 )
		{
			$i=1;
			
	?>
			
			<div style="background-color:#cc0000;margin-top:30px;">
			  <div class="container" style="z-index:-1" >
	              <div class="row" >  
				    <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000" >
			
		<?php	
		    
			if($photoflag==0)
			{
			
			while ($carouselrow = mysqli_fetch_array($carouselresult, MYSQLI_ASSOC)) 
			 {	 
	        
				
		echo '	
               
			   
		
            <div class="MultiCarousel-inner" >
			 <form name="search'.$i.'" action="adpreview2.php" method="post">
						  
                <div class="card"  onClick="document.forms[\'search'.($i++).'\'].submit();"  style="width:200px;">
    <img class="card-img-top" src="'.( $carouselrow['photo_id'] ).'" alt="Card image" onerror=this.src="images/ad.jpg" style="width:100%;height:150px;" >
    <div class="card-body" >
      <h5 class="card-title" >'.$carouselrow['ad_title'].'</h4>
      <p class="card-text" >'. $carouselrow['time'].'<br>Rs.'.$carouselrow['price'].'</p>
        <input name="preview" type="hidden" value="'.( $carouselrow['ad_id'] ).'" />
    </div>
  
  </div>
  </form>
               
            </div>
           
          ';
		
		
				
			/*	echo '
				     <div class="container" >
                    <h2>Card Image</h2>
                     <p>Image at the top (card-img-top):</p>
                     <div class="card" style="width:200px;z-index:-1;">
                        <img class="card-img-top" src="images/book1.png" alt="Card image" style="width:100%;height:50%;">
                         <div class="card-body">
                           <h4 class="card-title">John Doe</h4>
                             <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                                <a href="#" class="btn btn-primary">See Profile</a>
                        </div>
						</div>
                  </div>';  */
				
			}
			
			} ?>
			
			

                </div>
                </div>
				</div>
               </div>				
			
	  <?php  }   ?>
		
		
	     <?php   if($photoflag==0)
			{
		echo '
		    <div class="container" style="z-index:-1;" >
			<div class="row">
	    <div class="col-md-12 text-center">
	        <br/><br/><br/>
	        <hr/>
	        <p>Note:</p>
	        <p>Don\'t indulge in illegal activities on this site such as posting inappropriate images or content. </p>
	        <p>Strict Legal action will be taken against those attempting to do such activities.</p>
	    </div>
	   </div> 
	  </div>  ';
			}
	 ?>
	 
	         <!--    <button class="btn btn-primary leftLst" ></button>
            <button class="btn btn-primary rightLst" ></button>  -->
	 
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
	 
	<!-- <div id="demo"></div>  -->
	 
	 <script>
	    document.getElementById("demo2").innerHTML = "<p>.</p>";
	 </script>
	 
 <!--	 <script>
			     
                 var txt = "";
                 txt += "<p>Inner width/height: " + window.innerWidth + "*" + window.innerHeight + "</p>";
                 txt += "<p>Outer width/height: " + window.outerWidth + "*" + window.outerHeight + "</p>";

                 document.getElementById("demo").innerHTML = txt;
				 
				 
				 
            </script>
	 
	 <script>
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



     
</body>
</html>

