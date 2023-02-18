<?php
session_start();

?>

<?php
//include library.php to connect to DB from library.php
include("library.php");
if (isset($_SESSION['username'])) {
  header("location:menu.php");
}


?>

<!DOCTYPE html>

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
        <li style="float:right"><a href="register.php">Register</a></li>
      </ul>
    </div>
  </div>

  <div class="row">
    <div class="column">
      <img src="pics/guts.png">
      <h2><a href="#">Berserk</a></h2>

      <p>A lone sellsword named Guts gets recruited
        into a mercenary band and attempts to help
        the Band's leader, Griffith, on his rise
        to power. A lone sellsword named Guts gets
        recruited into a mercenary band and attempts
        to help the Band's leader, Griffith, on his rise to power.</p>
      <p>Genre:<a href="#">Animation</a><a href="#">Adventure</a></p>
      <a href="login.php"><button class="button" type="submit" onclick="">Book Now!</button></a>
    </div>
    <div class="column">
      <img src="pics/tssr.jpg">
      <h2><a href="#">The Shawshank Redemption</a></h2>
      <p>Over the course of several years, two convicts form a friendship,
        seeking consolation and, eventually, redemption through basic compassion.
        Chronicles the experiences of a formerly successful banker as a prisoner
        in the gloomy jailhouse of Shawshank after being found guilty of a crime he did not commit.</p>
        <p>Genre:<a href="#">Drama</a></p>
        <a href="login.php"><button class="button" type="submit" onclick="">Book Now!</button></a>
    </div>
    <div class="column">
      <img src="pics/jw.jpg">
      <h2><a href="#">John Wick</a></h2>
      <p>It is the first installment in the John Wick film series.
        The story follows former hitman John Wick and his attempt
        to hunt down the men who broke into his home, stole his vintage car,
        and killed his puppy, which was a last gift to him from his
        recently deceased wife.</p>
        <p>Genre:<a href="#">Action</a></p>
        <a href="login.php"><button class="button" type="submit" onclick="">Book Now!</button></a>
    </div>
  </div>


  <div class="footer">
    
  </div>


</body>

</html>