
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
require 'functions.php';

# Bring the lights down low
oneState('true',11,39,8402,140);
oneState('true',12,39,8402,140);
oneState('true',13,39,8402,140);
oneState('true',14,39,8402,140);
oneState('true',15,39,8402,140);
oneOn(17);
oneOn(20);
$output = `/usr/bin/env curl -s http://max.kenkl.org/lights/lrdloff.php`;

# ...and then bring the bedroom down a bit too, but only if  it's not already dimmed or whatever
if(isOn(9)) {
  oneOff(5);
  oneOff(16);
  oneOff(9);
  oneState('true',3,38,7676,199);
  oneState('true',19,38,7676,199);
  $output = `/usr/bin/env curl http://max.kenkl.org/lights/brdlmin.php`;
}

# Let's turn off xmastreething to fit the scene
$output = `/usr/bin/env curl -s http://max.kenkl.org/lights/xmastreeoff.php`;

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['cinema.php']);

?>
</body>
</html>
