<?php
session_start();
require_once ( 'inc/function.php' );

$smarty = new Smarty;

$DB = NewADOConnection('mysql');
$DB->Connect($sql_host, $sql_user, $sql_pass, $sql_dbase);

require_once("borders.php");

//$dupa = $DB->Execute("SET lc_time_names = 'pl_PL'");

$art = clean($_GET['art']);

$zaw = $DB->GetOne("
SELECT tresc FROM ".$sql_prefix."_art WHERE temat='$art'
");

$smarty->assign('art', $zaw);
$smarty->display('art.tpl');
?>
