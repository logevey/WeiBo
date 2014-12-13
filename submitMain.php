<?php
	include("connectMysql.php");
	session_start(); 
	if(!isset($_SESSION['currentuser'])){
		echo "未登录，<a href=\"index.php\" target=\"_parent\">请登录</a>";
	}else{
		$user=$_SESSION['currentuser'];
		if(isset($_POST['submit'])&&$_POST['submit']) {
			$sql="update user set uIsLetter='".$_POST['isReceive']."' ,uIntro='".$_POST['letter']."' where uName='{$user}'";
			$rs=mysql_query($sql);
			if($rs)
			{ 
				 echo '<script language="JavaScript">location.href="mainPage.php";</script>';
				
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