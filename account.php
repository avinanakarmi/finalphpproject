<?php include('session.php') ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Account</title>
    <link rel="stylesheet" href="css/account.css">
    <link rel="stylesheet" href="fontawesome/css/font-awesome.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container-fluid">
      <div class="navbar">
        <?php include('header.php') ?>
      </div>

      <div class="row">
        <div class="accDetail col-md-4">

        </div>
        <div class="col-md-8">
          <div class="row tableHeading">
            <div class="col-md-5">
              Product
            </div>
            <div class="col-md-2">
              Price
            </div>
            <div class="col-md-2">
              Quantity
            </div>
            <div class="col-md-2">
              Total
            </div>
          </div>
          <div class="row tableContent" style="height:47vh;">
            <div class="col-md-5">

            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-2">

            </div>
          </div>
          <div class="tableFooter"style="height:10vh;">
            Total
          </div>
        </div>
      </div>
      <?php include('footer.php') ?>
    </div>
  </body>
</html>
