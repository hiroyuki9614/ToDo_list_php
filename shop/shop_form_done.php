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
	} catch (Exception $e) {
		print 'ただいま障害により大変ご迷惑をお掛けしております。';
		print $e . '<br>';
		print $e->getMessage();
		exit();
	}
	?>
</body>