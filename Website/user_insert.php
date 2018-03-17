<?php  
    include("includes/connection.php");  
   // session_start();	
    global $con;	
        if(isset($_POST['sign_up']))
		{
		    $name= mysqli_real_escape_string($con,$_POST['u_name']);
		    $email= mysqli_real_escape_string($con,$_POST['u_email']);
		    $dob= mysqli_real_escape_string($con,$_POST['u_dob']);
		    $p_email= mysqli_real_escape_string($con,$_POST['p_email']);
		    $twitter= mysqli_real_escape_string($con,$_POST['twitter_handle']);
		    $gender= mysqli_real_escape_string($con,$_POST['u_gender']);
		    $pass=mysqli_real_escape_string($con,$_POST['u_pass']);
		    $conpass=mysqli_real_escape_string($con,$_POST['u_conpass']);
		    $date= date("d-m-y");
		    $conpass=mysqli_real_escape_string($con,$_POST['u_conpass']);
		    
			$get_email = "SELECT * FROM users WHERE user_email = '$email'";
			$run_email = mysqli_query($con,$get_email);
			$check = mysqli_num_rows($run_email);
			if($check==1)
			{
			    echo "<script>alert('This email is already registered')</script>";
				exit();
			}
			if($pass!=$conpass)
			{
			    echo "<script>alert('Your passward is not matching with second one')</script>";
				exit();
				}
		    if(strlen($pass)<8)
			{
			    echo "<script>alert('passward must contain 8 characters')</script>";
				exit();
			}
			else
			{
			    $insert = "INSERT INTO users(`user_name`, `user_email`, `user_pass`, `parent_email`, `user_dob`, `user_gender`, `Twiter_handle`) VALUES ('$name','$email','$pass','$p_email','$dob','$gender','$twitter')";
				$run_insert = mysqli_query($con,$insert);
				//echo "$run_insert";
				if($run_insert)
				{
					echo "to yaha naii pahuch raha hai";
				    $_SESSION['user_email']=$email;
					echo "yaha tak pahucha ki naii";
				    echo "<script>alert('Congratulation Registered Successfully')</script>";
					echo "<script>window.open('pages/home.php','_self')</script>";
				}
			}
		}	
?>		