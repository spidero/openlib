<?php
//session_start();
require_once ( 'inc/function.php' );

$smarty = new Smarty;

$DB = NewADOConnection('mysql');
$DB->Connect($sql_host, $sql_user, $sql_pass, $sql_dbase);

require_once("borders.php");

$authcode = clean($_GET['authcode']);
$email = clean($_GET['email']);

//echo "$authcode - $email";

$zap = " SELECT count( * ) AS suma FROM lib_user WHERE authcode='$authcode' AND email='$email' AND status=0";

$spr_auth = $DB->GetOne($zap);

//print_r($spr_auth);

if ($spr_auth>=1){

	$zap = " UPDATE lib_user SET status=1 WHERE email='$email'";
	$spr_auth = $DB->Execute($zap);
	$smarty->assign('info', "Użytkownik został aktywowany."); 
}
else {
	$smarty->assign('info', "Błędny kod aktywacji lub email.");
}

$smarty->display('aktywuj.tpl');
?>
