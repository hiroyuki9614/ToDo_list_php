<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="utf-8">
	<title> displayAllPhrases.php</title>
</head>

<body>
	<div style="text-align: center;">
		<h1>いろんな言語で挨拶</h1><br>
		<?php
		$dsn = 'mysql:host = localhost; dbname = umlebu';
		$superName = 'student30';
		$passWord = 'openlab1';
		$tabeName = 'phrasestb';

		try {
			$dbh = new PDO($dsn, $userName, $passWord);
		} catch (PDOException $e) {
			echo $e->getMessage();
			exit;
		}

		$sql = "show columns from $tableName";
		$stmt = $dbh->query($sql);
		$columns = array();
		while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$columns[] = $data["Field"];
		}

		$sql = "select * from $tableName";
		$statement = $dbh->query($sql);

		$line = array();
		while ($data = $statement->fetch(PDO::FETCH_ASSOC)) {
			$line[] = $data;
		}
		print "<table border='1'>\n<tr>\n";
		foreach ($columns as $value) {
			print "<th>" . $value . "</ td>\n";
		}
		print "<table border='1'>\n<tr>\n";
		foreach ($line as $key1 => $value1) {
			print "<tr>\n";
			foreach ($value1 as $key2 => $value2) {
				print "<th>" . $value . "</ td>\n";
			}
		}
		?>
</body>

</html>