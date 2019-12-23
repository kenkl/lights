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
# This is the accent/nightlight entities in the Kitchen. 
include 'functions.php';

oneState('true',4,144,7676,199);
oneOn(26);
oneOn(27);

# Let's let our little xmastreething track the accent lights
$output = `/usr/bin/env curl -s http://max.kenkl.org/lights/xmastreeon.php`;


if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['hueaccenton.php']);

?>
</body>
</html>





