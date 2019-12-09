<?php
// A scene for pre-wake time (15-20 minutes before the alarm). Could this be A Thing?
include 'functions.php';
$lvl = 192;
if (TRUE){  // This doesn't NEED to be conditional, but "just in case", we'll leave that here.
	oneOff(5);
	sp2_on(16);
	setLevel(16,$lvl);
	oneOff(9);
	oneOff(19);
	oneOff(3);

	# Not convinced that the downlights should be part of this...
	#sp2_on(30);
	#sp2_on(31);
	#sp2_on(32);
	#sp2_on(33);
	#setLevel(30,$lvl);
	#setLevel(31,$lvl);
	#setLevel(32,$lvl);
	#setLevel(33,$lvl);
	oneOff(30);
	oneOff(31);
	oneOff(32);
	oneOff(33);

}
if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['brwake.php']);
?>
