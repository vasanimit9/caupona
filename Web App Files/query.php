<?php

	session_start();
	include "db.php";	
  if(isset($_GET['app'])||isset($_SESSION['app'])) {

if($_GET['a']==1) {
  $qry = "UPDATE `orders` SET status = 1 WHERE id = ".$_GET['id'];
}
elseif($_GET['a']==2) {
  $qry = "UPDATE `orders` SET paid = 1 WHERE tabno = ".$_GET['id']." AND rest_id = ".$_SESSION['r'];
}

$run = mysqli_query($conn,$qry);

if($run)
header("Location: ./manager.php");
else {
?>
<script>
alert("Some error occured"!);
window.location = "./manager.php";
</script>

<?php } }