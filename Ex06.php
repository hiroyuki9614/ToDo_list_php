<?php
$x = $_POST['X'];
$y = $_POST['Y'];
?>
<?= '<BR>Xの値は:' . $x; ?>
<?= '<BR>Yの値は:' . $y; ?>
<?php
print '<BR>x + y = ' . ($x + $y);
print '<BR>x - y = ' . ($x - $y);
print '<BR>x * y = ' . ($x * $y);
print '<BR>x / y = ' . ($x / $y);
?>