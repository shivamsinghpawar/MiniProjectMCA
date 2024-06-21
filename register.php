<?php

include "dbconnect.php";


if(isset($_POST['submit']))
{
   if($_POST['submit']=="register")
     {
        $username=$_POST['register_username'];
        $password=$_POST['register_password'];
        $address=$_POST['address'];
		
        $query="select * from users where UserName = '$username'";
        $result=mysqli_query($con,$query) or die(mysql_error);
        if(mysqli_num_rows($result)>0)
        {   
              header("Location: index.php?register=" . "Username is already taken...Use different username");
        }
        else
        {
          $query ="INSERT INTO userss VALUES ('$username','$password', '$address')";
          $result=mysqli_query($con,$query);
          header("Location: index.php?register=" . "Successfully Registered!!");
		  
		   
        
		  $query ="INSERT INTO users VALUES ('$username','$password')";
          $result=mysqli_query($con,$query);
		  
        }
    }
}

?>