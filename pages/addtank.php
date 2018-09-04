<!DOCTYPE html>
<?php 
	include("include/link.php");
	session_start();
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
                        
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            
                            <li>
                                <a href="main.php"><i class=""></i> Home</a>
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
						<div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Add New Tank
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form role="form" action = "" method = "POST">
                                            
                                            
											<div class="form-group">
                                                <label>Tank Name</label>
                                                <input  type = "text"  class="form-control" placeholder="Tank name" name = "name" required>
                                            </div>
											
											<?php 
											$sql = "SELECT *  FROM product_tbl";
											$result = mysqli_query($link, $sql);
											// output data of each row
											
											if (mysqli_num_rows($result) > 0) {
												echo "<div class='form-group'>
												<label>Product Description</label>
												<select class='form-control' name = 'type' required>";
                                                 
												while($row = mysqli_fetch_assoc($result)) {
													echo "<option>".$row['product_name']."</option>";
												}
												echo "</select>
												</div>";
											}else{
												echo "<script>alert ('Add Product')</script>";
												echo "<script>self.location = 'addproduct.php'</script>";
												exit();
											}
											
											?>
											<div class="form-group">
                                                <label>Capacity</label>
                                                <input type = "text" class="form-control" placeholder="2000 litres" name = "capacity" required>
                                            </div>
											
											<button type="submit" class="btn btn-success" name = "submit">Submit </button>
                                        </form>
										<?php 
											if (isset($_POST['submit'])){
												$_name = mysqli_real_escape_string($link, $_POST['name']);
												$_cap = mysqli_real_escape_string($link, $_POST['capacity']);
												$_type = mysqli_real_escape_string($link, $_POST['type']);
												
												$sql = "SELECT * FROM tank_tbl WHERE tank_name = '".$_name."'";
												$result = mysqli_query($link,$sql);
												$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
												$count = mysqli_num_rows($result);
												
												if($count == 1) {
													echo "<script>alert ('Tank name already exists')</script>";
													echo "<script>window.close(); </script>";
													exit();
													
												}else{
													$sql = "INSERT INTO tank_tbl (tank_name,product_name, capacity) VALUES ('".$_name."','".$_type."', '".$_cap."')";
			
													if (mysqli_query($link, $sql)) {
														echo "<script>alert ('Tank successfully created')</script>";
														
													} else {
														echo "<div style='background-color: #FFD2D2;' >
														<button class='close' data-dismiss='alert'>&times;</button>
														<strong>Error!</strong> data not saved.
														</div>";
													}
													
												}
																								
											}
										
										
										?>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                    </div>
                    <!-- /.row -->
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
