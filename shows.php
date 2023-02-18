<?php

class Shows
{
    //make a funtion to call all the shows and screening of the DB in one file
    public $provoles = array();
    function show_films()
    {

        
        // Create connection
        $conn = mysqli_connect("localhost", "pavlos1", "1234", "newcin");
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT provoles.prov_id as id,provoles.time_start as start,provoles.time_end as end,provoles.film_id,  "
            . "films.film_id, films.film_name as title, films.film_year as year from provoles left join films on "
            . "provoles.film_id=films.film_id order by provoles.prov_id";
            
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($this->provoles, $row);
            }
            mysqli_close($conn);
        }
    }
}
?>