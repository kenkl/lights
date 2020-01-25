
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
# NOTE: this is not LITERALLY allall off; there are some units we skip here to let a few things
# stay on their own schedule(s). I'll note those inline...
include 'functions.php';
# 4 is the kitchen accent light - handled in hueaccentoff.php
# 10 is the Random Nightlight thing - see huernloff.php
# 26 and 27 are additional accent lights in the kitchen - handled in hueaccentoff.php
# 34 is on the kitchen table, handled in hueaccentoff.php
$lightlist = array(3,5,6,7,8,9,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,28,29,30,31,32,33,35,36,37);

foreach($lightlist as $id){
	oneOff($id);
}

# xmastreething should follow allalloff
$output = `/usr/bin/env curl -s http://max.kenkl.org/lights/xmastreeoff.php`;

# clear any dangling toggles that were in use...
clearStates();

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['allalloff.php']);

?>
</body>
</html>

