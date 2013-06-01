<?php

if ( isset($_SESSION['login'])!="") {

//print_r($_SESSION);
	$smarty->assign('log', "1");
	$smarty->assign('login', $_SESSION['login']);

	$email = $_SESSION['login'];
	$klient_id = $_SESSION['klient_id'];
  
	$smarty->assign('info', $email);
	$smarty->assign('klient_id', $klient_id);
        
	$sql = "SELECT imie, nazwisko, status FROM ".$sql_prefix."_user WHERE login=? LIMIT 1";
	$dane = $DB->GetRow($sql, array ($email));
	$smarty->assign('dane', $dane);
        /*        
	$sql = "SELECT * FROM zasoby WHERE nick=? LIMIT 1";
	$zasoby = $DB->GetRow($sql, array ($email));
	*/
	$sql = "SELECT count(*) FROM lib_rezewacje WHERE id_user=? LIMIT 1";
	$tmp = $DB->GetRow($sql, $klient_id); 
	$zasoby['rezerwacje'] = $tmp[0];

	$smarty->assign('zasoby', $zasoby);
	
	$tmp = $DB->Execute("SET lc_time_names = 'pl_PL'");
	$tmp = $DB->Execute("SET NAMES 'UTF8'");

	$sql = "SELECT COUNT(id) AS ile_poczty FROM cms_poczta WHERE id_do=$klient_id AND `read`=0 LIMIT 1";
	//echo $sql;
	$poczta = $DB->GetRow($sql);
	//print_r($poczta);
	$smarty->assign('poczta', $poczta['ile_poczty']);

}
//print "test";

?>