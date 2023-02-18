<?php
//call the library.php file
session_start();
include("library.php");
if (isset($_SESSION['username'])) {
  Header("Location:menu.php");
}
?>

<?php


//if submit is clicked make the the variables and call the signup() function
if (isset($_POST['username'])) {
  $u1 = new User();

  $u1->username = $_POST['username'];
  $u1->password = $_POST['password'];
  $u1->name = $_POST['name'];
  $u1->email = $_POST['email'];
  $u1->utype = 0;

  $u1->signup();
  Header("Location:menu.php");
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
        <li style="float:right"><a href="login.php">Log In</a></li>
      </ul>
    </div>
  </div>

  <div class="register">
    <h2>Register</h2>

  <div class="register-c">
    <form action="register.php" method="POST">
    <label for="name">Username:</label><br>
      <input type="text" id="username" name="username"><br>
      <label for="name">Name:</label><br>
      <input type="text" id="name" name="name"><br>
      <label for="password">Password:</label><br>
      <input type="password" id="password" name="password"><br>
      <label for="email">Email:</label><br>
      <input id="email" type="text" class="form-control" name="email"><br>
      <input type="submit" value="Submit">
    </form>
  </div>

  </div>
  <div class="footer">
    
    </div>
</body>

</html>