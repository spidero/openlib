<?php
session_start();
require_once ( 'inc/function.php' );

$smarty = new Smarty;

$DB = NewADOConnection('mysql');
$DB->Connect($sql_host, $sql_user, $sql_pass, $sql_dbase);

require_once("borders.php");

//$email = $_SESSION['login'];
//$klient_id = $_SESSION['klient_id'];
//print_r($_SESSION);
//SELECT id_book, isbn, book, name, surname FROM `lib_books` b LEFT JOIN `lib_authors` a on b.id_author=a.id_author

if (isset($_GET['id']) AND $_GET['opt']=="rezerwacja"){
  $id_book = (int)$_GET['id'];
  $sql = "
    INSERT INTO lib_rezewacje
    (id_user, id_book) VALUES
    ($klient_id, $id_book)
";
  $ok = $DB->Execute($sql);
  $smarty->assign('info', "Dodano do listy rezerwacji"); 
}

if (isset($_POST['submit'])){
  $autor=$_POST['autor'];
  $tytul=$_POST['tytul'];
  $isbn	=$_POST['isbn'];

  $sql = "
    SELECT id_book, isbn, book, name, surname
    FROM `lib_books` b 
    LEFT JOIN `lib_authors` a on b.id_author=a.id_author 
    WHERE book like '%".$tytul."%' AND surname like '%".$autor."%' AND isbn like '%".$isbn."%'
    LIMIT 0, 100
  ";
//echo $sql;
  $szukane = $DB->GetAll($sql);
  $smarty->assign('szukane', $szukane);
  $smarty->assign('lista', "1");
}


$smarty->display('szukaj.tpl');

?>
