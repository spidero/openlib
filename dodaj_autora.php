<?php
session_start();
require_once ( 'inc/function.php' );

$smarty = new Smarty;

$DB = NewADOConnection('mysql');
$DB->Connect($sql_host, $sql_user, $sql_pass, $sql_dbase);

require_once("borders.php");

if (isset($_POST['submit'])){
  $imie = $_POST['imie'];
  $nazwisko = $_POST['nazwisko'];
 
 $sql = "
    INSERT INTO lib_authors
    (name, surname) VALUES
    ('$imie', '$nazwisko')
";
  $ok = $DB->Execute($sql);
  $smarty->assign('info_box', "Dodano autora: <b>$imie $nazwisko</b>"); 
}

$smarty->display('dodaj_autora.tpl');

?>
