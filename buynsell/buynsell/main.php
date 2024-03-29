<?php
       session_start();
       require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #555;
}

li {
    float: right;
    border-right:1px solid #bbb;
}

li:last-child {
    border-right: none;
}

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
</head>
<body>

<ul>
  <li><a href="#contact"></a></li>
  <li style="float:right"><a href="#about">About</a></li>
  <li><a href="#contact">Contact</a></li>
   <li><a href="#news">News</a></li>
  <li><a class="active" href="#home">Home</a></li>
</ul>

</body>
</html>
