<?php
session_start();

?>

<?php
include("library.php");
if (isset($_SESSION['username'])) {
  header("Location:menu.php");
}

if(isset($_POST['username']) )   //Check if user has submitted the form
{


  $user1 = new User();
  $user1->username = $_POST['username'];
  $user1->password = $_POST['password'];
  $user1->login();//call the login() function from library.php

}



?>

<!DOCTYPE html>
<html>

<head>
<title>Cinema.exe</title>
 <link rel="stylesheet" href="css/styles.css?v=<?php echo time(); ?>">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

  <div class="header">
    <h1>Cinema.exe</h1>
    <h4>For your Imagination</h4>
    <div class="menu">
      <ul>
        <li><a class="active" href="index.php">Home</a></li>
        <li style="float:right"><a href="Register.php">Register</a></li>
      </ul>
    </div>
  </div>

  <div class="register">
    <h2>Login</h2>

  <div class="register-c">
    <form action="login.php" method="POST">
      <label for="username">Userame:</label><br>
      <input type="text" id="username" name="username"><br>
      <label for="password">Password:</label><br>
      <input type="password" id="password" name="password"><br>
      <input type="submit" value="Submit">
    </form>
  </div>

  </div>
  <div class="footer">
    
    </div>

</body>

</html>