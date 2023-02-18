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
//make a new obj of the function admin_not() from admin_not.php
include("admin_not.php");
$notification_admin = new admin_not();
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

    <?php
//if submit is clicked, update the row 'approved' to '1' from the database from table reservation 
    if (isset($_GET['submit'])) {
        $accept=$_GET['accept'];
        $username=$_GET['username'];
        $conn = mysqli_connect("localhost", "pavlos1", "1234", "newcin");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "UPDATE reservations  SET approved='1' WHERE username='".$accept."' ";
        $result = mysqli_query($conn, $sql);          

        mysqli_close($conn);
        if($result)
        {   
         
            header("Location:admin_page.php");
        }   
        
    }
    
    ?>

    <form method="GET">
    <?php
    $notification_admin->notifications_admin();//call the funcion notifications_admin()
    ?> 

        <input type='submit' name='submit' value='submit'></form>


        <div class="footer">
            <p>This is a footer</p>
        </div>
</body>

</html>