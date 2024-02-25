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

		print '<form method="post" action="pro_branch.php">';
		while (true) {
			$rec = $stmt->fetch(PDO::FETCH_ASSOC);
			if ($rec == false) {
				break;
			}
			print '<input type="radio" name="procode" value="' . $rec['code'] . '" >';
			print $rec['name'] . '---';
			print $rec['price'] . '円';
			print '<br>';
		}
		print '<button type="submit" name="disp">参照</button>';
		print '<button type="submit" name="add">追加</button>';
		print '<button type="submit" name="edit">修正</button>';
		print '<button type="submit" name="delete">削除</button>';
		print '</form>';
	} catch (Exception $e) {
		print '<p>ただいま障害により大変ご迷惑をお掛けしております。</p>';
		exit();
	}
	?>
</body>