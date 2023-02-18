<?php
//making a file to check if seats are free
session_start();
if (!isset($_SESSION['username'])) {
    Header("Location:index.php");
}
include("reserved.php");
$username = $_SESSION['username'];

$what_show = $_GET['p'];
$what_date = $_GET['d'];

$what_reserved = new reserved();
$what_reserved->show_reserved($what_date, $what_show);
$seats_json = json_encode($what_reserved->reserved_seats);
echo $seats_json;
?>
