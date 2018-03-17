<?php
	include("includes/connection.php");
	if(isset($_POST['approve'])){                                                                               
	$update = "UPDATE users SET flag=1 WHERE user_id='$parent_id'";
	$run_update = mysqli_query($con,$update);
	if($run_update)
	{
	    echo "<script>alert('you have approved')</script>";
	}
	}
?>