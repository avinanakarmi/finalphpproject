<?php include('session.php') ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>login</title>
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="fontawesome/css/font-awesome.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>

     <div style="height:100vh;background-image:url('images/background.jpg'); background-repeat: no-repeat; background-size: cover;">
       <div class="form">
         <center>
           <h2>Login</h2>
           <hr style="border-color:black;">
           <?php if(isset($_SESSION['error'])){
                    echo $_SESSION['error'];
                    $_SESSION['error']=null; }
           ?>
           <form action="login.php" method="post">
             <br><i class="fa fa-user"></i>&emsp;<input id="input" type="text" placeholder="Username" name="username" required><br><br>
             <i class="fa fa-lock"></i>&emsp;<input id="input" type="password" placeholder="Password" name="password" required><br><br>
             <a href="register.php">Create New Account</a><br><br>
             <input type="submit" name="login" value="Login"><br>
           </form>

         </center>
       </div>
     </div>



  </body>
</html>
<?php
$db = mysqli_connect("localhost", "root", "", "ecomm");
if (isset($_POST['login'])) {
  $username=$_POST['username'];
  $pw=$_POST['password'];
  $password=md5($pw);
  $query="select * from users where username='$username' and password='$password'";
  $sql=mysqli_query($db,$query);
  $result=mysqli_fetch_assoc($sql);
  if($result>0){
    $_SESSION['user']=$result['user_id'];
    $_SESSION['role']=$result['role'];
    header('Location:index.php');
  }
  else {
    $_SESSION['error']="Invalid Credentials";
    header('Location:login.php');
  }
}

 ?>
