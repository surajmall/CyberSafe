<?php
  
    session_start();
	include("login.php");

	?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Registration</title>
	<link rel="shortcut icon" href="images/mnnit-logo.png"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
	<link href="styles/style.css" rel="stylesheet"/>
  </head>
  <body>
  <!--contain start-->
    <div class="contain">
	     <!--head_wrap start-->
	    <div id="head_wrap">	 
		     <!--header start-->
		    <div id="header">
			    <img src="images/logo.png" style="float:left; height:98px;"/>
				<form method="post" action="" id="form1">
				<div class="row">
				    <input type="text" name="email" placeholder="Your E-mail" style="width:200px;"/>
				    <input type="password" name="pass" placeholder="Password" style="width:200px;"/>
				    <button type="submit" class="btn btn-primary" name="login">Login</button>
				</div>
				</form>
			</div>
			 <!--header ends-->
		</div>
		<!--head_wrap ends-->
		<div id="content">
		    <div>
			    <img src="images/on_head.png" style="width:790px; height:560px; float:left;margin-right:40px;"/>
			</div>
			<div>
			    <br><br><center><h2 style="padding-top:20px;"><b style="color:white;">Join us now</b><h2></center>
			    <form method="post" action="index.php" id="form2">
					   <center><input type="text" style="width:400px;" name="u_name" placeholder="Your Name" required="required"/></center><br>
					    <center><input type="email" style="width:400px;" name="u_email" placeholder="Your Valid E-mail" required="required"/></center><br>
						<center><input type="email" style="width:400px;" name="p_email" placeholder="Your Supervisor's Email" required="required"/></center><br>
					    <center><input type="date" style="width:400px;" name="u_dob" placeholder="Date of Birthday" required="required"/></center><br>
					    <center><input type="text" style="width:400px;" name="twitter_handle" placeholder="Your Twitter Handle" required="required"/><br><br>
						<select name="u_gender" style="width:400px;" class="form-control" required="required">
						    <option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
						</center><br>
						<center><input type="password" style="width:400px;" name="u_pass" placeholder="Enter Password" required="required"/></center><br>
					    <center><input type="password" style="width:400px;" name="u_conpass" placeholder="Re-Enter Password" required="required"/></center><br>
						<center><button type="submit" class="btn-lg btn-success" name="sign_up">Confirm and Join</button></center>
                    </div>	
			    </form>
				<?php include("user_insert.php") ?>
			</div>
		</div>
	</div>
     <!--contain ends-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>