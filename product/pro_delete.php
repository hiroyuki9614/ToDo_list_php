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

		$pro_code = $_GET['procode'];
		$dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
		$user = 'root';
		$password = '';
		$dbh = new PDO($dsn, $user, $password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = 'SELECT name,gazou FROM mst_product WHERE code=?';
		$stmt = $dbh->prepare($sql);
		$data[] = $pro_code;
		$stmt->execute($data);

		$rec = $stmt->fetch(PDO::FETCH_ASSOC);
		$pro_name = $rec['name'];
		$pro_gazou_name = $rec['gazou'];

		$dbh = null;
		if ($pro_gazou_name == '') {
			$disp_gazou = '';
		} else {
			$disp_gazou = '<img src="./gazou/' . $pro_gazou_name . '">';
		}
	} catch (Exception $e) {
		print 'ただいま障害により大変ご迷惑をお掛けしております。<br>';
		print $e . '<br>';
		print $e->getMessage();
		exit();
	}

	?>
	<p>商品を削除する</p>
	<p>商品名:<?php print $pro_name ?></p>
	<p>商品コード</p>
	<?php print $pro_code; ?>
	<form method="post" action="pro_delete_done.php">
		<input type="hidden" name="code" value="<?php print $pro_code; ?>">
		<?php print $disp_gazou; ?><br>
		<input type="hidden" name="gazou_name" value="<?php print $pro_gazou_name; ?>">
		<input type="button" onclick="history.back()" value="戻る">
		<button type="submit">OK</button>
	</form>

</body>