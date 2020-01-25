<?php
// A scene for pre-wake time (15-20 minutes before the alarm). Could this be A Thing?
include 'functions.php';
$lvl = 127;
if (TRUE){  // This doesn't NEED to be conditional, but "just in case", we'll leave that here for now.
	oneOff(5);
	oneOff(9);
	oneOff(36);
	sp2_on(16);
	setLevel(16,$lvl);
	
	$output = `/usr/bin/env curl -s http://max.kenkl.org/lights/brdloff.php`;
}
if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['brwake.php']);
?>
