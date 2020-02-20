<?php 
	class Database
	{
		private $host = "mysql:host=localhost;dbname=MiniProject;charset=utf8mb4;useUnicode=true";
		private $username = "congnguyen";
		private $password = "1234";
		private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,  );
		protected $conn;
		public function connect(){
			try{
				$this->conn = new PDO($this->host,$this->username,$this->password,$this->options);
				return $this->conn;
			}catch(PDOException $e){
				echo "Error: ".$e->getMessage();
			}
			return null;
		}
		public function close(){
			$this->conn = null;
		}	
	}
 ?>