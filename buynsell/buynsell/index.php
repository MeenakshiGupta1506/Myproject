<?php
     //  header('Cache-Control: no cache'); //no cache
     //  session_cache_limiter('private_no_expire');
       session_start();
	   require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>



<title>Sellgood</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- freebie bootstrap 

<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Footer-with-button-logo.css">
-->

<link rel = "stylesheet" href = "css/style.css">

<!--  Bootsnip bootstrap   -->

 
<!--  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>   -->


<!-- Mdb Bootstrap -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"> 
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
 <!-- <link href="css/style.css" rel="stylesheet"> 

<!-- Load an icon library to show a hamburger menu (bars) on small screens -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel = "stylesheet" href = "css/menubar.css">


<!-- favicon code-->

<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<!-- favicon code-->

</head>
<!-- <body style="background-color:#7f8c8d"> -->
<body >

<div class="header" >

<a href="index.php"><img class="sticky1" src="images/unnamed3.png" style="float:left;" ></img></a> 


<div class="sticky" >
   
     <ul class="ul" >
	   <!--  <div class="topnav2" id="myTopnav">  -->
	    <div class="topnav2" id="myTopnav">
		<b href="javascript:void(0);" class="icon" onclick="myFunction()">
       <i id="bars" class="fa fa-bars" onclick="myFunction()"></i></b>
		
		<div class="dropdown1">
		<li class="li"><a id="lia" class="active" href="index.php">Home</a></li>
		
		<div class="dropdown-content1" id="myDropdown">
		<li class="li"><a class="lia" href="register.php">Register</a></li>
      <li class="li"><a class="lia" href="login.php">Login</a></li>
	<!--  <li><a>Contact</a></li>
		<li><a>About</a></li> -->
		</div>
	  </div>
        </div>
      
	 <!-- </div>  -->
     </ul>
   	 
</div>
</div>


