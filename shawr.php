<?php
session_start();
?>
<?php
//check if username is set, if not forward you to index.php
if (!isset($_SESSION['username'])) {
    Header("Location:index.php");
}
//call show.php and make the variables from the show.php file
include("shows.php");
$username = $_SESSION['username'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$utype = $_SESSION['utype'];
$seats_limit = $_SESSION['seats_limit'];
$what_show = new shows();

if (isset($_GET['submit'])) {
    //when submit is clicked, make these variables
    $bookdate = $_GET['bookdate'];
    $what_seat = $_GET['what_seat'];

    // Create connection
    $conn = mysqli_connect("localhost", "pavlos1", "1234", "newcin");
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //select the table reservation from DB and output these values
    $sql = "SELECT * from reservations where "
        . "res_date = '" . $bookdate . "' "
        . "and seat =  $what_seat "
        . "and prov_id = '2'";



    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        mysqli_close($conn);
    } else {
        //insert these variables into the DB
        $sql = "INSERT INTO reservations  (username, res_date, prov_id, seat) values ('"
            . $username . "','"
            . $bookdate . "',"
            . 2 . ","
            . $what_seat . ")";


        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        if ($result) {

            header("Location:menu.php");
        }
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
                <?php
                if ($username !== "admin") {
                    echo "<li><a href='menu.php'>Home</a></li>";
                } else {
                    echo "<li><a href='admin_menu.php'>Home</a></li>";
                }
                ?>
                <li style="float:right"><a href="logout.php">Log Out</a></li>
                <?php echo "<li style='float:right'><a href='#'>User: $username</a></li>"; ?>
            </ul>
        </div>
    </div>

    <div class="poster">
        <img src="pics/tssr.jpg">
        <h2><a href="#">The Shawshank Redemption</a></h2>

        <p>Over the course of several years, two convicts form a friendship,
            seeking consolation and, eventually, redemption through basic compassion.
            Chronicles the experiences of a formerly successful banker as a prisoner
            in the gloomy jailhouse of Shawshank after being found guilty of a crime he did not commit.</p>
        <p>Genre:<a href="#">Drama</a></p>


        <h1>Berserk</h1>

        <h3>Choose Date: </h3>
        <form method="GET">
            <div class="input-group">
                <input type="date" id="bookdate" name="bookdate" value="<?php echo $_SESSION['date_now']; ?>" min="<?php echo $_SESSION['date_now']; ?>" max="<?php echo $_SESSION['date_limit']; ?>" onchange="document.getElementById('show1').checked=true;
           my_date=this.value;show_seats(this.value,my_show);">


                <h3>Choose seat</h3>
                <?php
                //make a loop for choosing the seats
                for ($i = 1; $i <= $seats_limit; $i++) {
                    echo "<div class='radio'>";
                    $id =  'seat' . $i;
                    echo "<label><input  id= '" . $id . "' type= 'radio' name='what_seat'  value=$i>$i</label>";
                    echo "</div>";
                }
                ?>
                <input type="submit" name="submit" value="submit">


                <script>
                    function show_seats(what_date, what_show) {
                        const xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                for (i = 1; i < 50; i++) {
                                    let sid = "seat" + i;
                                    document.getElementById(sid).disabled = false;
                                }
                                json_seats = JSON.parse(this.responseText);
                                for (const key in json_seats) {
                                    let id = "seat" + key;
                                    document.getElementById(id).disabled = true;
                                }
                            }
                        }
                        xhttp.open("GET", "available.php?d=" + what_date + "&p=" + what_show);
                        xhttp.send();
                    }
                </script>

                <div class="footer">

                </div>


</body>

</html>