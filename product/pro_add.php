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
	<p>商品追加</p>
	<form method="post" action="pro_add_check.php" enctype="multipart/form-data">
		<label for="pro_name">商品名を入力して下さい。</label><br>
		<input type="text" name="name" id="pro_name" style="width: 200px;"><br>
		<label for="pro_price">価格を入力して下さい。</label><br>
		<input type="text" name="price" id="pro_price" style="width: 50px;"><br>
		<label for="pro_price">画像を選んで下さい。</label><br>
		<input type="file" name="gazou" id="img" style="width: 400px;"><br>
		<input type="button" onclick="history.back()" value="戻る">
		<button type="submit">OK</button>
	</form>
</body>

</html>