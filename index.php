<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>mozo</title>
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="fontawesome/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>

    <div class="container-fluid">
      <div class="row" id="home">
        <!--landing page-->
        <!--navbar included-->
          <div style="height:100vh;background-image:url('images/home.png'); background-repeat: no-repeat; background-size: cover;">
            <?php include('header.php') ?>
          </div>
        </div>
      <div class="row">
        <!--new arrivals-->
        <div class="heading" style="height:10%">
          <center><h3>New Arrivals</h3>
          <span style="color:gray;">Latest From our Store</span></center><br>
        </div>
        <span>
            <?php if(isset($_SESSION['role'])) { ?>
              <form action="" method="post">
                <input type="submit" name="add" value="Add Product">
              </form>
            <?php } ?>
        </span>
        <div class="rows" style="height:45%">
          <!--products line 2-->
        <?php
        $count= 0;
          $db = mysqli_connect("localhost", "root", "", "ecomm");
          $result=mysqli_query($db, "SELECT * FROM `products` order by prod_id desc");
          while ($row = mysqli_fetch_array($result) and $count<6) { ?>
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
                    <div class="col-md-8" style="padding:5px 20px;">
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
                    <div class="link col-md-4" style="padding:5px;">
                      <a href="http://localhost:1234/final%20project/login.php" style="color:black">Add to Cart</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php $count++; } ?>
      </div>
      </div>
      <div>
        <?php include('footer.php') ?>
      </div>
    </div>

  </body>
</html>
<?php
if (isset($_POST['add'])) {
  header('Location: add_prod.php');
}
 ?>
