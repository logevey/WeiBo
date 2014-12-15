<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Login</title> <script>
 function checkRegisterForm(){
	  if(registerform.realpass.value!=registerform.password.value) {
		   alert("两次输入的密码不一致！") ;
		   return false ;
	  }
	  return true ;
 }

</script>
	<link rel="stylesheet" href="css/index.css">

</head>

<body>
	<div class="loginform cf">
		<form name="loginform" action="loginCheck.php" method="post"
			accept-charset="utf-8">
			<b>请登录<br />
			<br /></b>
			<ul>
				<li><label for="username">用户名</label> <input type="text"
					name="username" placeholder="name" required></li>
				<li><label for="password">密码</label> <input type="password"
					name="password" placeholder="password" required></li>
				<br />
				<br />
				<li><input type="submit" name="submit" value="登录"></li>
			</ul>
		</form>
	</div>

	<div class="registerform cf">
		<form name="registerform" action="registerCheck.php" method="post"
			accept-charset="utf-8" onsubmit="return checkRegisterForm()">
			<b>请注册<br />
			<br /></b>
			<ul>
				<li><label for="username">用户名</label> <input type="text"
					name="username" placeholder="name" required></li>
				<li><label for="password">密码</label> <input type="password"
					name="password" placeholder="password" required></li>
				<li><label for="password">确认密码</label> <input type="password"
					name="realpass" placeholder="password" required></li>
				<br />
				<br />
				<li><input type="submit" name="submit" value="注册"></li>
			</ul>
		</form>
	</div>
</body>
</html>

