<?php
require __DIR__ . '/vendor/autoload.php';

$dbopts = parse_url(getenv('DATABASE_URL'));

$dbopts["path"] = ltrim($dbopts["path"], "/");

$db = new PDO("pgsql:" . sprintf(
"host=%s;port=%s;user=%s;password=%s;dbname=%s",
$dbopts["host"],
$dbopts["port"],
$dbopts["user"],
$dbopts["pass"],
ltrim($dbopts["path"], "/")
));

?>
