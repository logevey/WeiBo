<?php
include ("connectMysql.php");
session_start ();
if (! isset ( $_SESSION ['currentuser'] )) {
	echo "未登录，<a href=\"index.php\" target=\"_parent\">请登录</a>";
} else {
	$user = $_SESSION ['currentuser'];
	$time = date ( "Y-m-d H:i:s" );
	if (isset ( $_POST ['submit'] ) && $_POST ['submit']) {
		$sql = "insert into comment(cContent,cWeiboID,cUserName,cTime) value('" . $_POST ['comment'] . "' ,'" . $_POST [weiboID] . "','" . $user . "','" . $time . "')";
		$rs = mysql_query ( $sql );
		if ($rs) {
			echo '<script language="JavaScript">location.href="mainPage.php";</script>';
		} else {
			echo mysql_error ();
		}
		mysql_free_result ( $rs );
		mysql_close ( $con );
	}
}
?>
