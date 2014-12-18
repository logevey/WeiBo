<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>主页</title>
<link rel="stylesheet" href="css/mainPage.css" media="all">
	<script src="js/mainPage.js"></script>
	<script>
jQuery(document).ready(function($) {
	$('.theme-release').click(function(){
		$('.theme-popover-mask').fadeIn(100);
		$('.theme-popover').slideDown(200);
	})
	$('.theme-poptit .close').click(function(){
		$('.theme-popover-mask').fadeOut(100);
		$('.theme-popover').slideUp(200);
	})
})
jQuery(document).ready(function($) {
	$('.theme-main').click(function(){
		$('.theme-popover-mask').fadeIn(100);
		$('.theme-popover-page').slideDown(200);
	})
	$('.theme-poptit .close').click(function(){
		$('.theme-popover-mask').fadeOut(100);
		$('.theme-popover-page').slideUp(200);
	})
})
function clickme(wID){
	document.getElementById("wID").value=wID;
}
function clickuser(ledName){
	document.getElementById("ledName").value=ledName;
}
jQuery(document).ready(function($) {

	$('.theme-comment').click(function(){
		$('.theme-popover-mask').fadeIn(100);
		$('.theme-popover-comment').slideDown(200);
	})
	$('.theme-poptit .close').click(function(){
		$('.theme-popover-mask').fadeOut(100);
		$('.theme-popover-comment').slideUp(200);
	})
})
jQuery(document).ready(function($) {
	$('.theme-chat').click(function(){
		$('.theme-popover-mask').fadeIn(100);
		$('.theme-popover-letter').slideDown(200);
	})
	$('.theme-poptit .close').click(function(){
		$('.theme-popover-mask').fadeOut(100);
		$('.theme-popover-letter').slideUp(200);
	})
})
jQuery(document).ready(function($) {
	$('.theme-receive').click(function(){
		$('.theme-popover-mask').fadeIn(100);
		$('.theme-popover-message').slideDown(200);
	})
	$('.theme-poptit .close').click(function(){
		$('.theme-popover-mask').fadeOut(100);
		$('.theme-popover-message').slideUp(200);
	})
})
</script>

