<?php
session_start();
require_once ( 'inc/function.php' );

$smarty = new Smarty;

$DB = NewADOConnection('mysql');
$DB->Connect($sql_host, $sql_user, $sql_pass, $sql_dbase);

require_once("borders.php");
/*
$email = $_SESSION['login'];
$klient_id = $_SESSION['klient_id'];
//print_r($_SESSION);

$smarty->assign('info', $email);
$smarty->assign('klient_id', $klient_id);
*/

//$sql = "SELECT wyspa, ranking, x, y, ile_pola, max_pola FROM cms_users WHERE id=$klient_id";
//echo $sql;
$user = $DB->GetRow($sql);
$smarty->assign('user', $user);

$smarty->display('panel.tpl');


?>
