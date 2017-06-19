<?php
ini_set('date.timezone','Asia/Shanghai');
// Include ezSQL core
include_once "shared/ez_sql_core.php";
// Include ezSQL database specific component
include_once "mysql/ez_sql_mysql.php";

$db = new ezSQL_mysql('root', '123.com', 'db_nagiosql_v32', 'localhost');
$db->query("set names utf8");
?>
