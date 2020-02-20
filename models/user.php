<?php 
	require_once("database.php");
	class User extends Database{
		protected $conn;
		function __construct()
		{
			$this->conn = $this->connect();
		}
		public function check($username,$password){
			try{
				$stmt = $this->conn->prepare("SELECT COUNT(*) AS cnt,username FROM user WHERE username = :us AND password = :ma");
				$stmt->execute(['us'=>$username,'ma'=>$password]);
				$u = $stmt->fetch();
				return $u;
			}
			catch(PDOException $e){
				echo "There is some problem in connection: " . $e->getMessage();
			}
			return null;
		}
		public function get($us){
			try{
				$stmt=$this->conn->prepare("SELECT COUNT(*) AS cnt,username FROM user where username=:us");
				$stmt->execute(['us'=>$us]);
				$u = $stmt->fetch();
				return $u;
		}catch(PDOException $e){
			echo "Error: ".$e->getMessage();
		}
		}
	}
 ?>