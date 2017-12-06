<?php
  include('session.php');
	$db = mysqli_connect("localhost", "root", "", "ecomm");
	$msg = "";

	if (isset($_POST['add'])) {
		$target = "images/".basename($_FILES['image']['name']);


		$image = $_FILES['image']['name'];
    $prod_name=$_POST['prod_name'];
    $category=$_POST['category'];
    $quantity=$_POST['quantity'];
    $price=$_POST['price'];
    $discount=$_POST['discount'];


		$sql = "INSERT INTO products (image,prod_name,category,quantity,price,discount)
        VALUES ('$image','$prod_name','$category','$quantity','$price','$discount')";
		mysqli_query($db, $sql);

		if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
			$msg = "Product added successfully";
		}else{
			$msg = "Failed to add product";
		}
	}
  header('Location: add_prod.php');
?>
