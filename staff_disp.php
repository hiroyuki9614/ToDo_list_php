<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>茶葉の園</title>
</head>

<body>
	<?php

	try {

		$staff_code = $_GET['staffcode'];
		$dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
		$user = 'root';
		$password = '';
		$dbh = new PDO($dsn, $user, $password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = 'SELECT name FROM mst_staff WHERE code=?';
		$stmt = $dbh->prepare($sql);
		$data[] = $staff_code;
		$stmt->execute($data);

		$rec = $stmt->fetch(PDO::FETCH_ASSOC);
		$staff_name = $rec['name'];

		$dbh = null;
	} catch (Exception $e) {
		print 'ただいま障害により大変ご迷惑をお掛けしております。';
		exit();
	}

	?>
	<p>スタッフ情報参照</p><br>
	<p>スタッフコード</p>
	<?php print $staff_code; ?>
	<p>スタッフ名</p>
	<?php print $staff_name; ?>
	<form>
		<input type="button" onclick="history.back()" value="戻る">
	</form>

</body>