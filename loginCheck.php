<?php
	include("connectMysql.php");
	session_start(); 
	if(isset($_POST['submit'])&&$_POST['submit']) {
		$sql="select * from user where uName='".$_POST[username]."' and uPasswd='".$_POST[password]."'";
		$rs=mysql_query($sql);
		if($rs)
		{ 
			if($row=mysql_fetch_array($rs))
			{
				$_SESSION['currentuser']=$_POST[username];
				header("location:mainPage.php");	
			}
			else
			{
				echo '<script language="JavaScript">alert("用户名或者密码错误！");location.href="index.php";</script>';
			}
		}
		else
		{
			echo mysql_error();
		}
		mysql_free_result ($rs);
		mysql_close($con);
	}
?>
