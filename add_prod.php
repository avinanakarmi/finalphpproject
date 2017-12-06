<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Product</title>
    <link rel="stylesheet" href="css/add_prod.css">
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
      <div class="heading">
        <h3>Add Product</h3>
        <hr?
      </div>
      <div class="row form" style="height:55vh">
        <form action="prod_db.php" method="post" enctype="multipart/form-data">
          Product Name:&emsp;&emsp;<input id="input" type="text" name="prod_name" width="100%" required><br><br>
          Category:&emsp;&emsp;&emsp;&emsp;<select id="input" name="category" required>
                      <option value="men">Men's</option>
                      <option value="women">Women's</option>
                      <option value="shoes">Shoes</option>
                      <option value="accessories">Accessories</option>
                  </select>
          &emsp;&emsp;&emsp;Quantity:&emsp;&emsp;&emsp;<input id="input" type="number" name="quantity" min=0 required><br><br>
          Price:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input id="input" type="text" name="price" required>&emsp;&emsp;&emsp;Discount:&emsp;&emsp;&emsp;<input id="input" type="text" name="discount"><br><br>
          <div class="row">
            <div class="col-md-1 image">
              Image:
            </div>
            <div class="col-md-11">
              <input type="hidden" name="size" value="1000000">
    			    <input type="file" name="image">
            </div>
          </div><br>
          <input type="submit" name="add" value="Add">
        </form>
      </div>
    </div>
    <?php include('footer.php') ?>
  </body>
</html>
