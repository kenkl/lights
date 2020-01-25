
<?php
require 'functions.php';
# Minimize the bedroom lights, like what we do in cinema or teevee modes, but unconditional

oneOff(5);
oneOff(16);
oneOff(9);
oneState('true',36,38,7676,199);
$output = `/usr/bin/env curl http://max.kenkl.org/lights/brdlmin.php`;

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['brmin.php']);

?>
