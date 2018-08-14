<?php 

require_once('dbconn.php');
class user
{
	public $FirstName;
	public $LastName;
	public $Email;
    public $pwd;
    public $message;
	
	// Login function for each User
	function login()
	{
		$hashPassword = self::hashPassword($this->pwd);
		$conn = dbconn();
		$sql = "select * from user_tbl where Email = '".$this->Email."' and Password = '".$hashPassword."'";
		$result =$conn->query($sql);

		if($result){

			$count = $result->num_rows;
			return $count;
		}else{
			return "Error: ".$sql."<br>".$conn->error;
		}

		$conn->close();
	}

    // Password hash function
	function hashPassword($pwd){
		$hash = md5(md5($pwd));
		return $hash;
	}
	


	//Registration function process
	function register()
	{
        $pwd_hash = self::hashPassword($this->pwd);
		$conn = dbconn();

		$sql = "INSERT INTO user_tbl(FirstName,LastName,Email,Password)  VALUES('$this->FirstName','$this->LastName','$this->Email','$pwd_hash')";

		if($conn->query($sql) === TRUE){
			//echo "new record created!";
			return "success";
		}else{
			return "Error: ".$sql."<br>".$conn->error;
		}

		$conn->close();
	}

}
 ?>
