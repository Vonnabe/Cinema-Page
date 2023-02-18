<?php

class admin_not
{

    public $notification_admin = array();//make array


    function notifications_admin()
    {
        $conn = mysqli_connect("localhost", "pavlos1", "1234", "newcin"); //make connection

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM reservations as reservation";//select table "reservations" from DB
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // Use a while loop to iterate through the rows
            while ($row = mysqli_fetch_assoc($result)) {
                // Print the data for each row
                $checked="checked";
                //make a loop of reservation DB rows
                echo "<input type='checkbox' id='id' name='accept' value=$row[username]>";
                echo "<label for='reservations'> Name: $row[username] / Date: $row[res_date] / Show Id: $row[prov_id] / Seat: $row[seat] / Reservation Condition: $row[approved]</label><br>";
            }
           
        }
    }
}
