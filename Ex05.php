<?php
$myTime = $_POST['MyTime'];
$curHour = substr($myTime, 0, 2);
?>
<?= '時刻は:' . $curHour . '時です。' . '<br>'; ?>
<?php
if ($curHour >= 18)
	print '<h2>こんばんは</h2>';
elseif ($curHour >= 12)
	print '<h2>こんにちは</h2>';
else
	print '<h2>おはようございます</h2>';
?>