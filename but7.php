<?php
require 'functions.php';
$lf = 'kcstog.php';
$output = `{$callcurl}{$mybase}{$lf}`; # We should be able to call doThing("kcstog.php") here?
if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['but7.php']);
?>
