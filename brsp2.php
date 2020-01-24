
<?php
include 'functions.php';
include 'pirthing1_vars.php'; # see below...
$lvl = 16;
if (isOn(16) ||  isOn(3)){
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

	# Preheat the nightlight downlight to prevent the white flash
	oneState('true',$tl1,64,0,254);
	sleep(1);
	oneState('false',$tl1,64,0,254);

}

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['brsp2.php']);

?>
