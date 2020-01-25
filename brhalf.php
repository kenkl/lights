
<?php
require 'functions.php';

oneState('true',5,127,7676,143);
oneState('true',16,127,7676,143);
oneState('true',36,127,7676,143);
oneOn(9);

$output = `/usr/bin/env curl -s http://max.kenkl.org/lights/brdl50.php`;

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['brhalf.php']);

?>
