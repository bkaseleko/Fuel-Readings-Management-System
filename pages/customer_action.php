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
						<div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Customer Informations
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
							<div class="col-lg-6">
                            <form role="form" action = "" method = "POST">
							<div class="form-group">
                                <label>Select By Type</label>
                                <select class="form-control" name = "type" required>
                                    <option>All</option>
                                    <option>Debtor</option>
                                    <option>Creditor</option>
                                 </select>
								 
								 <button type="submit" class="btn btn-success" name = "submit" style = "margin-top:3%;">Submit </button>
								 
								
                             </div>
							 </form>
                             </div>
							 
                                <div class="dataTable_wrapper">
								<?php 
									if (isset($_POST['submit'])){
										if ($_POST['type'] == "All"){
											$sql = "SELECT *  FROM customer_info";
											$result = mysqli_query($link, $sql);
											// output data of each row
											
											if (mysqli_num_rows($result) > 0) {
												echo "<table class='table table-striped table-bordered table-hover' id='dataTables-example'>
												<thead>
												<tr>
                                                <th>Customer name</th>
                                                <th>Email Address </th>
                                                <th>Mobile</th>
                                                <th>Type</th>
                                                <th>Edit</th>
												
												<th>Delete</th>
												</tr>
												</thead>";
												while($row = mysqli_fetch_assoc($result)) {
													echo "<tbody>
													<tr class='even gradeC'>
													<td>".$row['customer_name']."</td>
													<td>".$row['customer_emal']."</td>
													<td>".$row['customer_mob']."</td>
													<td>".$row['customer_type']."</td>
													<td class='center'><a href = 'edit.php?id=".base64_encode($row['customer_id'])."&name=".base64_encode($row['customer_name'])."&mail=".base64_encode($row['customer_emal'])."&mob=".base64_encode($row['customer_mob'])."' target='_new'><button class='btn btn-outline btn-primary btn-xs'>Edit </button></a></td>
													
													<td class='center'><a href = 'delete.php?id=".base64_encode($row['customer_id'])."'<button type='submit' class='btn btn-outline btn-danger btn-xs' name = 'submit'>Delete </button></td>
													</tr>
                                            
													</tbody>";
												}
												
											}else{
												echo "<div style='background-color: #FFD2D2;' >
												<strong>No data found!</strong> 
												</div>";
											}
										
										
											
										}else if ($_POST['type'] == "Creditor") {
											$sql = "SELECT *  FROM customer_info WHERE customer_type = '".$_POST['type']."'";
											$result = mysqli_query($link, $sql);
											// output data of each row
											
											if (mysqli_num_rows($result) > 0) {
												echo "<table class='table table-striped table-bordered table-hover' id='dataTables-example'>
												<thead>
												<tr>
                                                <th>Customer name</th>
                                                <th>Email Address </th>
                                                <th>Mobile</th>
                                                <th>Type</th>
                                                <th>Edit</th>
												
												<th>Delete</th>
												</tr>
												</thead>";
												
												while($row = mysqli_fetch_assoc($result)) {
													echo "<tbody>
													<tr class='even gradeC'>
													<td>".$row['customer_name']."</td>
													<td>".$row['customer_emal']."</td>
													<td>".$row['customer_mob']."</td>
													<td>".$row['customer_type']."</td>
													<td class='center'><a href = 'edit.php?id=".base64_encode($row['customer_id'])."&name=".base64_encode($row['customer_name'])."&mail=".base64_encode($row['customer_emal'])."&mob=".base64_encode($row['customer_mob'])."' target='_new'><button class='btn btn-outline btn-primary btn-xs' name = 'submit'>Edit </button></a></td>
													
													<td class='center'><button type='submit' class='btn btn-outline btn-danger btn-xs' name = 'submit'>Delete </button></td>
													</tr>
                                            
													</tbody>";
												}
												
											}else{
												echo "<div style='background-color: #FFD2D2;' >
												<strong>No data found!</strong> 
												</div>";
											}
											
										}else if ($_POST['type'] == "Debtor"){
											$sql = "SELECT *  FROM customer_info WHERE customer_type = '".$_POST['type']."'";
											$result = mysqli_query($link, $sql);
											// output data of each row
											
											if (mysqli_num_rows($result) > 0) {
												echo "<table class='table table-striped table-bordered table-hover' id='dataTables-example'>
												<thead>
												<tr>
                                                <th>Customer name</th>
                                                <th>Email Address </th>
                                                <th>Mobile</th>
                                                <th>Type</th>
                                                <th>Edit</th>
												
												<th>Delete</th>
												</tr>
												</thead>";
												while($row = mysqli_fetch_assoc($result)) {
													echo "<tbody>
													<tr class='even gradeC'>
													<td>".$row['customer_name']."</td>
													<td>".$row['customer_emal']."</td>
													<td>".$row['customer_mob']."</td>
													<td>".$row['customer_type']."</td>
													<td class='center'><a href = 'edit.php?id=".base64_encode($row['customer_id'])."&name=".base64_encode($row['customer_name'])."&mail=".base64_encode($row['customer_emal'])."&mob=".base64_encode($row['customer_mob'])."' target='_new'><button class='btn btn-outline btn-primary btn-xs' name = 'submit'>Edit </button></a></td>
													
													<td class='center'><button type='submit' class='btn btn-outline btn-danger btn-xs' name = 'submit'>Delete </button></td>
													</tr>
                                            
													</tbody>";
												}
												
											}else{
												echo "<div style='background-color: #FFD2D2;' >
												<strong>No data found!</strong> 
												</div>";
											}
											
										}
										
									}
									
							 
							 
							 
								?>
                                    
                                        
                                    </table>
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
