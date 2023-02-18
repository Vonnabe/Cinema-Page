
<?php

class User {
  // Properties
  public $username;
  public $password;
  public $name;
  public $email;
  public $utype;
  public $conn;
  
  function connect()
  {
// Create connection
        $this->conn = mysqli_connect("localhost", "pavlos1", "1234", "newcin");
// Check connection
        if (!$this->conn) 
        {
           die("Connection failed: " . mysqli_connect_error());
        }
  }  
  function login()//make a login function in order to save the database users
  {
	$this->connect();
        $sql = "SELECT * FROM users where username='".$this->username. "' and password='".$this->password."'";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) >0)
        {
        
            while($row=mysqli_fetch_assoc($result))
            {
                $this->username=$row['username'];
                $this->name=$row['name'];
                $this->email=$row['email'];
		$this->utype = $row['utype'];
            }
            $_SESSION['username']= $this->username;
            $_SESSION['name']= $this->name;
            $_SESSION['email']= $this->email;
            $_SESSION['utype']= $this->utype;
            mysqli_close($this->conn);
            if($this->utype==0)
            {
                 header("location:menu.php");
            }
            else
            {
                 header("location:admin_menu.php");  
            }
        }
        else
        {
            mysqli_close($this->conn);
             
        }	  
  }
  function signup()//make a signup function in order to create users in the DB
    {
        
        $this->connect();
        $sql = "SELECT * FROM users where username='".$this->username."'";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) >0)
        {
            mysqli_close($this->conn);
        }
        else
        {
            $sql = "INSERT INTO users  (username, password, name, email, utype) values ('"
           .$this->username. "','"
           .$this->password. "','"
           .$this->name. "','"
           .$this->email. "','"
           .$this->utype. "')";

	$result= mysqli_query($this->conn, $sql); 
	if($result)
	{   
         mysqli_close($this->conn);
	 $_SESSION['username']= $this->username;
	 $_SESSION['name']= $this->name;
	 $_SESSION['email']= $this->email;
	 $_SESSION['utype']= $this->utype;
     
          header("location:menu.php");
	 
	}   
	else

	{
            mysqli_close($this->conn);
		
	}
  }
} 
  
  
}
?>