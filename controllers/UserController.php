<?php 
	SecureSession(0,'/', 'localhost',true,true);
	require_once("models/user.php");
	require_once("controllers/BaseController.php");
	class UserController extends BaseController{
		protected $user;
		function __construct()
		{
			$this->folder = 'user' ;
			$this->user = new User();
		}	
		public function login(){
			if(isset($_SESSION['user'])){
				header("location: index.php?controller=Product&action=all");
				exit();
			} elseif(isset($_COOKIE['usercookie'])){
				$uc = $_COOKIE['usercookie'];
				$user1 = new User();
				$u = $user1->get($uc);
				$count = $u['cnt'];
				if($count == 1){
					$_SESSION['user'] = $_COOKIE['usercookie'];
					header("location: index.php?controller=Product&action=all");
					exit();
				}
			}
			$err =  "";
			if(isset($_POST['login'])){
				$username = check_input($_POST['username']);
				$password = check_input($_POST['password']);
				$password = md5($password);
				if(isset($_POST['username']) && isset($_POST['password'])){
					$user2 = new User();
					$row = $user2->check($username,$password);
					$count = $row['cnt'];
					if($count == 1){
						$unam = $row['username'];
						if (isset($_POST['remember'])) {
							setcookie('usercookie',$unam,time()+3600);
							echo "da set cookie";
						}
						$_SESSION['user'] = $unam;
						header("location: index.php?controller=Product&action=all");
						exit();
					}
					else{
						$err = "Incorrect Username or Password";
						//require_once("views/user/login.php");
						$data = array('err'=>$err);
						$this->show('login', $data);
					}
				}else{
					$err = "Incorrect Username or Password";
					$data = array('err'=>$err);
					$this->show('login', $data);
				}
			} else {
				$err = "Login first";
				$data = array('err'=>$err);
				$this->show('login', $data);
			}

		}

		public function logout(){
			session_destroy();  
			if(isset($_COOKIE['usercookie'])){
 				setcookie('usercookie','',-1);
			}
			header("location: index.php?controller=User&action=login");
		}

		public function error(){
			$data = array('error'=>'Page Not Found He he');
			$this->show('error',$data);
		}
	}
	function check_input($input){
		$input = trim($input);
		$input = htmlspecialchars($input);
		$input = stripslashes($input);
		return $input;
	}
	function SecureSession($life,$path,$domain,$secure,$httpOnly){
		session_set_cookie_params($life,$path,$domain,$secure,$httpOnly);
		session_start();
	}

 ?>
 <script type="text/javascript">
 	alert(document.cookie);
 </script>