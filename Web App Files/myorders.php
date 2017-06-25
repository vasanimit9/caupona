<?php
	session_start();
	include "db.php";
  if(isset($_GET['app'])||isset($_SESSION['app'])) {
?>

<!DOCTYPE html>
<html>
<head>
	<title>My orders</title>
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
</nav>
<br><br><hr>
<table class="table table-striped table-responsive">
<?php
	$qry1 = "SELECT * FROM `orders` WHERE tabno = ".$_SESSION['t'];
	$run1 = mysqli_query($conn,$qry1);
	$tot = 0;
	while($row = mysqli_fetch_array($run1)) {
		echo "<tr>";
		if($row['paid']==0 && $_SESSION['u'] == $row['customer_email']) {
			$qry2 = "SELECT * FROM `univ_menus`";
			$run2 = mysqli_query($conn,$qry2);
			while($row1 = mysqli_fetch_array($run2)) {
				if($row1['id'] == $row['food_id'])
					echo "<td>".$row1['food_item']."</td>";
			}
			echo "<td>".$row['quantity']."</td>";
			echo "<td>".$row['total']."</td>";
      echo "<td><a href='review.php?id=".$row['id']."' class='btn btn-warning'>Review</a></td>";
      echo "<td><a href='del.php?id=".$row['id']."' class='btn btn-danger'><i class='fa fa-times'></i></a></td>";
			$tot+=$row['total'];
		}
		
		echo "</tr>";
	}
?>
</table>
<h2>Total: <?php echo $tot; ?></h2>
</div>
<?php include "cssjs.php"; } ?>
</body>
</html>