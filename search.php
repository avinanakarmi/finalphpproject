<?php include('session.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Women's Collection</title>
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
      <div style=";background-image: url('images/background.jpg');">
        <?php include('header.php') ?>
      </div>
<?php
$db = mysqli_connect("localhost", "root", "", "ecomm");

if (isset($_GET['search'])) {
  $search= $_GET['item'];

  $query= "SELECT * FROM `products` WHERE prod_name like '%$search%'";
  $result=mysqli_query($db,$query);
  $count = mysqli_num_rows($result);?>
  <div style="padding-left:100px;color:gray;">
    <?php echo "<h3>".$count," items found <br><br></h3>"; ?>
  </div>
  <?php
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
            <div class=" col-md-4" style="padding:5px;">
              <a href="#" style="color:black">Add to Cart</a>
            </div>
          </div>
        </div>
      </div>

    <?php   }

}
?>
</div>
<?php include('footer.php') ?>
</body>
</html>
