<?php
# Simple non-state-aware toggle of the floor lamp
include 'functions.php';

toggle(38);

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['hofltog.php']);
?>
