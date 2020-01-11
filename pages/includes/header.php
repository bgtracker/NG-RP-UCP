<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LA:RP - UCP</title>
    <!-- Bootstrap Styles-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="../assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="../assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /> 
     
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../pages/index.php"><i class="fa fa-users" aria-hidden="true"></i> <strong>LA:RP UCP</strong></a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
				<?php
				if(isset($_SESSION['playername']))
				{
				?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="../pages/chars.php"><i class="fa fa-user fa-fw"></i> My Characters</a>
                        </li>
                        <li class="divider"></li>
                        <?php
                        if($_SESSION['playeradmin'] >= 2) {
                            echo "
                            <li><a href='../pages/admin.php'><i class='fa fa-user fa-fw'></i> Admin Panel</a>
                            </li><li class='divider'></li>
                            ";
                        }
                        ?>
                        <?php
                        if($_SESSION['Member'] == 1 || $_SESSION['Member'] == 2 || $_SESSION['Member'] == 3 || $_SESSION['Member'] == 7 || $_SESSION['Member'] == 11  || $_SESSION['Member'] == 12 || $_SESSION['Member'] == 13 || $_SESSION['Member'] == 16 || $_SESSION['Member'] == 5) {
                            echo "
                            <li><a href='../pages/mdc.php'><i class='fa fa-user fa-fw'></i> MDC</a>
                            </li><li class='divider'></li>
                            ";
                        }
                        ?>
                        <li><a href="changepassword.php"><i class="fa fa-user fa-fw"></i> Change Password</a>
                        <li class="divider"></li>
                        <li><a href="../pages/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
				<?php } 
				else
				{
					
				?>
				<li class="dropdown">
				<a class="dropdown-toggle" href="../pages/login.php" aria-expanded="false">Login</a>
				</li>
				<?php 
				}
				?>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
		
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="../pages/index.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>

                </ul>

            </div>

        </nav>
		        <div id="page-wrapper">
            <div id="page-inner">