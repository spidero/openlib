<?php
session_start();
require_once ( 'inc/function.php' );

$smarty = new Smarty;

$DB = NewADOConnection('mysql');
$DB->Connect($sql_host, $sql_user, $sql_pass, $sql_dbase);

require_once("borders.php");

  $sql = "
    SELECT * FROM `lib_user`
    WHERE domain='$d' AND status='1'
  ";
//echo $sql;
  $users = $DB->GetAll($sql);
//print_r($users);
  $smarty->assign('users', $users);


$smarty->display('przegladaj_czytelnikow.tpl');

?>