<div class="givemargin" >
<div><form action="index.php" method="get" >
		
		
		
		<input id="homepagetext" name="name" style="height:40px;" type="text" class="inputvalues"  placeholder="Search Your Book Here" required/>
		
		
					   
		
		
		       <input style="width:100px;height:50px;margin-left:20px;cursor:pointer;" type="submit" id="back_btn" value="Search"/>
			   
			   
			   <?php  
			   
			   $photoflag=0;
			   
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
		       
		
        </form></div>
		
		
		<?php
				
                 if(isset($_SESSION['user_id']))
	           {
					header('location:homepage2.php');
				}
				?>
 

   <!--  <div id = "main-wrapper" style="height:relative; background-color:#F4D03F; z-index:1;">  -->
	 
    <div id = "main-wrapper" style="height:relative; background-color:#ffff1a; z-index:1;"> 
		
		
		
		<?php 
		
		
		if($photoflag==0)
		{
			echo '<div><img id="bookposter" style="" src="images/bookposter.jpg" /> </div>';
		
			echo '<div id="introtext" > <h5><span style="font-weight:bold;">Hello Guys Welcome to sellgood.in !!  </span></h5>   <br> <span style="font-weight:bold;">Here you can buy and sell used books. Type the book you want and 
                   	get it from student in your college at cheaper price.	<br><br>
                    Steps to buy: <br> 		1) Search your desired book. <br> 	2) Chat with the seller about the details and place of exchange by logging in.	
                 <br>    3) Get the book and enjoy.			<br><br>	Steps to sell : <br> 1) Login and post your Ad.
                 <br>  2) Wait for buyer to contact you.	 	</span>		 </div>'; 
				 
				 
			
		}			
			
	      ?>
		  
		  
		  
				
		<?php
				
                 if(isset($_SESSION['user_id']))
	           {
					header('location:homepage2.php');
				}
				   
				  else if (isset($_GET['name']) && empty($_GET['pricefrom']) && empty($_GET['priceto']))
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
						echo '<form name="searchform'.$i.'" action="adpreview.php" method="post">';
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
						echo '<form name="searchform'.$i.'" action="adpreview.php" method="post">';
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
						echo '<form name="searchform'.$i.'" action="adpreview.php" method="post">';
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
						echo '<form name="searchform'.$i.'" action="adpreview.php" method="post">';
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
				
			   
	     ?>
		 
		     <div id="demo2"></div>  
			 
			 <script>
	    document.getElementById("demo2").innerHTML = "<p>.</p>";
	 </script>
		     
		    <!--   <div id="demo"></div>  

			
		
		    <script>
			     document.getElementById("demo2").innerHTML = "<p>.</p>";
                 var txt = "";
                 txt += "<p>Inner width/height: " + window.innerWidth + "*" + window.innerHeight + "</p>";
                 txt += "<p>Outer width/height: " + window.outerWidth + "*" + window.outerHeight + "</p>";

                 document.getElementById("demo").innerHTML = txt;
				 
				 
				 
            </script> -->
			
		<!--	<script>
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
			 <form name="search'.$i.'" action="adpreview.php" method="post">
						  
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
	 
	 <!-- Footer -->

  <!-- Footer -->

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

	 
<!--<footer  class="page-footer font-small special-color-dark pt-4">

    

    
    <div class="footer-copyright text-center py-3">© 2018 Copyright:
      <a href="https://mdbootstrap.com/education/bootstrap/"> Sellgood.in</a>
    </div>
    

  </footer>
  
 -->
 <!--
 <script>
 
 $(document).ready(function () {
    var itemsMainDiv = ('.MultiCarousel');
    var itemsDiv = ('.MultiCarousel-inner');
    var itemWidth = "";

    $('.leftLst, .rightLst').click(function () {
        var condition = $(this).hasClass("leftLst");
        if (condition)
            click(0, this);
        else
            click(1, this)
    });

    ResCarouselSize();




    $(window).resize(function () {
        ResCarouselSize();
    });

    //this function define the size of the items
    function ResCarouselSize() {
        var incno = 0;
        var dataItems = ("data-items");
        var itemClass = ('.card');
        var id = 0;
        var btnParentSb = '';
        var itemsSplit = '';
        var sampwidth = $(itemsMainDiv).width();
        var bodyWidth = $('body').width();
        $(itemsDiv).each(function () {
            id = id + 1;
            var itemNumbers = $(this).find(itemClass).length;
            btnParentSb = $(this).parent().attr(dataItems);
            itemsSplit = btnParentSb.split(',');
            $(this).parent().attr("id", "MultiCarousel" + id);


            if (bodyWidth >= 1200) {
                incno = itemsSplit[3];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 992) {
                incno = itemsSplit[2];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 768) {
                incno = itemsSplit[1];
                itemWidth = sampwidth / incno;
            }
            else {
                incno = itemsSplit[0];
                itemWidth = sampwidth / incno;
            }
            $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
            $(this).find(itemClass).each(function () {
                $(this).outerWidth(itemWidth);
            });

            $(".leftLst").addClass("over");
            $(".rightLst").removeClass("over");

        });
    }


    //this function used to move the items
    function ResCarousel(e, el, s) {
        var leftBtn = ('.leftLst');
        var rightBtn = ('.rightLst');
        var translateXval = '';
        var divStyle = $(el + ' ' + itemsDiv).css('transform');
        var values = divStyle.match(/-?[\d\.]+/g);
        var xds = Math.abs(values[4]);
        if (e == 0) {
            translateXval = parseInt(xds) - parseInt(itemWidth * s);
            $(el + ' ' + rightBtn).removeClass("over");

            if (translateXval <= itemWidth / 2) {
                translateXval = 0;
                $(el + ' ' + leftBtn).addClass("over");
            }
        }
        else if (e == 1) {
            var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
            translateXval = parseInt(xds) + parseInt(itemWidth * s);
            $(el + ' ' + leftBtn).removeClass("over");

            if (translateXval >= itemsCondition - itemWidth / 2) {
                translateXval = itemsCondition;
                $(el + ' ' + rightBtn).addClass("over");
            }
        }
        $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
    }

    //It is used to get some elements from btn
    function click(ell, ee) {
        var Parent = "#" + $(ee).parent().attr("id");
        var slide = $(Parent).attr("data-slide");
        ResCarousel(ell, Parent, slide);
    }

});  -->

</script> 
    
</body>
</html>

