<?php
//session_start();
require_once ( 'inc/function.php' );

$smarty = new Smarty;

$DB = NewADOConnection('mysql');
$DB->Connect($sql_host, $sql_user, $sql_pass, $sql_dbase);

require_once("borders.php");

if (isset($_POST['submit'])){
	//echo "<pre>";
	//print_r($_POST);
	//echo "</pre>";

	$nick = addslashes(clean($_POST['nick']));
	$imie = addslashes(clean($_POST['imie']));
        $nazwisko = addslashes(clean($_POST['nazwisko']));
	$email = addslashes(clean($_POST['mail']));
	$haslo = addslashes(clean($_POST['pass']));
	$haslo_again = clean($_POST['pass_c']);
	$news = addslashes($_POST['news']);
	$reg = addslashes($_POST['reg']);
	$zmienna = mt_rand();
	

	$check = $DB->GetOne("SELECT COUNT(id) AS count FROM ".$sql_prefix."_user WHERE email='$email'");
	$check_nick = $DB->GetOne("SELECT COUNT(id) AS count FROM ".$sql_prefix."_user WHERE login='$nick'");

	if (empty($nick) OR empty($imie) OR empty($nazwisko) OR empty($email) OR empty($haslo) OR empty($reg) ){
		//echo "|$nick| $email| $haslo| $reg|";
		$smarty->assign('info', "Jedno z wymaganych pól jest puste");
		$smarty->assign('back', "1");
	}
	
	elseif ($haslo!=$haslo_again){
		$smarty->assign('info', "Podane hasła nie zgadzają się");
		$smarty->assign('back', "1");
	}
	
	elseif (!ereg("^.+@.+\\..+$", $email)) {
		$smarty->assign('info', "Podany email jest nieprawidłowy");
		$smarty->assign('back', "1");
	}
	
	elseif ($check>0){
		$smarty->assign('info', "Podany email jest już zarejestrowany w systemie");
		$smarty->assign('back', "1");	
	}

	elseif ($check_nick>0){
		$smarty->assign('info', "Podany nick jest już zarejestrowany w systemie");
		$smarty->assign('back', "1");	
	}

	else {

	$smarty->assign('send', "1");
	$sql = "INSERT INTO ".$sql_prefix."_user (login, imie, nazwisko, email, pass, news, authcode, domain) VALUES ('$nick', '$imie', '$nazwisko', '$email', '".koduj($haslo)."', '$news', '$zmienna', '$d')";
	//echo $sql;
	$rs = $DB->Execute($sql);
	
	$temat = "Email aktywacyjny wysłany ze strony .eu ".date("Y/m/d H:i:s");

$wiadomosc = '
<html>
<head>
 <title>Dane:</title>
</head>
<body>
<a href="http://lib.dev.torrid.eu/aktywuj.php?authcode='.$zmienna.'&email='.$email.'">http://lib.dev.torrid.eu/aktywuj.php?authcode='.$zmienna.'&email='.$email.'</a>
</body>
</html>
';

$naglowki  = "MIME-Version: 1.0\r\n";
$naglowki .= "Content-type: text/html; charset=UTF-8\r\n";

$naglowki .= "From:Rejestracja <automat@torrid.eu>\r\n";
$naglowki .= "X-Mailer: sCMS Torrid\r\n";

mail($email, $temat, $wiadomosc, $naglowki);

//echo "poszlo";

}


}

$smarty->display('register.tpl');

?>
