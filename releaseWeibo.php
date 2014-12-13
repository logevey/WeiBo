<?php
	session_start(); 
	 include("connectMysql.php");
	if(!isset($_SESSION['currentuser'])){
		echo "未登录，<a href=\"index.php\" target=\"_parent\">请登录</a>";
	}else{
		$user=$_SESSION['currentuser'];
		$wID=$_GET[wID];
		$time=date("Y-m-d H:i:s");
		$content=$_POST['content'];
			 $sql="insert into weibo(wUserName,wContent,wTime) values('".$user."','".$content."','".$time."')";
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
