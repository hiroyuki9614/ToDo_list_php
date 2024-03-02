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

		$pro_code = $_GET['procode'];

		$cart[] = $pro_code;
		$_SESSION['cart'] = $cart;

		foreach ($cart as $key => $value) {
			print $val;
			print '<br>';
		}
	} catch (Exception $e) {
		print 'ただいま障害により大変ご迷惑をお掛けしております。';
		print $e . '<br>';
		print $e->getMessage();
		exit();
	}

	?>
	<p>カートに追加しました。</p>
	<br>
	<a href="shop_list.php">商品一覧に戻る</a>
</body>