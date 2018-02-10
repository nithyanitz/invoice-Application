<?php
?>
<!DOCTYPE html>
<head>
	<title>Login</title>
	<link rel = "stylesheet" href = "css/form.css" />
</head>
<body>
<div class = "form-container">
	<form action = "../Controller/login.php" method = "post" class = "form-hide">
	<div>
		<h2 class = "header">Login</h2>
		<input type = "text" name = "userName" class = "input-box" />
		<input type = "password" name = "password" class = "input-box" />
		<br />
		<input type = "submit" name = "login" class = "submit-btn" value = "login" />
	</div>
	</form>
</div>
</body>
</html>
