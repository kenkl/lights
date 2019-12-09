<?php
include 'functions.php';

oneOff(18);
sp2_on(21);

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['hogame.php']);
?>

