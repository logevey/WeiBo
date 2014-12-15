
<?php
$dbhost = 'localhost'; // 数据库主机名
$dbuser = 'root'; // 数据库用户名
$dbpassword = 'root'; // 数据库密码
$dbname = 'weibo'; // 数据库名

mysql_connect ( $dbhost, $dbuser, $dbpassword );
mysql_select_db ( 'weibo' );
mysql_query ( "set names 'UTF8'" );
?>

