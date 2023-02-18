<?php
//include library and settings php files and make an object on the settings function
session_start();
include("library.php");
include("settings.php");
$settings = new settings();
$settings->read_settings();
?>
<?php
//check if username is set, if not forward you to login.php
if (!isset($_SESSION['username'])) {
  header("location:login.php");
}

?>

<?php
// Create and check connection
$conn = mysqli_connect("localhost", "pavlos1", "1234", "newcin");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


//link films DB to cinema
$sql = "SELECT * FROM films";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['film_id'];
    $title = $row['film_name'];
    $year = $row['film_year'];
    $type = $row['film_type'];
  }
}
?>

<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cinema.exe</title>
  <link rel="stylesheet" href="css/styles.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>

  </style>
</head>

<body>
  <div class="header">
    <h1><?php echo $_SESSION['cinema_name'] ?></h1>
    <h4>For your Imagination</h4>
    <div class="menu">
      <ul>
        <li><a href="admin_menu.php">Home</a></li>
        <li><a href="admin_page.php">Admin Page</a></li>
        <li style="float:right"><a href="logout.php">Log Out</a></li>
        <?php echo "<li style='float:right'><a href='#'>User: admin</a></li>";?>
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
      <p>Genre:<a href="#">Animation</a></p>

      <a href="berserk.php"><button class="button" type="submit" onclick="">Book Now!</button></a>



    </div>

    <div class="column">
    <img src="pics/tssr.jpg">
      <h2><a href="shawr.php">The Shawshank Redemption</a></h2>
      <p>Over the course of several years, two convicts form a friendship,
        seeking consolation and, eventually, redemption through basic compassion.
        Chronicles the experiences of a formerly successful banker as a prisoner
        in the gloomy jailhouse of Shawshank after being found guilty of a crime he did not commit.</p>
        <p>Genre:<a href="#">Drama</a></p>
        <a href="shawr.php"><button class="button" type="submit" onclick="">Book Now!</button></a>
    </div>
    <div class="column">
    <img src="pics/jw.jpg">
      <h2><a href="jw.php">John Wick</a></h2>
      <p>It is the first installment in the John Wick film series.
        The story follows former hitman John Wick and his attempt
        to hunt down the men who broke into his home, stole his vintage car,
        and killed his puppy, which was a last gift to him from his
        recently deceased wife.</p>
        <p>Genre:<a href="#">Action</a></p>
      <a href="jw.php"><button class="button" type="submit" onclick="">Book Now!</button></a>
    </div>
  </div>
  <div class="footer">

  </div>

</body>

</html>