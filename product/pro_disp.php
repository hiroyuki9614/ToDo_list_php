<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>茶葉の園</title>
</head>

<body>
	<?php

	try {

		$pro_code = $_GET['procode'];
		$dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
		$user = 'root';
		$password = '';
		$dbh = new PDO($dsn, $user, $password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = 'SELECT name,price FROM mst_product WHERE code=?';
		$stmt = $dbh->prepare($sql);
		$data[] = $pro_code;
		$stmt->execute($data);

		$rec = $stmt->fetch(PDO::FETCH_ASSOC);
		$pro_name = $rec['name'];
		$pro_price = $rec['price'] . '円';
		$dbh = null;
	} catch (Exception $e) {
		print 'ただいま障害により大変ご迷惑をお掛けしております。';
		exit();
	}

	?>
	<p>商品情報参照</p><br>
	<p>商品コード</p>
	<?php print $pro_code; ?>
	<p>商品名</p>
	<?php print $pro_name; ?>
	<p>価格</p>
	<?php print $pro_price; ?>
	<form>
		<input type="button" onclick="history.back()" value="戻る">
	</form>

</body>