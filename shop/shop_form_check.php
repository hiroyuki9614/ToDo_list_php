<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>茶葉の園</title>
</head>

<body>
	<?php

	require_once('../common/common.php');

	$post = sanitize($_POST);

	$onamae = $post['onamae'];
	$email = $post['email'];
	$postal1 = $post['postal1'];
	$postal2 = $post['postal2'];
	$address = $post['address'];
	$tel = $post['tel'];

	$okflg = true;

	if ($onamae == '') {
		print 'お名前が入力されていません。<br>';
		$okflg = false;
	} else {
		print 'お名前:';
		print $onamae;
		print '<br>';
	}
	if (preg_match('/\A[\w\-\.]+\@[\w\-\.]+\.([a-z]+)\z/', $email) == 0) {
		print 'メールアドレスを正確に入力して下さい。<br>';
		$okflg = false;
	} else {
		print 'メールアドレス:';
		print $email;
		print '<br>';
	}
	if (preg_match('/\A[0-9]+\z/', $postal1) == 0) {
		print '郵便番号は半角数字で入力してください。<br /><br />';
	}

	if (preg_match('/\A[0-9]+\z/', $postal2) == 0) {
		print '郵便番号は半角数字で入力してください。<br /><br />';
		$okflg = false;
	} else {
		print '郵便番号:';
		print $postal1;
		print ' - ';
		print $postal2;
		print '<br>';
	}
	if ($address == '') {
		print '住所が入力されていません。';
		$okflg = false;
	} else {
		print '住所:';
		print $address;
		print '<br>';
	}
	if (preg_match('/\A\d{2,5}-?\d{2,5}-?\d{4,5}\z/', $tel) == 0) {
		print '電話番号を正確に入力してください。<br /><br />';
		$okflg = false;
	} else {
		print '電話番号:';
		print $tel;
		print '<br>';
	}

	if ($okflg == true) {
		print '<form method="post" action="shop_done.php">';
		print '<input type="hidden" name="onamae" value="' . $onamae . '">';
		print '<input type="hidden" name="email" value="' . $email . '">';
		print '<input type="hidden" name="postal1" value="' . $postal1 . '">';
		print '<input type="hidden" name="postal2" value="' . $postal2 . '">';
		print '<input type="hidden" name="address" value="' . $address . '">';
		print '<input type="hidden" name="tel" value="' . $tel . '">';
		print '<input type="button" onclick="history.back()" value="戻る" />';
		print '<button type="submit">OK</button><br />';
		print '</form>';
	} else {
		print '<form>';
		print '<input type="button" onclick="history.back()" value="戻る" />';
		print '</form>';
	}
	?>

</body>