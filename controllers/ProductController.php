<?php
	require_once("models/product.php");
	require_once("controllers/BaseController.php");
	class ProductController extends BaseController{
		function __construct()
		{
			$this->folder = 'product';
			$this->product = new Product();
		}	
		public function all(){
			$products = $this->product->getAll();
			$data = array('products' => $products);
			$this->show('all', $data);
		}
		public function edit(){
			$prodEdit = $this->product->getOne(htmlspecialchars(strip_tags($_GET['id'])));
			$nameErr = $cateErr = $prodErr = "";
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				if(empty($_POST['name'])){
					$nameErr = "*";
				}else{
					$name = check_input($_POST['name']);
				}
				if(empty($_POST['category'])){
					$cateErr = "*";
				}else{
					$category = check_input($_POST['category']);
				}
				if(empty($_POST['producer'])){
					$prodErr = "*";
				}else{
					$producer = check_input($_POST['producer']);
				}
				if(!empty($_POST['name']) && !empty($_POST['category']) && !empty($_POST['producer'])){
					$this->product->editProduct(check_input($_GET['id']),$name,$category,$producer);
					header('location: index.php?controller=Product&action=all');
				}
			}
			$data = array('prodEdit' => $prodEdit,'nameErr'=>$nameErr,'cateErr'=>$cateErr,'prodErr'=>$prodErr);
			$this->show('edit', $data);
		}
		public function add(){
			$nameErr = $cateErr = $prodErr = "";
			$name = $category = $producer = "";
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				if(empty($_POST['name'])){
					$nameErr = "*";
				}else{
					$name = check_input($_POST['name']);
				}
				if(empty($_POST['category'])){
					$cateErr = "*";
				}else{
					$category = check_input($_POST['category']);
				}
				if(empty($_POST['producer'])){
					$prodErr = "*";
				}else{
					$producer = check_input($_POST['producer']);
				}
				if(!empty($_POST['name']) && !empty($_POST['category']) && !empty($_POST['producer'])){
					$this->product->addProduct($name,$category,$producer);
					header('location: index.php?controller=Product&action=all');
				}
			}
			$data = array('nameErr'=>$nameErr,'cateErr'=>$cateErr,'prodErr'=>$prodErr);
			$this->show('add', $data);
		}
		public function delete(){
			$this->product->deleteProduct(check_input($_GET['id']));
			header('location: index.php?controller=Product&action=all');
		}
	}
	function check_input($input){
		$input = trim($input);
		$input = htmlspecialchars($input);
		$input = stripslashes($input);
		return $input;
	}
	
 ?>