<?php
	session_start();
	include "db.php";
  if(isset($_GET['app'])||isset($_SESSION['app'])) {
	if(isset($_GET['id'])) {
		$qry = "DELETE FROM `orders` WHERE id = '".$_GET['id']."'";
		$run = mysqli_query($conn, $qry);
		?>

<!DOCTYPE html>
<html>
<head>
	<title>Delete</title>
	<script type="text/javascript">
		window.location = "./myorders.php";
	</script>
</head>
<body>

</body>
</html>

		<?php
	}
}
?>