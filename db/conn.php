<?php 
// constant variable
define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DB", "mkshope");

/**
* This is Database connection class
*/
class Database
{
	private $host=HOST;
	private $userName=USER;
	private $password=PASSWORD;
	private $db=DB;

	private $con;

	function __construct()
	{
			$this->con = new mysqli($this->host,$this->userName,$this->password,$this->db);
			// echo "Successfuly Connectd.";
			if(!$this->con)
			echo "Connection Faild. ".$this->con->error;
	}

	// inserting data to signup table
	public function InsertData($firstname,$lastname,$username,$email,$password,$profile)
	{
		try {
			$query="INSERT INTO member(firstname,lastname,username,email,password,profile) VALUES('$firstname','$lastname','$username','$email','$password','$profile')";
			$this->con->query($query);
			echo "Data Inserted.";
			return true;
		} catch (Exception $e) {
			echo "Cannot Insert. ".$this->con->error;
		}
	}
}

$connection=new Database;
?>