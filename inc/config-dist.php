<?php
// definicja zmiennych

//define ('SMARTY_DIR', '/usr/share/php/smarty/libs/');	// debian smarty  [ apt-get install smarty ]
define ('SMARTY_DIR', 'lib/Smarty-2.6.18/libs/');		// pld smarty     [ poldek -i Smarty ]
define ('ADODB_DIR', 'lib/adodb/');

$db_prefix = 'cms';
//SVN REV
// $Id: $
// $Rev: 75 $
define ('SCMS_VERSION', '0.03');
define ('DB_PREFIX', 'CMS');

require_once ( SMARTY_DIR.'Smarty.class.php' );
require_once ( ADODB_DIR.'adodb.inc.php' );

// zmienne do bazy danych
$sql_host = "mysql.wtech.pl";
$sql_user = "";
$sql_pass = "";
$sql_dbase = "cms_";
$sql_prefix = "cms";

$license = "Y21zLndlYnRlY2guc3pjemVjaW4ucGw=";

// zmienne do newslettera
$spam_from = "newsletter@webtech.szczecin.pl";

//email
$spam_to = "info@wtech.pl";

// funkcje do wlaczania wylaczania raportowania bledow 
error_reporting(E_ALL);
ini_set('display_errors', 0);

// ustawienie polskiej godziny
ini_set("date.timezone", "Europe/Warsaw");

// przekierowanie na www.
//redir();
?>
