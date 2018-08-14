<?php 	
	function dbconn(){
		$servername= "localhost";
		$username="root";
		$password="";
		$dbname="blog_db";

		// Create connection
		$conn = new mysqli($servername,$username,$password,$dbname);
		return $conn;

	}

	function testconn(){

		// Check connection
		if($conn->connect_error){
			echo "Connection failed".$conn->connect_error;
		}else{
			echo "Connected successfully in the database";
		}
	}

 ?>