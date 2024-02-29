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
	<?php
	try {

		$dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
		$user = 'root';
		$password = '';
		$dbh = new PDO($dsn, $user, $password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = 'SELECT code,name FROM mst_staff WHERE 1';
		$stmt = $dbh->prepare($sql);
		$stmt->execute();

		$dbh = null;

		print '<p>スタッフ一覧</p>';

		print '<form method="post" action="staff_branch.php">';
		while (true) {
			$rec = $stmt->fetch(PDO::FETCH_ASSOC);
			if ($rec == false) {
				break;
			}
			print '<input type="radio" name="staffcode" value="' . $rec['code'] . '" >';
			print $rec['name'];
			print '<br>';
		}
		print '<button type="submit" name="disp">参照</button>';
		print '<button type="submit" name="add">追加</button>';
		print '<button type="submit" name="edit">修正</button>';
		print '<button type="submit" name="delete">削除</button>';
		print '</form>';
	} catch (Exception $e) {
		print 'ただいま障害により大変ご迷惑をお掛けしております。<br>';
		print $e . '<br>';
		print $e->getMessage();
		exit();
	}
	?>
	<br>
	<a href="../staff_login/staff_top.php">トップメニューへ</a>
</body>