<?php
session_start();
require_once ( 'inc/function.php' );

$smarty = new Smarty;

$DB = NewADOConnection('mysql');
$DB->Connect($sql_host, $sql_user, $sql_pass, $sql_dbase);

require_once("borders.php");

if (isset($_GET['id']) AND $_GET['opt']=="usun"){

  $id =(int)$_GET['id'];
  $sql = "DELETE FROM lib_books_local WHERE id=$id";
  $tmp = $DB->Execute($sql);
}

  $sql = "
    SELECT * FROM `lib_books_local`  l
    LEFT JOIN lib_books b ON l.id_book=b.id_book
    LEFT JOIN lib_authors a ON b.id_author=a.id_author
    WHERE lib='$d'
  ";
//echo $sql;
  $books = $DB->GetAll($sql);
  $smarty->assign('books', $books);


$smarty->display('lokalne_zasoby.tpl');

?>
