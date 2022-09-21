<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "user";

$con = mysqli_connect($server,$user,$password,$db);

if($con){
   ?>
   <script>
         alert("Connection Successful");
   </script>
   <?php
}else{
    ?>
    <script>
    	alert("no connection");
    </script>
    <?php
}


?>