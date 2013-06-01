<?php
session_start();
require_once ( 'inc/function.php' );

$smarty = new Smarty;

session_destroy();

header("Location: /");

$smarty->display('c_stats.tpl');

?>