<?php
$columns = array();
$columns[] = 'id';
$columns[] = 'color';
$columns[] = 'age';

$line = array();
$line[] = array(111, 'yellow', 21);
$line[] = array(222, 'blue', 22);
$line[] = array(333, 'red', 23);

// テーブルの項目

print "<table border='1'>\n<tr>\n";
foreach ($columns as $value) {
	print '<th>' . $value . "</th>\n";
}
print "</tr>\n";
foreach ($line as $key1 => $value1) {
	print "<tr>\n";
	foreach ($value1 as $key2 => $value2) {
		print "<td>" . $value2 . "</td>\n";
	}
	print "</tr>\n";
}
