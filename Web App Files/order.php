<?php

	session_start();
	include "db.php";
  if(isset($_SESSION['app'])) {
	if(isset($_POST['quantity'])) {
		$r = $_SESSION['r'];
		$u = $_SESSION['u'];
		$t = $_SESSION['t'];
		$q = $_POST['quantity'];
		$f = $_GET['id'];
		$qry2 = "SELECT * FROM `univ_menus`";
		$run2 = mysqli_query($conn,$qry2);
		while($row = mysqli_fetch_array($run2)) {
			if($row['id'] == $f) {
				$price = $row['price'];
			}
		}
		$tot = $price * $q;
		$qry1 = "INSERT INTO `orders` SET rest_id = '$r', customer_email = '$u', tabno = '$t', food_id = '$f', total = '$tot', quantity = '$q'";
		$run1 = mysqli_query($conn,$qry1);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Order</title>
	<?php
		if( isset($run1) && $run1) {
			?>

	<script type="text/javascript">
    alert("Your order has been placed!");
		window.location = "./myorders.php";
	</script>

			<?php
		}
	?>
	<meta content="width=device-width,initial-scale=1" name="viewport">
</head>
<body>
	<div class="container-fluid">
	<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><h2 style="margin-top: -10px"><i class="fa fa-cutlery"></i>Caupona</h2></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href=".">Menu</a></li>
        <?php if(isset($_SESSION['u'])) { ?><li class="active"><a href="myorders.php">My orders: <span id="orders"><?php
          $qryf = "SELECT * FROM `orders` WHERE customer_email = '".$_SESSION['u']."'";
          $runf = mysqli_query($conn,$qryf);
          $numq = 0;  
          while($row = mysqli_fetch_array($runf)) {
            if($row['paid']==0)
              $numq++;
          }
          echo $numq;
        ?></span></a></li>
          <li><a>Welcome, <?php echo $_SESSION['u']; ?></a></li>
        <?php } ?>
      </ul>
      <!-- <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form> -->
      <!-- <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul> -->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav><br><br><br>
	<form method="post" action="./order.php?id=<?php echo $_GET['id']; ?>">
		<input type="text" name="quantity" class="form-control" placeholder="quantity" id="q" >
		<input type="submit" name="btn0" id="btn0" class="btn btn-primary" value="Add" style="display: none;">
	</form>
	</div>
	<?php include "cssjs.php"; ?>
  <script type="text/javascript">
    $(document).ready(function() {
      setInterval(function() {
        if($("#q").val() > 0) {
          $("#btn0").css("display","block");
        }
        else {
          $("#btn0").css("display","none"); 
        }
      },10);
    });
  </script>
</body>
<?php } ?>
</html>