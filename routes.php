<?php
$controllers = array(
  'Product' => ['all', 'edit','add'],
  'User' => ['login','error','logout']
); 
if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
  $controller = 'User';
  $action = 'error';
}
include_once('controllers/' . $controller . 'Controller.php');
$klass = $controller.'Controller';
$controller = new $klass;
$controller->$action();
?>