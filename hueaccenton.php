<?php
# These are accent/ambient light things scattered around the house
include 'functions.php';

setHSState('true',4,127,7676,199);
oneOn(26);
oneOn(27);

# Adding the steampunk thing to the accent pool. For now.
setLevel(34,1);

# Let's let our little xmastreething track the accent lights
$output = `/usr/bin/env curl -s http://max.kenkl.org/lights/xmastreeon.php`;


if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['hueaccenton.php']);

?>
