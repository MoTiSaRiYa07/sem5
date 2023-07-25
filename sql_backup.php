<?php include_once('Mysqldump/Mysqldump.php');
$dump = new Ifsnop\Mysqldump\Mysqldump('mysql:host=localhost;dbname=loginsystem', 'root', '');
$f=date('d-m-Y');
$dump->start("database_backup/auction_backup.sql");

echo "done";

?>