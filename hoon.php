<?php
include 'functions.php';

oneOn(18);
oneOnBright(21);

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['hoon.php']);
?>

