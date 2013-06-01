<?php
session_start();
require_once ( 'inc/function.php' );

$smarty = new Smarty;

$DB = NewADOConnection('mysql');
$DB->Connect($sql_host, $sql_user, $sql_pass, $sql_dbase);

require_once("borders.php");

  $sql = "
  SELECT r.date, r.status, u.imie, u.nazwisko, b.book, b.id_book
  FROM `lib_rezewacje` r
  LEFT JOIN lib_books b ON r.id_book=b.id_book
  LEFT JOIN lib_user u ON u.id_user=r.id_user
  WHERE domain='$d'
  ";
//echo $sql;
  $rez = $DB->GetAll($sql);
/*echo "<pre>";
print_r($rez);
echo "</pre>";*/
  $smarty->assign('rez', $rez);


$smarty->display('przegladaj_rezerwacje.tpl');

?>
