<?php
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
		<li class="li"><a class="active" style="padding: 15px 55px;" href="adsubmit.php">Submit Ad</a></li>
		
		
		<div class="dropdown-content1" id="myDropdown">
		<li class="li"><a class="lia" href="homepage2.php">Home</a></li>
		<li class="li"><a class="lia" href="adview.php">Dashboard</a></li>
		<li class="li"><a class="lia" href="clgdetails.php">College Details</a></li>
		
		<li class="li"><a class="lia" href="chatlist.php">Messages</a></li>
		<li class="li"><a class="lia" href="settings.php">Settings</a></li>
		
       <li class="li"><a class="lia"><form method="post"><input name="logout" type="submit" id="logout" value="Log Out"/></form></a></li>
      </div>
	  </div>
	  </div>
		   
     </ul>
</div>
    
	<?php
	
	if(isset($_POST['logout']))
	    {
		    session_destroy();
            header('location:login.php');				   
		}
			   
	if(!isset($_SESSION['user_id']))
	{
		header('location:index.php');
	}
	else
		  {
			  if($_SESSION['clg_id']==NULL)
			 {
				 header('location:clgdetails.php');
			 }
			 else
			  {
			   if(isset($_POST['submit_btn']))
			   {
				 //echo '<script type="text/javascript"> alert("Sign up button clicked") </script>';
			 
			 
			 
			   $adtitle = mysqli_real_escape_string($con,$_POST['adtitle']);
			   $category = mysqli_real_escape_string($con,$_POST['category']);
			   $booktitle = mysqli_real_escape_string($con,$_POST['booktitle']);
			   $subject = mysqli_real_escape_string($con,$_POST['subject']);
			   $publisher = mysqli_real_escape_string($con,$_POST['publisher']);
			   $author = mysqli_real_escape_string($con,$_POST['author']);
			   $description = mysqli_real_escape_string($con,$_POST['description']);
			   $price= mysqli_real_escape_string($con,$_POST['price']);
			   
			 
			   $img_name = $_FILES['imagelink']['name'];
			   $img_size = $_FILES['imagelink']['size'];			   
			   $img_tmp = $_FILES['imagelink']['tmp_name'];
			   
			   $directory = 'uploads/';
			   $target_file = $directory.$img_name;
			   
			   if($_SESSION['clg_id']!=NULL)
			   {
				 $query="Select book_id from book_details where title like '%{$booktitle}%' and subject like '%{$subject}%' and publisher like '%{$publisher}%' and author like '%{$author}%' and price='$price'";
				// echo $query;
				 $query_run = mysqli_query($con,$query);
				 
				 
				 if(mysqli_num_rows($query_run)>0)
				 {
					 
				/*	 
					 $query4="Select * from ad_submit where ";
				     // echo $query;
				     $query_run4 = mysqli_query($con,$query4);
				 
				 
				    if(mysqli_num_rows($query_run4)>0)
				    {
					 
					 
				    }    */
					 
					// echo '<script type="text/javascript"> alert("Ad Details Entered") </script>';
					 $row = mysqli_fetch_assoc($query_run);
				    $book_id = mysqli_real_escape_string($con,$row['book_id']);
					 
			   /*      if(file_exists($target_file))
				    {
					 echo '<script type="text/javascript"> alert("Image File name already exists ...... Try Image File with other name") </script>';
				     }  */
					  if($img_size>2097152)
				     {
					     echo '<script type="text/javascript"> alert("Image File size greater than 2 MB ...... Try another Image File") </script>';
				     }
				     else
				     {
						 move_uploaded_file($img_tmp,$target_file);
						 
						 $suser_id = mysqli_real_escape_string($con,$_SESSION['user_id']);
						 $sclg_id = mysqli_real_escape_string($con,$_SESSION['clg_id']);
						 
					 $query="Insert into ad_submit(`user_id`, `prod_id`, `ad_title`, `category`, `description`, `photo_id`,`clg_id`) values('$suser_id','$book_id','$adtitle','$category','$description','$target_file','$sclg_id')";
				     $query_run = mysqli_query($con,$query);
					 
					 header('location:adview.php');
					 }
					 
					 
				 }
				 
				 else{
					  //  echo '<script type="text/javascript"> alert("Ad Details Entered") </script>';
					   $query="Insert into book_details(`title`, `subject`, `publisher`, `author`, `price`) values('$booktitle','$subject','$publisher','$author','$price')";
					   $query_run = mysqli_query($con,$query);
					   $query2="Select max(book_id) from book_details";
					   $query_run2 = mysqli_query($con,$query2);
					   $row = mysqli_fetch_assoc($query_run2);
					   $bookid=$row['max(book_id)'];
					//   $bookid++;
					//   echo $bookid;
					 //  echo $bookid+1;
					   move_uploaded_file($img_tmp,$target_file);
					   
					   $suser_id = mysqli_real_escape_string($con,$_SESSION['user_id']);
					   $sclg_id = mysqli_real_escape_string($con,$_SESSION['clg_id']);
					   $query3="Insert into ad_submit(`user_id`, `prod_id`, `ad_title`, `category`, `description`, `photo_id`,`clg_id`) values('$suser_id','$bookid','$adtitle','$category','$description','$target_file','$sclg_id')";
					   $query_run3 = mysqli_query($con,$query3);
					   
					   header('location:adview.php');
				 }
				 
			  }
			  else{
				  
				  header('location:clgdetails.php');
				  
			    } 
			}
                echo '<br><br><br><br><br><br><br>';        
			  }
		  }
    ?>
	
   <form class="myform" name="form1" action="adsubmit.php" method="post" enctype="multipart/form-data" >
     <div class="regwrapper">
	   <center>
	      <h1>Submit Ad</h1>
	     <img id="uploadPreview" width="300px" height="250px" src="images/ad.jpg" class="login"/><br><br>
		 &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Upload Ad Photo: &nbsp;&nbsp;&nbsp;
		 <input type="file" id="imagelink" name="imagelink" value="Choose Ad Photo" accept=".jpg,.jpeg,.png" onchange="PreviewImage();" />
		<!--  <input type="file" id="imagelink" name="imagelink" accept=".jpg,.jpeg,.png" onchange="PreviewImage();"/>  -->
	    </center>
		
		<br>
         <!--  <label class="inputvalues"><b>Title of Ad:</b></label><br>   -->
		   <input name="adtitle" type="text" style="height:34px;" id="regtext" class="inputvalues" placeholder="Type your Ad Title" required/><br>
		       <br>
			<!--   <label class="inputvalues"><b>Category:</b></label><br>   -->
			   
			   <select id="regtext" style="height:34px;" class="inputvalues" name="category">
               <option value="Books">Books</option>
			   </select>
		   
		       <br>
		       <br>
		 <!--	   <label class="inputvalues" ><b>Book Title:</b></label><br>  -->
		   <input name="booktitle" type="text" style="height:34px;" id="regtext" class="inputvalues" placeholder="Book Title" required/><br>
		       <br>
		 <!--  <label class="inputvalues"><b>Book Subject:</b></label><br>  -->
		   <input name="subject" type="text" id="regtext" style="height:34px;" class="inputvalues" placeholder="Subject" required/>
		   <br><br>
		<!--   <label class="inputvalues"><b>Book Publisher:</b></label><br>  -->
		   <input name="publisher" type="text" id="regtext" style="height:34px;" class="inputvalues" placeholder="Publisher" required/><br><br>
		   
		<!--   <label class="inputvalues"><b>Book Author:</b></label><br>  -->
		   <input name="author" type="text" id="regtext" style="height:34px;" class="inputvalues" placeholder="Author" required/><br><br>
		   
		<!--   <label class="inputvalues"><b>Description:</b></label><br>  -->
		   <textarea name="description" id="regtext" style="height:50px;" class="inputvalues" rows="10" cols="30" placeholder="Description" ></textarea><br><br>
		   
		<!--   <label class="inputvalues"><b>Book Price:</b></label><br><br>  -->
		   <input name="price" type="number" id="regtext" style="height:34px;" class="inputvalues" style="width:150px;" placeholder="Price" required/>
		   <br><br>
		   <input name="submit_btn" type="submit" id="signup_btn" style="margin-bottom:20px;background-color:#c0392b;cursor:pointer;" value="Submit"  /><br>
		   
    </form>
	
	<script type="text/javascript">

     function PreviewImage()
	  {
		  var ofreader = new FileReader();
		  ofreader.readAsDataURL(document.getElementById("imagelink").files[0]);
		  
		  ofreader.onload = function(oFREvent)
		  {
			  document.getElementById("uploadPreview").src = oFREvent.target.result;
		  };
	  };	

     </script>
		
		<?php 
		     
			 
		/*	 if($_SESSION['user_id'])
				{
				echo $_SESSION['user_id']; echo"<br>";
                echo $_SESSION['name'];	echo"<br>";
                echo $_SESSION['user_mail']; echo"<br>";
                echo $_SESSION['user_mobile']; echo"<br>";
                echo $_SESSION['password'];echo"<br>";			
				echo $_SESSION['clg_id'];
				}*/
		
		
		/*  if(isset($_SESSION['user_id']))
		  { 
	  
	          if(isset($_POST['logout']))
			   {
		           session_destroy();
                   header('location:login.php');				   
			   }
	  
	         
	           
		     if(isset($_POST['submit_btn']))
			 {
				 //echo '<script type="text/javascript"> alert("Sign up button clicked") </script>';
			 
			 
			 
			   $adtitle = mysqli_real_escape_string($con,$_POST['adtitle']);
			   $category = mysqli_real_escape_string($con,$_POST['category']);
			   $booktitle = mysqli_real_escape_string($con,$_POST['booktitle']);
			   $subject = mysqli_real_escape_string($con,$_POST['subject']);
			   $publisher = mysqli_real_escape_string($con,$_POST['publisher']);
			   $author = mysqli_real_escape_string($con,$_POST['author']);
			   $description = mysqli_real_escape_string($con,$_POST['description']);
			   $price= mysqli_real_escape_string($con,$_POST['price']);
			   
			 
			   $img_name = mysqli_real_escape_string($con,$_FILES['imagelink']['name']);
			   $img_size = mysqli_real_escape_string($con,$_FILES['imagelink']['size']);			   
			   $img_tmp = mysqli_real_escape_string($con,$_FILES['imagelink']['tmp_name']);
			   
			   $directory = 'uploads/';
			   $target_file = mysqli_real_escape_string($con,$directory.$img_name);
			   
			   if($_SESSION['clg_id']!=NULL)
			   {
				 $query="Select book_id from book_details where title like '%{$booktitle}%' and subject like '%{$subject}%' and publisher like '%{$publisher}%' and author like '%{$author}%' and price='$price'";
				// echo $query;
				 $query_run = mysqli_query($con,$query);
				 
				 
				 if(mysqli_num_rows($query_run)>0)
				 {
					 
				/*	 
					 $query4="Select * from ad_submit where ";
				     // echo $query;
				     $query_run4 = mysqli_query($con,$query4);
				 
				 
				    if(mysqli_num_rows($query_run4)>0)
				    {
					 
					 
				    }    */
					 
					// echo '<script type="text/javascript"> alert("Ad Details Entered") </script>';
			/*		 $row = mysqli_fetch_assoc($query_run);
				    $book_id = mysqli_real_escape_string($con,$row['book_id']);
					 
			   /*      if(file_exists($target_file))
				    {
					 echo '<script type="text/javascript"> alert("Image File name already exists ...... Try Image File with other name") </script>';
				     }  */
				/*	  if($img_size>2097152)
				     {
					     echo '<script type="text/javascript"> alert("Image File size greater than 2 MB ...... Try another Image File") </script>';
				     }
				     else
				     {
						 move_uploaded_file($img_tmp,$target_file);
						 
						 $suser_id = mysqli_real_escape_string($con,$_SESSION['user_id']);
						 $sclg_id = mysqli_real_escape_string($con,$_SESSION['clg_id']);
						 
					 $query="Insert into ad_submit(`user_id`, `prod_id`, `ad_title`, `category`, `description`, `photo_id`,`clg_id`) values('$suser_id','$book_id','$adtitle','$category','$description','$target_file','$sclg_id')";
				     $query_run = mysqli_query($con,$query);
					 
					 header('location:adview.php');
					 }
					 
					 
				 }
				 
				 else{
					  //  echo '<script type="text/javascript"> alert("Ad Details Entered") </script>';
					   $query="Insert into book_details(`title`, `subject`, `publisher`, `author`, `price`) values('$booktitle','$subject','$publisher','$author','$price')";
					   $query_run = mysqli_query($con,$query);
					   $query2="Select max(book_id) from book_details";
					   $query_run2 = mysqli_query($con,$query2);
					   $row = mysqli_fetch_assoc($query_run2);
					   $bookid=$row['max(book_id)'];
					   //echo $bookid;
					  // echo $bookid+1;
					   move_uploaded_file($img_tmp,$target_file);
					   
					   $suser_id = mysqli_real_escape_string($con,$_SESSION['user_id']);
					   $sclg_id = mysqli_real_escape_string($con,$_SESSION['clg_id']);
					   $query3="Insert into ad_submit(`user_id`, `prod_id`, `ad_title`, `category`, `description`, `photo_id`,`clg_id`) values('$suser_id','$bookid+1','$adtitle','$category','$description','$target_file','$sclg_id')";
					   $query_run3 = mysqli_query($con,$query3);
					   
					   header('location:adview.php');
				 }
				 
			  }
			  else{
				  
				  header('location:clgdetails.php');
				  
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

