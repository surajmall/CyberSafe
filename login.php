<?php
   // session_start();
     include("includes/connection.php");
	 if(isset($_POST['login']))
		{
		    $pass= mysqli_real_escape_string($con,$_POST['pass']);
		    $email= mysqli_real_escape_string($con,$_POST['email']);
			
			$get_user = "SELECT * FROM users WHERE user_email = '$email' AND user_pass = '$pass'";
			$run_user = mysqli_query($con,$get_user);
			$check = mysqli_num_rows($run_user);
			if($check == 1)
			{
			    $_SESSION['user_email'] = $email;
				echo "<script>window.open('pages/home.php','_self')</script>";
			}
			else
			{
			    die($get_user);
			    echo "<script>alert('email or passward are not correct please try again')</script>";
			}
        }
?>