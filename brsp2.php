
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
         "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Lights</title>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
  <link rel="apple-touch-icon" href="msc_icon.png" />
  <style type="text/css" media="screen">@import "iui/iui.css";</style>
  <script type="application/x-javascript" src="iui/iui.js"></script>

</head>
<body>

<?php
include 'functions.php';
$lvl = 64;
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

}

header('Location: ' . $_SERVER['brsp2.php']);

?>
</body>
</html>

