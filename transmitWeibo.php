<?php
session_start ();
include ("connectMysql.php");
if (! isset ( $_SESSION ['currentuser'] )) {
	echo "未登录，<a href=\"index.php\" target=\"_parent\">请登录</a>";
} else {
	$user = $_SESSION ['currentuser'];
	$wID = $_GET [wID];
	$time = date ( "Y-m-d H:i:s" );
	$sql1 = "select * from weibo where wID={$wID}";
	$result1 = mysql_query ( $sql1 ) or die ( "Could not query: " . mysql_error () );
	if ($row1 = mysql_fetch_array ( $result1 )) {
		$sql = "insert into weibo(wUserName,wContent,wTime,wIsTransmit,wTransmitUserName) values('{$user}','" . $row1 ['wContent'] . "','" . $time . "','1','" . $row1 ['wUserName'] . "')";
		$result = mysql_query ( $sql ) or die ( "Could not query: " . mysql_error () );
		if ($result) {
			echo '<script language="JavaScript">location.href="mainPage.php";</script>';
		} else {
			echo mysql_error ();
		}
		mysql_free_result ( $result );
	}
	mysql_free_result ( $result1 );
	mysql_close ( $con );
}
?>