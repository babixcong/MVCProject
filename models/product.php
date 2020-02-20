<?php 
	require("database.php");
	class Product extends Database{
		protected $conn;
		function __construct()
		{
			$this->conn = $this->connect();
		}
		public function getAll(){
			try{
				$stmt = $this->conn->prepare("SELECT * FROM product;");
				$stmt->execute();
				$records = $stmt->fetchAll();
				return $records;
			}catch(PDOException $e){
				echo "Error:".$e->getMessage();
			}
			return null;
			
		}
		public function addProduct($name,$category,$prod){
			try {
				$stmt = $this->conn->prepare("INSERT INTO product(p_name,p_category,p_producer) VALUES(:ten,:loai,:nsx);");
				$stmt->execute(['ten'=>$name,'loai'=>$category,'nsx'=>$prod]);
			} catch (PDOException $e) {
				echo "Error: ".$e->getMessage();
			}
			
		}
		public function editProduct($id,$name,$category,$prod){
			try {
				$stmt = $this->conn->prepare("UPDATE product SET p_name=:ten,p_category=:loai,p_producer=:nsx WHERE p_id=:ma;");
				$stmt->execute(['ma'=>$id,'ten'=>$name,'loai'=>$category,'nsx'=>$prod]);
			} catch (PDOException $e) {
				echo "Error:".$e->getMessage();
				
			}
			
		}
		public function deleteProduct($id){
			try{
				$stmt = $this->conn->prepare("DELETE FROM product WHERE p_id=:ma;");
				$stmt->execute(['ma'=>$id]);
			}catch(PDOException $e){
				echo "Error:".$e->getMessage();
			}
			
		}
		public function getOne($id){
			try{
				$stmt = $this->conn->prepare("SELECT * FROM product WHERE p_id=:ma;");
				$stmt->execute(['ma'=>$id]);
				$record = $stmt->fetch();
				return $record;
			}catch(PDOException $e){
				echo "Error:".$e->getMessage();
			}
			return null;
			
		}


	}


 ?>