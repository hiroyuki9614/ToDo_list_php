<?php
$myMessage = $_POST['myMessage'];
print 'メッセージは:<br>';
print $myMessage;
print '<br>別の出力方法では:<br>';
?>
<?= $myMessage; ?>
