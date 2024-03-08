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

	print $onamae. '様<br>';

	$onamae = $post['onamae'];
	$email = $post['email'];
	?>
</body>