<?php

session_start();
session_regenerate_id(true);
if (isset($_SESSION['member_login']) == false) {
	print 'ようこそゲスト様。<br>';
	print '<a href="member_login.html">会員ログイン</a>';
	print '<br>';
} else {
	print 'ようこそ';
	print $_SESSION['member_name'];
	print '様  ';
	print '<a href="member_logout.php">ログアウト</a><br>';
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
		$cart = $_SESSION['cart'];
		$max = count($cart);

		$dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
		$user = 'root';
		$password = '';
		$dbh = new PDO($dsn, $user, $password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		foreach ($cart as $key => $val) {
			$sql = 'SELECT code,name,price,gazou FROM mst_product WHERE code = ?';
			$stmt = $dbh->prepare($sql);
			$data[0] = $val;
			$stmt->execute($data);

			$rec = $stmt->fetch(PDO::FETCH_ASSOC);

			$pro_name[] = $rec['name'];
			$pro_price[] = $rec['price'];
			$pro_code[] = $rec['code'];
			if ($rec['gazou'] == '') {
				$pro_gazou[] = '';
			} else {
				$pro_gazou[] = '<img src="../product/gazou/' . $rec['gazou'] . '">';
			}
			$dbh = null;


			print $max;
		}
	} catch (Exception $e) {
		print 'ただいま障害により大変ご迷惑をお掛けしております。';
		print $e . '<br>';
		print $e->getMessage();
		exit();
	}

	?>
	<p>カートの中身</p><br>
	<?php for ($i = 0; $i < $max; $i++) {
	} ?>
	for ($i = 0; $i < $max; $i++) { print $pro_code[$i]; print $pro_name[$i]; print $pro_gazou[$i]; print $pro_price[$i] . '円' ; print '<br>' ; } <form>
		<input type="button" onclick="history.back()" value="戻る">
		</form>

</body>