<?php

include 'functions.php';

oneOff(4);
oneOff(26);
oneOff(27);

oneOff(34); # The steampunk thing lives on the kitchen table. For now.

# Let's let our little xmastreething track the accent lights
$output = `/usr/bin/env curl -s http://max.kenkl.org/lights/xmastreeoff.php`;


if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['hueaccentoff.php']);

?>
