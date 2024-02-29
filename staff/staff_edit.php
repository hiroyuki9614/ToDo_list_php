<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>茶葉の園</title>
</head>

<body>
	<?php

	try {

		$staff_code = $_GET['staffcode'];
		$dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
		$user = 'root';
		$password = '';
		$dbh = new PDO($dsn, $user, $password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = 'SELECT name FROM mst_staff WHERE code=?';
		$stmt = $dbh->prepare($sql);
		$data[] = $staff_code;
		$stmt->execute($data);

		$rec = $stmt->fetch(PDO::FETCH_ASSOC);
		$staff_name = $rec['name'];

		$dbh = null;
	} catch (Exception $e) {
		print 'ただいま障害により大変ご迷惑をお掛けしております。';
		exit();
	}

	?>
	<p>スタッフを修正する</p><br>
	<p>スタッフコード</p>
	<?php print $staff_code; ?>
	<form method="post" action="staff_edit_check.php">
		<input type="hidden" name="code" value="<?php print $staff_code; ?>">
		<label for="edit-staff">スタッフ名</label>
		<input type="text" name="name" style="width: 200px;" id="edit-staff" value="<?php print $staff_name; ?>"><br>
		<label for="edit-pass">パスワードを入力して下さい。</label><br>
		<input type="password" name="pass" style="width: 100px;" id="edit-pass"><br>
		<label for="edit-pass">パスワードをもう一度入力して下さい。</label><br>
		<input type="password" name="pass2" style="width: 100px;" id="edit-pass2"><br>
		<input type="button" onclick="history.back()" value="戻る">
		<button type="submit">OK</button>
	</form>

</body>