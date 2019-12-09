
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
// NOTE: this is not LITERALLY allall off; there are some units we skip here to let a few things
// stay on their own schedule(s). I'll note those inline...
include 'functions.php';

oneOff(3);
// 4 is the kitchen accent light - handled in hueaccentoff.php
oneOff(5);
oneOff(6);
oneOff(7);
oneOff(8);
oneOff(9);
// 10 is the Random Nightlight thing - see huernloff.php
oneOff(11);
oneOff(12);
oneOff(13);
oneOff(14);
oneOff(15);
oneOff(16);
oneOff(17);
oneOff(18);
oneOff(19);
oneOff(20);
oneOff(21);
oneOff(22);
oneOff(23);
oneOff(24);
oneOff(25);
// 26 and 27 are additional accent lights in the kitchen - handled in hueaccentoff.php
oneOff(28);
oneOff(29);
oneOff(30);
oneOff(31);
oneOff(32);
oneOff(33);

// clear any dangling toggles that were in use...
clearStates();

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['allalloff.php']);

?>
</body>
</html>

