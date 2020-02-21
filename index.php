<?php
if (isset($_GET['controller'])) {
  	$controller = $_GET['controller'];
  	if (isset($_GET['action'])) {
    	$action = $_GET['action'];
  	} else {
    	$action = 'allproducts';
  	}
} else {
 	$controller = 'User';
  	$action = 'login2';
}
require_once('routes.php');
?>