<?php
  session_start();
  include "db.php";
  if(!empty($_GET)) {
    $_SESSION['app'] = $_GET['app'];
    $_SESSION['r'] = $_GET['r'];
    if(isset($_GET['m'])) {
      $e=2;
    }
    if(isset($_GET['u'])) {
      $_SESSION['u'] = $_GET['u'];
      $_SESSION['t'] = $_GET['t'];
    }
  }

if(isset($_SESSION['app'])) {
    
?>
<!DOCTYPE html>
<html>
<head>
  <title>Caupona</title>
  <link rel="icon" href="https://lh4.googleusercontent.com/BjecnO0IRd2m94hjptLgSkMNPB47DIEAltkeHkLUe0T8JrF4KxpsdYB4X0-wLvtWTnhszkJB05eD4iw=w1440-h900">
  <meta content="width=device-width,initial-scale=1" name="viewport">
  <?php
    if(isset($e) && $e == 1) {
      ?>
  <script>
  alert("There was some error! Open the app after closing it!")
  </script>
      <?php
    }
    elseif(isset($e)&&$e==2) {
      ?>
      <script>
        window.location = "manager.php";
      </script>
      <?php
    }
  ?>
  <style type="text/css">
    h4 {
      /*font-weight:  !important;*/
    }
  </style>
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
      <a class="navbar-brand" href="."><h2 style="margin-top: -10px"><i class="fa fa-cutlery"></i>Caupona</h2></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href=".">Menu</a></li>
        <?php if(isset($_SESSION['u'])) { ?><li><a href="myorders.php">My orders: <span id="orders"><?php
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
<?php

  $qry3 = "SELECT * FROM `univ_menus` ORDER BY cat";
  $run3 = mysqli_query($conn,$qry3);

  $qry4 = "SELECT * FROM `Restaurents`";
  $run4 = mysqli_query($conn,$qry4);

  while($row = mysqli_fetch_array($run4)) {
    if($row['id']==$_SESSION['r'])
      $r = $row['name'];
  }

  ?>

    <h1 align="center" style="font-size: 3em;"><?php echo $r; ?></h1><br>
  <?php

  $cat = 0; 
  while($row = mysqli_fetch_array($run3)) {

    if($row['rest_id'] == $_SESSION['r']) {
      if($cat != $row['cat']) {
        if($row['cat'] == 1) {
          echo "<h1>Appetizers</h1>";
        }
        elseif($row['cat'] == 2) {
          echo "<h1>Main Course</h1>";
        }
        elseif($row['cat'] == 3) {
          echo "<h1>Desserts</h1>";
        }
        elseif($row['cat'] == 4) {
          echo "<h1>Beverages</h1>";
        }
        $cat = $row['cat'];
      }
    ?>

    <div class="col-md-3">
      <div class="row"><img src="<?php echo $row['image_url']; ?>" width="100%"></div>
      <div class="row">
        <div class="col-md-10 col-xs-10"><h2><?php echo $row['food_item']; ?><?php if($row['allergens']) echo "<sup>*</sup>"; ?></h2></div>
        <div class="col-xs-2 col-md-2" style="padding: 5%;"><?php if($row['veg']) echo "<img height='20px' src='http://21425-presscdn.pagely.netdna-cdn.com/wp-content/uploads/2013/05/veg-300x259.jpg'>"; else echo "<img height='20px' src='http://21425-presscdn.pagely.netdna-cdn.com/wp-content/uploads/2013/05/non-veg-300x259.jpg'>"; ?></div>
      </div>
      <div class="row"><h4 align="center">₹<?php echo $row['price']; ?></h4></div>
      <div class="row"><h4 align="center"><?php echo $row['description']; ?></h4></div>
      <div class="row text-center"><a href="order.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Order</a></div>
      
    </div>

    <hr id="mobi">

    <?php
    }
  }
  
?>
    <div class="col-md-12"><h5>*May contain allergens.</h5></div>
  </div>

<?php
  include "cssjs.php";
?>

<style type="text/css">
  
    nav {
      background-color: #7cb342 !important;
    }
    #mobi {
      display: none;
    }
    @media screen and (max-width: 576px) {
      #mobi {
        display: block;
      }
    }
</style>
</body> <?php } ?>
</html>