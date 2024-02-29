<?php
session_start();
session_regenerate_id(true);
if (isset($_SESSION['login']) == false) {
	print 'ログインされていません。<br>';
	print '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
	exit();
} else {
	print $_SESSION['staff_name'];
	print 'さんログイン中<br>';
	print '<br>';
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>茶葉の園</title>
</head>

<body>
	<p>スタッフ追加</p>
	<form method="post" action="staff_add_check.php">
		<label for="user_name">ユーザー名</label><br>
		<input type="text" name="name" id="user_name" style="width: 200px;"><br>
		<label for="user_pass">パスワード</label><br>
		<input type="password" name="pass" id="user_pass" style="width: 100px;"><br>
		<label for="user_pass2">パスワードをもう一度入力して下さい。</label><br>
		<input type="password" name="pass2" id="user_pass2" style="width: 100px;"><br>
		<br>
		<input type="button" onclick="history.back()" value="戻る">
		<button type="submit">OK</button>
	</form>
</body>

</html>