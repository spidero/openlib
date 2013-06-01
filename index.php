<?php
//session_start();
require_once ( 'inc/function.php' );

$smarty = new Smarty;

$DB = NewADOConnection('mysql');
$DB->Connect($sql_host, $sql_user, $sql_pass, $sql_dbase);


$dupa = $DB->Execute("SET lc_time_names = 'pl_PL'");


$pytania = $DB->GetAll("
	SELECT id AS idpy, nick, temat, tresc, kom,DATE_FORMAT(data, '%e %b %Y') AS data, 
	(SELECT COUNT(*) FROM ".$sql_prefix."_koment WHERE id_pyt=idpy) AS odp_count 
FROM ".$sql_prefix."_news WHERE akt='1'
ORDER BY id DESC 
LIMIT 0, 5
");

$smarty->assign('pytania', $pytania);

$smarty->display('index.tpl');


?>
