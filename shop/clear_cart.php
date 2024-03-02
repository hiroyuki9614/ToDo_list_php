<?php
session_start();
$_SESSION = array();
if (isset($_COOKIE['session_name']) == true) {
	setcookie(session_name(), '', time() - 42000, '/');
}
session_destroy();
?>
<!DOCTYPE html>

<body>
	<p>カートを空にしました。</p>
</body>