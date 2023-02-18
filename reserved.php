<?php

class reserved
{
    //make a funtions to check if reservations have happened
    public  $reserved_seats = array();
    function show_reserved($d, $p)
    {




        $conn = mysqli_connect("localhost", "pavlos1", "1234", "newcin");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * from reservations where res_date = '" . $d . "' "

            . "and prov_id =  $p "
            . "and aprroved != 0";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $this->reserved_seats[$row['seat']] = 2;
            }
            mysqli_close($conn);
        }
    }
}
