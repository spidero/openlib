<?php
session_start();
require_once ( 'inc/function.php' );

$smarty = new Smarty;

$DB = NewADOConnection('mysql');
$DB->Connect($sql_host, $sql_user, $sql_pass, $sql_dbase);

require_once("borders.php");

if (isset($_GET['id']) AND $_GET['opt']=="dodaj"){

  $id =(int)$_GET['id'];
  $sql = "INSERT INTO lib_books_local (lib, id_book) VALUES('$d', $id)";
  $tmp = $DB->Execute($sql);
}

  $sql = "
    SELECT *
    FROM `lib_books` b
    LEFT JOIN lib_authors a ON b.id_author = a.id_author
  ";
//echo $sql;
  $books = $DB->GetAll($sql);
  $smarty->assign('books', $books);

$smarty->display('przegladaj_zasoby.tpl');

?>
