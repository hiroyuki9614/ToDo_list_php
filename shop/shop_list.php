<?php

session_start();
session_regenerate_id(true);
if (isset($_SESSION['login']) == false) {
	print '<p>ようこそゲスト様</p>。<br>';
	print '<a href="member_login.html">会員ログイン</a>';
	print '<br>';
} else {
	print 'ようこそ';
	print $_SESSION['member_name'];
	print '様<br>';
	print '<a href="member_logout.php">ログアウト</a>';
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
	<?php
	try {

		$dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
		$user = 'root';
		$password = '';
		$dbh = new PDO($dsn, $user, $password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = 'SELECT code,name,price FROM mst_product WHERE 1';
		$stmt = $dbh->prepare($sql);
		$stmt->execute();

		$dbh = null;

		print '<p>商品一覧</p>';

		while (true) {
			$rec = $stmt->fetch(PDO::FETCH_ASSOC);
			if ($rec == false) {
				break;
			}
			print '<a href="shop_product.php?procode=' . $rec['code'] . ' ">';
			print $rec['name'] . '---';
			print $rec['price'] . '円';
			print '</a>';
			print '<br>';
		}
		print '</form>';
	} catch (Exception $e) {
		print 'ただいま障害により大変ご迷惑をお掛けしております。<br>';
		print $e . '<br>';
		print $e->getMessage();
		exit();
	}
	?>
</body>