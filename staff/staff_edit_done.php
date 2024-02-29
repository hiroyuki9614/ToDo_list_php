<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>茶葉の園</title>
</head>

<body>
	<?php

	try {
		$staff_code = $_POST['code'];
		$staff_name = $_POST['name'];
		$staff_pass = $_POST['pass'];

		$staff_name = htmlspecialchars($staff_name, ENT_QUOTES, 'UTF-8');
		$staff_pass = htmlspecialchars($staff_pass, ENT_QUOTES, 'UTF-8');

		$dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
		$user = 'root';
		$password = '';
		$dbh = new PDO($dsn, $user, $password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = 'UPDATE mst_staff SET name=?,password=? WHERE code=?';
		$stmt = $dbh->prepare($sql);
		$data[] = $staff_name;
		$data[] = $staff_pass;
		$data[] = $staff_code;
		$stmt->execute($data);

		$dbh = null;
	} catch (Exception $e) {
		print 'ただいま障害により大変ご迷惑をお掛けしております。<br>';
		print $e . '<br>';
		print $e->getMessage();
		exit();
	}

	?>
	<p>修正しました。</p>
	<?php print $staff_name ?>
	<?php print $staff_code ?>
	<a href="staff_list.php">戻る</a>
</body>