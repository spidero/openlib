<?php
session_start();
require_once ( 'inc/function.php' );

$smarty = new Smarty;

$DB = NewADOConnection('mysql');
$DB->Connect($sql_host, $sql_user, $sql_pass, $sql_dbase);

require_once("borders.php");


  $sql = "
    SELECT *
    FROM `lib_rezewacje` r
    LEFT JOIN lib_books b ON b.id_book = r.id_book
    LEFT JOIN lib_authors a ON b.id_author = a.id_author
    WHERE id_user=?
  ";
//echo $sql;
  $rez = $DB->GetAll($sql, $klient_id);
  $smarty->assign('rez', $rez);

$smarty->display('rezerwacje.tpl');

?>
