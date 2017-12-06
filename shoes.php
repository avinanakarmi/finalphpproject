<?php include('session.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Shoes</title>
    <link rel="stylesheet" href="css/display.css">
    <link rel="stylesheet" href="fontawesome/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>

    <div class="container-fluid" style="padding:0px 100px">
      <div style=" height:100vh;background-image: url('images/background.jpg');">
        <?php include('header.php') ?>
      </div>
      <div class="">
        <center><h2>Shoes</h2>
        Lorem ipsum dolor sit amet, consectetur <br><br></center>
        <div>
        <form action="search.php" method="get">
          <input placeholder="Enter your search term..." type="text" value="" name="item" id="input">
          <button type="submit" name="search"><i class="glyphicon glyphicon-search"></i></button>
        </form>
        </div><br><br>
      </div>
    <?php
    $db = mysqli_connect("localhost", "root", "", "ecomm");
    $category="shoes";
    $result=mysqli_query($db, "SELECT * FROM `products` WHERE category='$category'");
    	while ($row = mysqli_fetch_array($result)) { ?>
          <div class="col-md-4 product">
            <div class="card">
                <div style="background-color:#f3f4f8;height:25px;">
                  <?php
                    if($row['quantity']==0){
                          echo "<img src='images/out-of-stock.png'>";
                    }
                    if($row['discount']>0 && $row['quantity']!=0) {
                      echo "<img src='images/sale.png'>";
                      }
                   ?>
                </div>
                <div class="card-image">
                  <?php echo "<img src='images/".$row['image']."' >"; ?>
                </div>
              <div class="card-content" style="padding:20px;">
                <p><?php echo $row['prod_name'] ;?></p>
              </div>
              <div class="row">
                <div class="col-md-5" style="padding:5px 20px;">
                  <?php
                    if($row['discount']>0 && $row['quantity']!=0) {
                        $x=$row['price'];
                        $offer=$x-($x*$row['discount']/100);
                      ?>
                    <strike style="color:red;"><span><?php echo "$".$row['price'] ?></span></strike><span><?php echo "   $".$offer ?></span>
                  <?php }
                  else { ?>
                    <span><?php echo "$".$row['price'] ?></span>
                <?php } ?>
                </div>
                <div class=" col-md-4" style="padding:5px;">
                  <form action="cart.php" method="post">
                    <input id="cart" type="submit" name="add" value="Add to Cart">
                  </form>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
    </div>
    <?php include('footer.php') ?>
  </body>
</html>
