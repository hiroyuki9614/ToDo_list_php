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

		$sql = 'SELECT name FROM mst_product WHERE code=?';
		$stmt = $dbh->prepare($sql);
		$data[] = $pro_code;
		$stmt->execute($data);

		$rec = $stmt->fetch(PDO::FETCH_ASSOC);
		$pro_name = $rec['name'];

		$dbh = null;
	} catch (Exception $e) {
		print 'ただいま障害により大変ご迷惑をお掛けしております。';
		exit();
	}

	?>
	<p>スタッフを修正する</p><br>
	<p>スタッフコード</p>
	<?php print $pro_code; ?>
	<form method="post" action="pro_edit_check.php">
		<input type="hidden" name="code" value="<?php print $pro_code; ?>">
		<label for="edit-pro">商品名</label>
		<input type="text" name="name" style="width: 200px;" id="edit-pro" value="<?php print $pro_name; ?>"><br>
		<label for="edit-pro">価格</label>
		<input type="text" name="name" style="width: 200px;" id="edit-pro" value="<?php print $pro_name; ?>"><br>
		<input type="button" onclick="history.back()" value="戻る">
		<button type="submit">OK</button>
	</form>

</body>