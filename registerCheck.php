<?php
include ("connectMysql.php");
if (isset ( $_POST ['submit'] ) && $_POST ['submit']) {
	$sql = "select * from user where uName='" . $_POST [username] . "'";
	$rs = mysql_query ( $sql );
	if ($rs) {
		if ($row = mysql_fetch_array ( $rs )) {
			echo '<script language="JavaScript">alert("当前用户名已存在！");location.href="index.php";</script>';
		} else {
			$sql_1 = "insert into user(uName,uPasswd) values('" . $_POST [username] . "','" . $_POST [password] . "')";
			$sql_2 = "insert into attention values('" . $_POST [username] . "','" . $_POST [username] . "')";
			$rs_1 = mysql_query ( $sql_1 );
			$rs_2 = mysql_query ( $sql_2 );
			if ($rs_1 && $rs_2) {
				echo '<script language="JavaScript">alert("注册成功，请登录！");location.href="index.php";</script>';
			} else {
				echo mysql_error ();
			}
			mysql_free_result ( $rs_1 );
			mysql_free_result ( $rs_2 );
		}
	} else {
		echo mysql_error ();
	}
	mysql_free_result ( $rs );
	mysql_close ( $con );
}
?>
