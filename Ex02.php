<?php
print '和の計算を初めます<br>';
$sum = 0;
for ($i = 1; $i <= 10; $i++) {
	$sum += $i;
	print 'i=' . $i . '<br>';
}
print 'sum =' . $sum;