</head>
<body>

	<div class=" div0">
		<div class=" div1">
			<?php
			session_start ();
			if (! isset ( $_SESSION ['currentuser'] )) {
				echo "未登录，<a href=\"index.php\" target=\"_parent\">请登录</a>";
			} else {
				include "connectMysql.php";
				$user = $_SESSION ['currentuser'];
				$sql = "select * from user where uName='{$user}'";
				$result = mysql_query ( $sql ) or die ( "Could not query: " . mysql_error () );
				echo "<h1><a class=\" theme-main\" href=\"javascript:;\">{$user}的主页</a></h1 > ";
				echo "<div class=\" div1-1\"><a href=\"logout.php\"  target=\"_parent\">登出</a></div>";
				mysql_free_result ( $result );
				mysql_close ( $con );
			}
			?>
		</div>
		<div class=" div2">
			<?php
			$currentWeibo;
			if (! isset ( $_SESSION ['currentuser'] )) {
				echo "未登录，<a href=\"index.php\" target=\"_parent\">请登录</a>";
			} else {
				$sql = "select * from attention where aUserName='{$user}'";
				$sql1 = "select * from attention where aedUserName='{$user}'";
				$sql2 = "select * from weibo where wUserName='{$user}'";
				$sql3 = "select * from letter where ledUserName='{$user}'";
				$result = mysql_query ( $sql ) or die ( "Could not query: " . mysql_error () );
				$result1 = mysql_query ( $sql1 ) or die ( "Could not query: " . mysql_error () );
				$result2 = mysql_query ( $sql2 ) or die ( "Could not query: " . mysql_error () );
				$result3 = mysql_query ( $sql3 ) or die ( "Could not query: " . mysql_error () );
				$i = 0;
				while ( $row = mysql_fetch_array ( $result ) ) {
					$i = $i + 1;
				}
				$j = 0;
				while ( $row = mysql_fetch_array ( $result1 ) ) {
					$j = $j + 1;
				}
				$k = 0;
				while ( $row = mysql_fetch_array ( $result2 ) ) {
					$k = $k + 1;
				}
				$l = 0;
				while ( $row = mysql_fetch_array ( $result3 ) ) {
					$l = $l + 1;
				}
				$i = $i - 1;
				$j = $j - 1;
				echo "<div class=\" div2-1\" ><br/>" . $i . "<br/>关注</div>";
				echo "<div class=\" div2-2\" ><br/>" . $j . "<br/>粉丝</div>";
				echo "<div class=\" div2-3\" ><br/>" . $k . "<br/>微博</div>";
				echo "<div class=\" div2-4\" ><br/><a class=\"theme-receive\" href=\"javascript:;\">" . $l . "<br/>私信</a></div>";
				mysql_free_result ( $result );
				mysql_free_result ( $result1 );
				mysql_free_result ( $result2 );
				mysql_free_result ( $result3 );
				mysql_close ( $con );
			}
			?>
		</div>
		<div class=" div3">
			<div class="div3-1">
				<br />个人简介
			</div>
		<?php
		if (! isset ( $_SESSION ['currentuser'] )) {
			echo "未登录，<a href=\"index.php\" target=\"_parent\">请登录</a>";
		} else {
			$sql = "select uIntro from user where uName='{$user}'";
			$result = mysql_query ( $sql ) or die ( "Could not query: " . mysql_error () );
			while ( $row = mysql_fetch_array ( $result ) ) {
				echo "<div class=\"div3-2\"><br/>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp " . $row ['uIntro'] . "</div>";
			}
			
			mysql_free_result ( $result );
			mysql_close ( $con );
		}
		?>
		</div>
		<div class=" div4">
			<img src="images/main1.jpg" class="img1" name="picture"
				onmouseover="picture.src='images/main2.jpg'"
				onmouseout="picture.src='images/main3.jpg'" />

		</div>
		<div class=" div5">
			<div class="div5-1">
				<br />粉丝
			</div>
			<?php
			if (! isset ( $_SESSION ['currentuser'] )) {
				echo "未登录，<a href=\"index.php\" target=\"_parent\">请登录</a>";
			} else {
				$sql = "select * from attention where aedUserName='{$user}'";
				$result = mysql_query ( $sql ) or die ( "Could not query: " . mysql_error () );
				echo "<div class=\"div5-2\"><br/><ul>";
				while ( $row = mysql_fetch_array ( $result ) ) {
					$sql2 = "select * from attention where aUserName='{$user}' and aedUserName='" . $row ['aUserName'] . "'";
					$result2 = mysql_query ( $sql2 ) or die ( "Could not query: " . mysql_error () );
					if ($row ['aUserName'] != $user) {
						if ($row2 = mysql_fetch_array ( $result2 )) {
							echo " <li>&nbsp &nbsp &nbsp " . $row ['aUserName'] . "<b class=\"div5-2-a-1\" > 关注</b><a class=\"div5-2-a-2\" href=\"removeFans.php?aUserName=" . $row ['aUserName'] . "\"> 移除</a></li> <br/>";
						} else {
							echo " <li>&nbsp &nbsp &nbsp" . $row ['aUserName'] . "<a class=\"div5-2-a-1\" href=\"addAttention.php?aedUserName=" . $row ['aUserName'] . "\"> 关注</a><a class=\"div5-2-a-2\" href=\"removeFans.php?aUserName=" . $row ['aUserName'] . "\"> 移除</a></li> <br/>";
						}
					}
				}
				echo "</ul></div>";
				mysql_free_result ( $result );
				mysql_close ( $con );
			}
			?>
		</div>
		<div class=" div6">
			<div class="div6-1">
				<br />关注
			</div>
			<?php
			if (! isset ( $_SESSION ['currentuser'] )) {
				echo "未登录，<a href=\"index.php\" target=\"_parent\">请登录</a>";
			} else {
				$sql = "select * from attention where aUserName='{$user}'";
				$result = mysql_query ( $sql ) or die ( "Could not query: " . mysql_error () );
				echo "<div class=\"div6-2\"><br/><ul>";
				while ( $row = mysql_fetch_array ( $result ) ) {
					if ($row ['aedUserName'] != $user) {
						echo "<li>&nbsp &nbsp " . $row ['aedUserName'] . "<a href=\"cancelAttention.php?aedUserName=" . $row ['aedUserName'] . "\"> 取消关注</a></li> <br/>";
					}
				}
				echo "</ul></div>";
				mysql_free_result ( $result );
				mysql_close ( $con );
			}
			?>
		</div>
		<div class=" div9">
			<div class="div6-1">
				<br />成员列表
			</div>
			<?php
			if (! isset ( $_SESSION ['currentuser'] )) {
				echo "未登录，<a href=\"index.php\" target=\"_parent\">请登录</a>";
			} else {
				$sql = "select * from user ";
				$result = mysql_query ( $sql ) or die ( "Could not query: " . mysql_error () );
				echo "<div class=\"div6-2\"><br/><ul>";
				while ( $row = mysql_fetch_array ( $result ) ) {
					$ledName = $row ['uName'];
					$sql2 = "select * from attention where aUserName='{$user}' and aedUserName='" . $row ['uName'] . "'";
					$result2 = mysql_query ( $sql2 ) or die ( "Could not query: " . mysql_error () );
					if ($row2 = mysql_fetch_array ( $result2 )) {
						if ($row ['uIsLetter'] == 1) {
							echo "<li>&nbsp &nbsp " . $row ['uName'] . "<a class=\"div9-2-a-1 theme-chat\" onclick = \"clickuser('{$ledName}')\" href=\"javascript:;\">私信</a><b class=\"div9-2-a-2\"> 关注</b></li> <br/>";
						} else {
							echo "<li>&nbsp &nbsp " . $row ['uName'] . "<b class=\"div9-2-a-1\" >私信</b><b class=\"div9-2-a-2\"> 关注</b></li> <br/>";
						}
					} else {
						if ($row ['uIsLetter'] == 1) {
							echo "<li>&nbsp &nbsp " . $row ['uName'] . "<a class=\"div9-2-a-1 theme-chat\" onclick = \"clickuser('{$ledName}')\" href=\"javascript:;\">私信</a><a class=\"div9-2-a-2\" href=\"addAttention.php?aedUserName=" . $row ['uName'] . "\"> 关注</a></li> <br/>";
						} else {
							echo "<li>&nbsp &nbsp " . $row ['uName'] . "<b class=\"div-92-a-1\">私信</b><b class=\"div9-2-a-2\" href=\"addAttention.php?aedUserName=" . $row ['uName'] . "\"> 关注</a></li> <br/>";
						}
					}
				}
				echo "</ul></div>";
				mysql_free_result ( $result );
				mysql_close ( $con );
			}
			?>		
		</div>
		<div class="div8">
			<a class="btn btn-primary btn-large theme-release"
				href="javascript:;">发布微博</a>
		</div>
		<?php
		if (! isset ( $_SESSION ['currentuser'] )) {
			echo "未登录，<a href=\"index.php\" target=\"_parent\">请登录</a>";
		} else {
			$sql = "select * from weibo,attention   where wUserName=aedUserName and ( aUserName='{$user}' ) order  by wTime desc";
			$result = mysql_query ( $sql ) or die ( "Could not query: " . mysql_error () );
			$i = 0;
			
			while ( $row = mysql_fetch_array ( $result ) ) {
				$top = 405 + (10 + 450) * $i;
				
				$id = $row ['wID'];
				if ($row ['wIsTransmit'] == 0) {
					echo "<div   class=\" div7\" style=\"top:" . $top . "px\">
								<div class=\"div7-1\"><br/>" . $row ['wUserName'] . "</div>
								<div class=\"div7-2\">
									<div class=\"div7-2-1\"><br/>&nbsp &nbsp &nbsp &nbsp " . $row ['wContent'] . "</div>
									<div class=\"div7-2-2\"><br/>" . $row ['wTime'] . "</div>
									<div class=\"div7-2-3\"><br/>&nbsp 评论：<br/> <br/>";
					$sql1 = "select * from weibo,comment  where wID=cWeiboID and wID='" . $row ['wID'] . "'  order  by wTime desc";
					$result1 = mysql_query ( $sql1 ) or die ( "Could not query: " . mysql_error () );
					
					while ( $row1 = mysql_fetch_array ( $result1 ) ) {
						echo "&nbsp &nbsp &nbsp &nbsp &nbsp " . $row1 ['cUserName'] . ": &nbsp " . $row1 ['cContent'] . "<b class=div7-2-1-1>" . $row1 ['cTime'] . "</b><br/> <br/>";
					}
					echo "</div>
								</div>
								<div class=\"div7-3\">
									<div class=\"div7-3-1\"><br/><a class=\" btn-large \" href=\"transmitWeibo.php?wID='{$id}'\">转 发</a></div>
									<div class=\"div7-3-2\"><br/><a  class=\" btn-large theme-comment\" href=\"javascript:;\" onclick=\"clickme(" . $id . ")\">评 论</a></div>
								</div>
							</div>";
				} else {
					echo "<div class=\" div7\" style=\"top:" . $top . "px\">
								<div class=\"div7-1\"><br/>" . $row ['wUserName'] . "</div>
								<div class=\"div7-2\">
									<div class=\"div7-2-1\"><br/>&nbsp &nbsp &nbsp &nbsp [转发自  " . $row ['wTransmitUserName'] . "  ]&nbsp &nbsp" . $row ['wContent'] . "</div>
									<div class=\"div7-2-2\"><br/>" . $row ['wTime'] . "</div>
									<div class=\"div7-2-3\"><br/>&nbsp 评论：<br/> <br/>";
					$sql1 = "select * from weibo,comment  where wID=cWeiboID and wID='" . $row ['wID'] . "'  order  by wTime desc";
					$result1 = mysql_query ( $sql1 ) or die ( "Could not query: " . mysql_error () );
					
					while ( $row1 = mysql_fetch_array ( $result1 ) ) {
						echo "&nbsp &nbsp &nbsp &nbsp &nbsp " . $row1 ['cUserName'] . ": &nbsp " . $row1 ['cContent'] . "<b class=div7-2-1-1>" . $row1 ['cTime'] . "</b><br/> <br/>";
					}
					echo "</div></div>
								<div class=\"div7-3\">
									<div class=\"div7-3-1\"><br/><a class=\" btn-large \" href=\"transmitWeibo.php?wID='{$id}'\">转 发</a></div>
									<div class=\"div7-3-2\"><br/><a  class=\" btn-large theme-comment\" onclick=\"clickme(" . $id . ")\" href=\"javascript:;\">评 论</a></div>
								</div>
							</div>";
				}
				$i = $i + 1;
			}
			
			mysql_free_result ( $result );
			mysql_close ( $con );
		}
		?>
	</div>

	<div class="theme-popover">
		<div class="theme-poptit">
			<a href="javascript:;" title="关闭" class="close">×</a>
			<h3>发布微博</h3>
		</div>
		<div class="theme-popbod dform">
			<form class="theme-weibo" name="weiboform" action="releaseWeibo.php"
				method="post">

				<textarea name="content">请在此处输入文本...</textarea>
				<br /> <br /> <input class="btn btn-primary" type="submit"
					name="submit" value=" 发 布 " />
			</form>
		</div>
	</div>
	<div class="theme-popover-comment">
		<div class="theme-poptit">
			<a href="javascript:;" title="关闭" class="close">×</a>
			<h3>评论</h3>
		</div>
		<div class="theme-popbod dform">
			<form class="theme-comment" name="commentform"
				action="submitComment.php" method="post">
				<input type="hidden" name="weiboID" id="wID" />
				<textarea name="comment">请在此处输入评论...</textarea>
				<br /> <br /> <input class="btn btn-primary" type="submit"
					name="submit" value=" 确 定 " />
			</form>
		</div>
	</div>

	<div class="theme-popover-letter">
		<div class="theme-poptit">
			<a href="javascript:;" title="关闭" class="close">×</a>
			<h3>私信</h3>
		</div>
		<div class="theme-popbod dform">
			<form class="theme-letter" name="letterform"
				action="submitLetter.php" method="post">
				<input type="hidden" name="receiveUserName" id="ledName" />
				<textarea name="letter">请在此处输入私信...</textarea>
				<br /> <br /> <input class="btn btn-primary" type="submit"
					name="submit" value=" 确 定 " />
			</form>
		</div>
	</div>


	<div class="theme-popover-page">
		<div class="theme-poptit">
			<a href="javascript:;" title="关闭" class="close">×</a>
			<h3>个人资料</h3>
		</div>
		<div class="theme-popbod dform">
			<form class="theme-page" name="pageform" action="submitMain.php"
				method="post">
				是否接受私信：<input value="1" checked="checked" type="radio"
					name="isReceive" /> <br /> <br />个人简介:<br /> <br />
				<textarea class="textarea-1" name="letter">请在此处输入个人简介...</textarea>
				<br /> <br /> <input class="btn btn-primary" type="submit"
					name="submit" value=" 确 定 " />
			</form>
		</div>
	</div>

	<div class="theme-popover-message">
		<div class="theme-poptit">
			<a href="javascript:;" title="关闭" class="close">×</a>
			<h3>消息</h3>
		</div>
		<div class="theme-popbod dform">
     <?php
					echo " <div class=\"theme-popbod-1\"><br/> <br/>";
					$sql1 = "select * from letter  where ledUserName='{$user}'   order  by lTime desc";
					$result1 = mysql_query ( $sql1 ) or die ( "Could not query: " . mysql_error () );
					
					while ( $row1 = mysql_fetch_array ( $result1 ) ) {
						echo "&nbsp &nbsp &nbsp &nbsp &nbsp " . $row1 ['lUserName'] . ": &nbsp " . $row1 ['lContent'] . "<b class=div7-2-1-1>" . $row1 ['lTime'] . "</b><br/> <br/>";
					}
					echo "</div>"?>
     </div>
	</div>

	<div class="theme-popover-mask"></div>
</body>
</html>
