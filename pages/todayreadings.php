<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
include("include/link.php");
session_start();
$total;
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Today Readings</title>
	
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>

</head>

<body>

	<div id="page-wrap">

		<h2 id="header">METER READINGS REPORT</h2>
		
		<div id="identity">
		
            <p id="address">
<?php echo date("l jS , F Y ");?>
</p> 
		</div>
		
		<div style="clear:both"></div>
		
		
		
		<table id="items" cellspacing = "10">
		<?php 
		$sql = "SELECT *  FROM readings_tbl WHERE Date LIKE '%".$_REQUEST['date']."%'";
		$result = mysqli_query($link, $sql);
		if (mysqli_num_rows($result) > 0) {
			echo "<tr>
		      <th>SN</th>
		      <th>Date</th>
		      <th>Pump</th>
		      <th>Attendant</th>
		      <th>Product</th>
		      <th>Tank</th>
		      <th>Read(O)</th>
		      <th>Read(C)</th>
		      <th>Quantity</th>
		      <th>Amount</th>
				</tr>";
				$sql1 = "SELECT SUM(Amount) FROM readings_tbl WHERE Date LIKE '%".$_REQUEST['date']."%'";
				$result1 = mysqli_query($link,$sql1);
				$row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);	
				$total =  $row1['SUM(Amount)'];
			$i = 1;
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr class='item-row'>
		      <td class='item-name'><div class='delete-wpr'>".$i."</div></td>
		      <td class=\"item-name\"><div class=\"delete-wpr\">".date ('Y-m-d',strtotime($row['Date']))."</div></td>
		      <td class=\"item-name\"><div class=\"delete-wpr\">".$row['Pump']."</div></td>
		      <td class=\"item-name\"><div class=\"delete-wpr\">".$row['Attendant']."</div></td>
		      <td class=\"item-name\"><div class=\"delete-wpr\">".$row['Product']."</div></td>
		      <td class=\"item-name\"><div class=\"delete-wpr\">".$row['Tank']."</div></td>
		      <td class=\"item-name\"><div class=\"delete-wpr\">".$row['Read_O']."</div></td>
		      <td class=\"item-name\"><div class=\"delete-wpr\">".$row['Read_C']."</div></td>
		      <td class=\"item-name\"><div class=\"delete-wpr\">".$row['Quantity']."</div></td>
		      <td class=\"item-name\"><div class=\"delete-wpr\">".$row['Amount']."</div></td>
		      
		  </tr>";
		   echo "<tr id=\"hiderow\">
		    <td colspan=\"5\"> </td>
		  </tr>
		  
		  <tr>
		      <td colspan=\"2\" class=\"blank\"> </td>
		      <td colspan=\"2\" class=\"total-line balance\">Total</td>
		      <td class=\"total-value balance\"><div class=\"due\">".$total." /=</div></td>
		  </tr>
		  ";
			$i++;
			}
		}else{
			echo "No value today";
		}
		
		
		
		?>
		  
		  
		  
		  
		  
		  
		 
		
		</table>
		
		<div id="terms">
		  <h5>Terms of Fuel Station own this system</h5>
		  Printed on <?php echo date("l jS , F Y ");?>
		</div>
	
	</div>
	
</body>

</html>