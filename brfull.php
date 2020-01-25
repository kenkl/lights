
<?php
require 'functions.php';

oneOnBright(5);
oneOnBright(16);
oneOnBright(36);
oneOn(9);

$output = `/usr/bin/curl http://max.kenkl.org/lights/brdlonfullwarm.php`;

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['brfull.php']);

?>
