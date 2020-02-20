<?php 
	class BaseController
	{
		protected $folder;
		// dung protected de cac ke thua co the su dung bien folder
		function show($file,$data=array()){
			$view_file = 'views/'.$this->folder.'/'.$file.'.php';
			if(is_file($view_file)){
				extract($data);
				//ob_start();
				require_once($view_file);
				//$content = ob_get_contents();
				//require_once("views/layouts/application.php");
			}else{
				header("location: index.php?controller=User&action=error");
			}
		}
	}

 ?>