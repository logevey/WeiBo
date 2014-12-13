<html><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<head><title>logout OK</title>
	</head>
<script language = "javascript" src="js/alert.js"></script>
<?php
	session_start();
	unset($_SESSION['currentuser']);
?>  
<script>goto('index.php')</script>;
</html>
