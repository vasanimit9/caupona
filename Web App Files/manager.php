<?php

	session_start();
	include "db.php";	
  if(isset($_GET['app'])||isset($_SESSION['app'])) {
?>

<!DOCTYPE html>
<html>
<head>
	<title>Manager's site</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta http-equiv="refresh" content="20">
</head>
<body>
<table class="table table-responsive table-striped">
	<tr>
		<th>Table no</th>
		<th>Food item</th>
		<th>Quantity</th>
		<th>Total</th>
		<th>Time Of Order</th>
		<th>Delivery</th>
	</tr>
<?php
	$qry1 = "SELECT * FROM `orders` ORDER BY timeoforder";
	$run1 = mysqli_query($conn,$qry1);
	while($row = mysqli_fetch_array($run1)) {
		if($row['rest_id']==$_SESSION['r'] && $row['status']==0) {
			?>
			<tr <?php if($row['customer_email']=="") echo "style='display:none;'" ?> >
				<td><?php echo $row['tabno']; ?></td>
				<td><?php 
					$qry2 = "SELECT * FROM `univ_menus`";
					$run2 = mysqli_query($conn,$qry2);
					while($row1 = mysqli_fetch_array($run2)) {
						if($row['food_id']==$row1['id'])
							echo $row1['food_item'];
					}
				 ?></td>
				 <td><?php echo $row['quantity']; ?></td>
				 <td><?php echo $row['total']; ?></td>
				 <td><?php echo $row['timeoforder']; ?></td>
				 <td><?php if(!$row['status']) { ?><a href="query.php?a=1&id=<?php echo $row['id']; ?>" class="btn btn-primary"><i class="fa fa-check"></i></a><?php } else { echo "Delivered"; } ?></td>
			</tr>
			<?php
		}
	}
?>
</table>
<table class="table table-responsive table-striped">

<tr>
	<th>Table no.</th>
	<th>Total</th>
	<th>Paid</th>
</tr>
<?php

	$qry3 = "SELECT * FROM `orders` WHERE paid = 0 AND rest_id = ".$_SESSION['r']." ORDER BY tabno";
	$run3 = mysqli_query($conn,$qry3);
	$i =0;
	$tot = 0;
	while ($row = mysqli_fetch_array($run3)) {
		if($i!=$row['tabno']  && $row['paid'] != 1 ) {
			if($i != 0 && $row['paid'] != 1) {
				?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $tot; ?></td>
					<td><a href="./query.php?a=2&id=<?php echo $i; ?>" class="btn btn-success"><i class="fa fa-check"></i></a></td>
				</tr>
				<?php
			}
			$i = $row['tabno'];
			$tot = 0;

		}
		$tot += $row['total'];
	}
?>
</table>
<?php include "cssjs.php"; } ?>
</body>
</html>