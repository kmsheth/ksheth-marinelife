<?php
require __DIR__ . '/vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
if(getenv('APP_ENV') === 'development')
{
$dotenv->load();
}

$dotenv->required(['DATABASE_URL']);

$dbopts = parse_url(getenv('DATABASE_URL'));

$dbname = ltrim($dbopts["path"], '/');

$db = new PDO("$dbopts[scheme]:host=$dbopts[host];dbname=$dbname;port=$dbopts[port]",
    $dbopts["user"], $dbopts["pass"], array(PDO::MYSQL_ATTR_INIT_COMMAND =>
    "SET NAMES utf8"));
?>
