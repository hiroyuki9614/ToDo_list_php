<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>茶葉の園</title>
</head>

<body>
	<p>商品追加</p>
	<form method="post" action="pro_add_check.php">
		<label for="pro_name">商品名を入力して下さい。</label><br>
		<input type="text" name="name" id="pro_name" style="width: 200px;"><br>
		<label for="pro_price">価格を入力して下さい。</label><br>
		<input type="text" name="price" id="pro_price" style="width: 50px;"><br>
		<br>
		<input type="button" onclick="history.back()" value="戻る">
		<button type="submit">OK</button>
	</form>
</body>

</html>