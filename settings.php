<?php

class Settings{
    
    public $name;
    public $date_now;
    public $date_limit;
    public $seats_limit;
    public $film_id;
    public $film_name;
    public $film_year;
    public $film_type;
    public $film_review;
    
    
    function read_settings()
    {
         
   //default values      
       $this->name="NO NAME";
       $date=date('Y-m-d');
       $this->date_now=$date;

       
       $this->date_limit=$date;
       $this->seats_limit=50;
       
      

// Create connection
        $conn = mysqli_connect("localhost", "pavlos1", "1234", "newcin");
// Check connection
        if (!$conn) 
        {
           die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM settings";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) >0)
        {
        
            $row=mysqli_fetch_assoc($result);
            $this->name=$row['name'];
            $this->date_limit=$row['date_limit'];
            $this->seats_limit=$row['seats_limit'];
        }
        mysqli_close($conn);
        
        $_SESSION['cinema_name']= $this->name;
        $_SESSION['date_now']= $this->date_now;
        $_SESSION['date_limit']= $this->date_limit;
        $_SESSION['seats_limit']= $this->seats_limit;
        
    }
    
}

function find_movie(){
    // Create connection
    $conn = mysqli_connect("localhost", "pavlos1", "1234", "newcin");
// Check connection
    if (!$conn) 
    {
       die("Connection failed: " . mysqli_connect_error());
    }
//link films DB to cinema
$sql = "SELECT * FROM films"; 
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $film_id = $row['film_id'];
    $film_name = $row['film_name'];
    $film_year = $row['film_year'];
    $film_type = $row['film_type'];
    $film_review = $row['film_review'];

    echo $film_id . $film_name . $film_year . $film_type;
  }
}
}
?>
