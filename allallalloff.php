<?php
# Unconditional shutoff of ALL lights, without concern for grouping or states or whatever.
include 'functions.php';
$output = `/usr/bin/env curl -s -k https://$hostname/api/$apikey`;
$hub = json_decode($output, true);
$lights = $hub["lights"];
$id = array_keys($lights);
foreach($id as $lightid) {
    oneOff($lightid);
}

# things that are not part of the Hue ecosystem here.
#$output = `/usr/bin/env curl -s http://max.kenkl.org/lights/xmastreeoff.php`;

# clear any in-process toggles
clearStates();

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['allalloff.php']);
?>

