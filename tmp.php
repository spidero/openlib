<?php
session_start();
require_once ( 'inc/function.php' );

$smarty = new Smarty;

$DB = NewADOConnection('mysql');
$DB->Connect($sql_host, $sql_user, $sql_pass, $sql_dbase);

require_once("borders.php");

//$email = $_SESSION['login'];
//$klient_id = $_SESSION['klient_id'];
//print_r($_SESSION);



$smarty->display('poczta.tpl');

?>
