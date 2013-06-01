<?php
session_start();
require_once ( 'inc/function.php' );

$smarty = new Smarty;

$DB = NewADOConnection('mysql');
$DB->Connect($sql_host, $sql_user, $sql_pass, $sql_dbase);

require_once("borders.php");

$sql = "SELECT id_author, name, surname from lib_authors ORDER BY surname, name";

$authors = $DB->GetAll($sql);
//print_r($authors);
$smarty->assign('authors', $authors);

if (isset($_POST['submit'])){
  $author = $_POST['author'];
  $nazwa = $_POST['nazwa'];
  $isbn = $_POST['isbn'];

 
 $sql = "
    INSERT INTO lib_books
    (id_author, book, isbn) VALUES
    ($author, '$nazwa', '$isbn')
";
  $ok = $DB->Execute($sql);
  $smarty->assign('info_box', "Dodano książkę: <b>$nazwa</b>"); 
}

$smarty->display('dodaj_zasob.tpl');

?>
