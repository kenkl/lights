

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
# A simple, non-conditional script for PIRThing (https://github.com/kenkl/pirthing - coming soon). PIRThing, based on
# MotionNightlight (https://github.com/kenkl/MotionNightlight), is an ESP8266 that has a PIR sensor and will call an on or
# off script here based on its logic/timings. Which unit(s) it affects are then expressed here, letting PIRThing control
# different lights with different behaviours without reflashing PIRThing itself. 
# Lets put time-of-day conditionals here as needed - no point in turning on a nightlight-thing at 15:30.
include 'functions.php';
date_default_timezone_set('America/New_York');  # Default is UTC. That's not super-useful here.
$nowtime = (int)date('Hi', time()); 

if($nowtime >= 1641) { # Are we going to honour this trigger? This probably should express a range of times; crossing over 00:00 is going to be A Thing.
  echo "{$nowtime} - Do.\n";
}
else {
  echo "{$nowtime} - Do not.\n";
}
echo'';

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['pirthing1_on.php']);

?>
</body>
</html>





