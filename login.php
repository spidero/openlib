<?php
session_start();
require_once ( 'inc/function.php' );

$smarty = new Smarty;

$DB = NewADOConnection('mysql');
$DB->Connect($sql_host, $sql_user, $sql_pass, $sql_dbase);

//require_once("borders.php");

$submit = $_POST['submit'];

if (isset($submit)){
//  echo "submit";

	$email = clean($_POST['login']);
	$haslo = koduj(clean($_POST['haslo']));
	
//	echo "$email|$haslo";
	try {	
	  $sql = "SELECT * FROM ".$sql_prefix."_user WHERE email=? and pass=? and aktywny=1 and domains=? LIMIT 1";
	  $zaw = $DB->GetRow($sql, array ($email, $haslo, $d));
	} catch (exception $e) {
	  print_r($e);
	} 
	
	try {	
	  $sql="SELECT * FROM ".$sql_prefix."_user WHERE login=? and pass=? and status!=0 and domain=? LIMIT 1";
	  $nick = $DB->GetRow($sql, array ($email, $haslo, $d));
	} catch (exception $e) {
//	  print_r($e);
	} 

	
	if (!empty($zaw) OR !empty($nick)){
		
		$_SESSION['login']= $email;
		$_SESSION['ident']= koduj($email);
		$smarty->assign('info', "OK");
		$smarty->assign('log', "1");
		//$smarty->assign('klient_id', );
		header("Location: /panel/");

		if (!empty($zaw)) $log_id = (int)$zaw[id_user];
		else $log_id = (int)$nick[id_user];
		$_SESSION['klient_id']= (int)$log_id;
//		$DB->Execute("UPDATE cms_users SET data_log='".date("Y-m-d H:i:s")."' WHERE id=$log_id ");
	}
	else {
		//echo "nie zalogowany";
/*echo "<pre>";
print_r($zaw);
echo "</pre>";
echo "<pre>";
print_r($nick);
echo "</pre>";*/
		$smarty->assign('info', "Podany email / hasło jest nieprawidłowe lub konto nie aktwyne.");
	}
}


//print_r($_SESSION);

$smarty->display('login.tpl');
?>
