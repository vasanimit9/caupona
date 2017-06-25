<?php

	session_start();
	include "db.php";

	if(isset($_SESSION['app'])) {

	if(isset($_GET['s'])) {

		$qry2 = "INSERT INTO `reviews` SET food_id = ".$_GET['id'].", rating = ".$_GET['s'];
		$run2 = mysqli_query($conn,$qry2);

	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Review</title>
	<?php

	if(isset($run2)) {
		if($run2) {
			?>

	<script type="text/javascript">
		alert("Thank you!");
		window.location = "myorders.php";
	</script>

			<?php
		}
	
		else {
			if($run2) {
				?>

		<script type="text/javascript">
			alert("There was some error! Please try again.");
			window.location = "myorders.php";
		</script>

				<?php
			}
		}
	}

	?>
</head>
<body>

<?php

	$qry = "SELECT * FROM `univ_menus`";
	$run = mysqli_query($conn,$qry);
	while($row = mysqli_fetch_array($run)) {
		if($_GET['id'] == $row['id'])
			echo "<h2>Rate ".$row['food_item']."</h2>";
	}

?>

<a href="./review.php?id=<?php echo $_GET['id']; ?>&s=1" class="btn btn-warning">1</a>
<a href="./review.php?id=<?php echo $_GET['id']; ?>&s=2" class="btn btn-warning">2</a>
<a href="./review.php?id=<?php echo $_GET['id']; ?>&s=3" class="btn btn-warning">3</a>
<a href="./review.php?id=<?php echo $_GET['id']; ?>&s=4" class="btn btn-warning">4</a>
<a href="./review.php?id=<?php echo $_GET['id']; ?>&s=5" class="btn btn-warning">5</a>


<?php include "cssjs.php"; ?>
</body>
</html>

<?php } ?>