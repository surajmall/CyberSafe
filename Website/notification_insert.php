<?php  
    include("includes/connection.php");  
   // session_start();	
    global $con;	
        if(isset($_POST['req_super']))
		{
		    $child_email= mysqli_real_escape_string($con,$_POST['child_email']);
			$get_id = "SELECT * FROM users WHERE user_email = '$child_email'";
			$run_id = mysqli_query($con,$get_id);
			$row = mysqli_fetch_array($run_id);
			$u_id = $row['user_id'];
			//echo "$u_id";
			$insert = "INSERT INTO notification(`child_id`, `parent_id`, `flag`, `notification_time`) VALUES ('$u_id','$user_id',0,NOW())";
			$run_insert = mysqli_query($con,$insert);
			if($run_insert)
			{
			    echo "<script>alert('Request has been sent')</script>";
			}
		}
?>		