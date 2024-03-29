<?php
session_start();
session_regenerate_id(true);
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
		require_once('../common/common.php');

		$post = sanitize($_POST);

		$onamae = $post['onamae'];
		$email = $post['email'];
		$postal1 = $post['postal1'];
		$postal2 = $post['postal2'];
		$address = $post['address'];
		$tel = $post['tel'];

		print $onamae . '様<br>';
		print '<p>ご注文ありがとうございました。</p>';
		print '<p>' . $email . '宛にメールを送付しました。</p>';
		print '<p>商品は下記住所に配送されます。</p>';
		print '<p>' . $postal1 . '-' . $postal2 . '</p>';
		print '<p>' . $address . '</p>';
		print '<p>' . $tel . '</p>';

		$honbun = '';
		$honbun .= '<p>' . $onamae . "様 \n \n この度はご注文ありがとうございました。 \n</p>";
		// .= は連結代入演算子
		$honbun .= "\n";
		$honbun .= "ご注文商品 \n";
		$honbun .= "-----------------\n";

		$cart[] = $_SESSION['cart'];
		$kazu[] = $_SESSION['kazu'];
		$max = count($cart);

		$dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
		$user = 'root';
		$password = '';
		$dbh = new PDO($dsn, $user, $password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		for ($i = 0; $i < $max; $i++) {
			$sql = 'SELECT name, price FROM mst_product WHERE code = ?';
			$stmt = $dbh->prepare($sql);
			$data[0] = $cart[$i];
			$stmt->execute($data);

			$rec = $stmt->fetch(PDO::FETCH_ASSOC);

			$name = $rec['name'];
			$price = $rec['price'];
			$suryo = $kazu[$i];
			$shokei = $price * $suryo;

			$honbun .= $name . ' ';
			$honbun .= $price . '円 x';
			$honbun .= $suryo . '個 =';
			$honbun .= $shokei . "円 \n";
		}

		$dbh = null;

		$honbun .= "送料は無料です。 \n";
		$honbun .= "------------";
		$honbun .= "\n";
		$honbun .= "代金は下記の口座にお振込み下さい。";
		$honbun .= "あああ銀行 あああ支店 普通口座 1234567 \n";
		$honbun .= "入金の確認が取れ次第、梱包、発送させて頂きます。 \n";
		$honbun .= "\n";
		$honbun .= "猫マナーーナマ猫猫マナーーナマ猫\n";
		$honbun .= " 令和最新版⚡高品質茶葉";
		$honbun .= "\n";
		$honbun .= "ほわほわ県たわた郡1-21-312";
		$honbun .= "\n";
		$honbun .= "電話番号: 090-xxx-xxxx";
		$honbun .= "\n";
		$honbun .= "メールアドレス: mmm@vvv.ccc \n";
		$honbun .= "猫マナーーナマ猫猫マナーーナマ猫\n";

		print '<br>';
		print nl2br($honbun);
	} catch (Exception $e) {
		print '<p>ただいま障害により大変ご迷惑をお掛けしております。</p>';
		print $e . '<br>';
		print $e->getMessage();
		exit();
	}
	?>
</body>