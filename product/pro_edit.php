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

		$sql = 'SELECT name,price,gazou FROM mst_product WHERE code=?';
		$stmt = $dbh->prepare($sql);
		$data[] = $pro_code;
		$stmt->execute($data);

		$rec = $stmt->fetch(PDO::FETCH_ASSOC);
		$pro_name = $rec['name'];
		$pro_price = $rec['price'];
		$pro_gazou_name_old = $rec['gazou'];

		$dbh = null;

		if ($pro_gazou_name_old == '') {
			$disp_gazou = '';
		} else {
			$disp_gazou = '<img src="./gazou/' . $pro_gazou_name_old . '">';
		}
	} catch (Exception $e) {
		print 'ただいま障害により大変ご迷惑をお掛けしております。<br>';
		print $e . '<br>';
		print $e->getMessage();
		exit();
	}

	?>
	<p>商品を修正する</p><br>
	<p>商品コード</p>
	<?php print $pro_code; ?><br>
	<form method="post" action="pro_edit_check.php" enctype="multipart/form-data">
		<input type="hidden" name="code" value="<?php print $pro_code; ?>">
		<label for="edit-pro">商品名</label>
		<input type="text" name="name" style="width: 200px;" id="edit-name" value="<?php print $pro_name; ?>"><br>
		<label for="edit-name">価格</label>
		<input type="text" name="price" style="width: 200px;" id="edit-price" value="<?php print $pro_price; ?>"><br>
		<?php print $disp_gazou; ?><br>
		<input type="hidden" name="gazou_name_old" value="<?php print $pro_gazou_name_old; ?>">
		<label for="edit-img">画像を選択して下さい。</label>
		<input type="file" name="gazou" id="edit-img" style="width: 400px;"><br>
		<input type="button" onclick="history.back()" value="戻る">
		<button type="submit">OK</button>
	</form>

</body>