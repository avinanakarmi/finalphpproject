<?php
include('session.php');
if($_SESSION['user']=null){
  header('Location:login.php');
}
$db= mysqli_connect("localhost","root","","ecomm");
if(isset($_POST['add'])) {
  if(isset($_POST['add']))
   {
    $product_id= $row['prod_id'];
    $usr_id = $_SESSION['user'];
    $query1="insert into cart(prod_id,user_id) values('$product_id','$usr_id')";
    $sql1=mysqli_query($db,$query1);
    if(!$sql1)
    {
      echo "ERROR ADDING ITEM TO CART";
    }
  }
}
 ?>
