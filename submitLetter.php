<?php
	include("connectMysql.php");
	session_start(); 
	if(!isset($_SESSION['currentuser'])){
		echo "未登录，<a href=\"index.php\" target=\"_parent\">请登录</a>";
	}else{
		$user=$_SESSION['currentuser'];
		$time=date("Y-m-d H:i:s");
		if(isset($_POST['submit'])&&$_POST['submit']) {
			$sql="insert into letter(ledUserName,lUserName,lContent,lIsRead,lTime) value('".$_POST['receiveUserName']."' ,'{$user}','".$_POST['letter']."','0','".$time."')";
			$rs=mysql_query($sql);
			if($rs)
			{ 
				 echo '<script language="JavaScript">alert("发送成功！");location.href="mainPage.php";</script>';
				
			}
			else
			{
				echo mysql_error();
			}
			mysql_free_result ($rs);
			mysql_close($con);
		}
	}
?>