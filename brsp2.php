
<?php
include 'functions.php';
include 'pirthing1_vars.php'; # see below...
$lvl = 16;
if (isOn(16) ||  isOn(36)){
	# Preheat the nightlight downlight to prevent the white flash
	oneState('true',$tl1,64,0,254);
	
	oneOff(5);
	sp2_on(16);
	setLevel(16,$lvl);
	oneOff(9);
	oneOff(36);

	$output = `/usr/bin/env curl -s http://max.kenkl.org/lights/brdloff.php`;

	#sleep(1);
	oneState('false',$tl1,64,0,254);

}

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['brsp2.php']);

?>
