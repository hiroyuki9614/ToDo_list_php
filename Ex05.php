<?php
$myTime = $_POST['MyTime'];
$curHour = substr($myTime, 0, 2);
?>
<?= '時刻は:' . $curHour . '時です。' . '<br>'; ?>