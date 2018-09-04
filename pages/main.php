<!DOCTYPE html>
<?php 
	include("include/link.php");
	session_start();
	$petrolc;
	$petrolp;
	$dieselc;
	$dieselp;
	
	//Diesel price
	$sql = "SELECT *  FROM product_tbl WHERE product_name = 'Diesel'";
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$count = mysqli_num_rows($result);
	if($count > 0) {
		$dieselc = $row['product_cost'];;
		$dieselp = $row['product_price'];
		
	}else{
		$dieselc = "No current data";
		$dieselp= "No current data";	
	}
	
	//Petrol price & Cost
	//Diesel price
	$sql1 = "SELECT *  FROM product_tbl WHERE product_name = 'Petrol'";
	$result1 = mysqli_query($link,$sql1);
	$row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
	$count1 = mysqli_num_rows($result1);
	if($count1 > 0) {
		$petrolc = $row1['product_cost'];;
		$petrolp = $row1['product_price'];
		
	}else{
		$petrolc = "No current data";
		$petrolp= "No current data";	
	}
	
	
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>FSMS</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">Fuel Station Management System</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="main.php"><i class="fa fa-home fa-fw"></i> Home</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                    
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <?php echo ucwords($_SESSION['usr']);?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> Change PIN</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Change Password</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="signout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            
                            <li>
                                <a href="main.php"><i class=""></i> Menu</a>
                            </li>
                            <li>
                                <a href="#"><i class=""></i> Add New<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="addcustomer.php">Customer</a>
                                    </li>
									<li>
                                        <a href="addprice.php">Price Code</a>
                                    </li>
									<li>
                                        <a href="addproduct.php">Product</a>
                                    </li>
									<li>
                                        <a href="addpump.php">Pump</a>
                                    </li>
									<li>
                                        <a href="addtank.php">Tank</a>
                                    </li>
                                    
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="customer_action.php"><i class=""></i> Customer Operations</a>
                            </li>
                            <li>
                                <a href="readings.php"><i class=""></i> Readings</a>
                            </li>
                            
                            
                            
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="page-header">Today, <?php echo date("l jS , F Y ");?></h4>
                        </div>
                        <!-- /.col-lg-12 -->
						
                    </div>
                    <!-- /.row -->
					<h1> Petrol Current Price & Cost</h1>
					<h4> Petrol Cost: <?php echo $petrolc;  ?> <br><br>   Petrol Price: <?php echo $petrolp;  ?></h4>
					
					<h1> Diesel Current Price & Cost</h1>
					<h4> Diesel Cost:  <?php echo $dieselc;  ?> <br><br>   Diesel Price: <?php echo $dieselp;  ?></h4>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

    </body>
</html>
