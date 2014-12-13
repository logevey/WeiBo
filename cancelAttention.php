<?php
	session_start(); 
	 include("connectMysql.php");
	if(!isset($_SESSION['currentuser'])){
		echo "未登录，<a href=\"index.php\" target=\"_parent\">请登录</a>";
	}else{
		$user=$_SESSION['currentuser'];
		 $sql="delete from attention where aedUserName='".$_GET['aedUserName']."' and  aUserName='{$user}'";
		$result = mysql_query($sql)or die("Could not query: ". mysql_error());
		  if($result)
		  { 
			  echo '<script language="JavaScript">location.href="mainPage.php";</script>';
		  }
		  else
		  {
			echo mysql_error();
		  }
		mysql_free_result ($result);
		mysql_close($con);
	}
?>