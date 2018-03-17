<?php
    include("../includes/connection.php");
    session_start();
	
	if(!isset($_SESSION['user_email'])){
	    header("location: index.php");
	}
	else
	{
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

	<?php
		$user = $_SESSION['user_email'];
	    $get_user = "SELECT * FROM users WHERE user_email='$user'";
		$run_user = mysqli_query($con,$get_user);
		$row = mysqli_fetch_array($run_user);
		$user_id = $row['user_id'];
		$user_name = $row['user_name'];
		$user_dob = $row['user_dob'];
		$u_email = $row['user_email'];
		
	?>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"><strong>CyberSafe</strong></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li><a href="home.php">Home</a></li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      Alerts <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> Suspecious Actitivity has found in Vipul Lohani
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> Suspecious Actitivity has found in Sidhant Kohli
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php echo "$user_name"; ?> <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Edit Account</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="home.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			<?php
			
				global $con;
				$dusra = "SELECT * FROM posts where parent_id ='$user_id'";
				$kuch = mysqli_query($con,$dusra);
				$cnt = mysqli_num_rows($kuch);
			?>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $cnt; ?></div>
                                    <div>Total Suspecious Posts!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#lejao">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
				<?php
			
					global $con;
					$dusra = "SELECT * FROM posts where parent_id ='$user_id' and flag=1";
					$kuch = mysqli_query($con,$dusra);
					$cnt = mysqli_num_rows($kuch);
				?>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $cnt; ?></div>
                                    <div>bullying/Abusing like Posts</div>
                                </div>
                            </div>
                        </div>
                        <a href="#lejao">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
				<?php
			
					global $con;
					$dusra = "SELECT * FROM posts where parent_id ='$user_id' and flag=0";
					$kuch = mysqli_query($con,$dusra);
					$cnt = mysqli_num_rows($kuch);
				?>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $cnt; ?></div>
                                    <div>Depressed/Anxiety like Posts</div>
                                </div>
                            </div>
                        </div>
                        <a href="#lejao">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">0</div>
                                    <div>Requests to be Supervisor</div>
                                </div>
                            </div>
                        </div>
                        <a href="#lejao">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Suspecious Activity History
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-area-chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-clock-o fa-fw"></i> Posts may contain Negativity 
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" id="lejao">
                            <ul class="timeline">
                            <?php
								
							global $con;
							$get_posts = "SELECT * FROM posts where parent_id ='$user_id'";
							$run_posts = mysqli_query($con,$get_posts);
							while($row_posts = mysqli_fetch_array($run_posts)){
							$post_id = $row_posts['post_id'];  
							$user_id = $row_posts['user_id'];  
							$parent_id = $row_posts['parent_id'];
							$content = $row_posts['content'];
							$flag = $row_posts['flag'];			
							$post_time = $row_posts['post_time'];  
		
							//getting the user who has posted the thread
							$user = "SELECT * FROM users WHERE user_id='$user_id'";
							$run_user = mysqli_query($con,$user);
							$row_user=mysqli_fetch_array($run_user);
							$user_name = $row_user['user_name'];
								//displaying post 
								if($flag==0){
								echo "
									<li class='timeline-inverted'>
										<div class='timeline-badge warning'><i class='fa fa-check'></i>
										</div>
										<div class='timeline-panel'>
                                        <div class='timeline-heading'>
                                            <h4 class='timeline-title'>$user_name</h4>
                                            <p><small class='text-muted'><i class='fa fa-clock-o'></i> $post_time</small>
                                            </p>
                                        </div>
                                        <div class='timeline-body'>
                                            <p>$content</p>
                                        </div>
										</div>
									</li>
								";}
								else
								{
									echo "<li>
										<div class='timeline-badge warning'><i class='fa fa-check'></i>
										</div>
										<div class='timeline-panel'>
                                        <div class='timeline-heading'>
                                            <h4 class='timeline-title'>$user_name</h4>
                                            <p><small class='text-muted'><i class='fa fa-clock-o'></i> $post_time</small>
                                            </p>
                                        </div>
                                        <div class='timeline-body'>
                                            <p>$content</p>
                                        </div>
										</div>
									</li>";
								}
								}
							?>                 
                            </ul>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Notifications Panel
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
						<?php	
							
							$ab = "SELECT * FROM posts where parent_id ='$user_id'";
							$dusra = mysqli_query($con,$ab);
							$cnt = mysqli_num_rows($run_posts);
							while($row_posts = mysqli_fetch_array($dusra)){
							$post_id = $row_posts['post_id'];  
							$user_id = $row_posts['user_id'];  
							$parent_id = $row_posts['parent_id'];
							$content = $row_posts['content'];
							$flag = $row_posts['flag'];			
							$post_time = $row_posts['post_time'];  
		
							//getting the user who has posted the thread
							$user = "SELECT * FROM users WHERE user_id='$user_id'";
							$run_user = mysqli_query($con,$user);
							$row_user=mysqli_fetch_array($run_user);
							$user_name = $row_user['user_name'];
							
                            echo "
							<a href='#lejao' class='list-group-item'>
								<i class='fa fa-comment fa-fw'></i>Suspecious Actitivity has found in $user_name
                                <span class='pull-right text-muted small'><em>$post_time</em>
                                </span>
                            </a>
							";
							}
                         ?>
                            </div>
                            <!-- /.list-group -->
                            <a href="#" class="btn btn-default btn-block">View All Alerts</a>
                        </div>
                        <!-- /.panel-body -->	
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Request to be a Supervisior
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <form method="post" action="">
									<input type="" class="form-control" placeholder="Email whom you want to be supervisor"><br>
								    <button type="submit" class="btn btn-default">Send Request</button>
								</form>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
<?php } ?>