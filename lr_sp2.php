
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
// Sleep Protocol 2. For only the living room, dim orange (like sunset) to be a visual reminder of what time it is
// I'm a clever monkey. Let's make sure the lights are already on. If not, NOOP.
// For reference, id 14 is one of the bulbs in the big dragonfly floor lamp.
include 'functions.php';
$force = FALSE;
if(isset($_GET['force'])) $force = TRUE;
$lightlist = array(11,12,13,14,15,28,29);
$bri = 16;

if (isOn(14) || $force){
	foreach($lightlist as $id){
		sp2_on($id);
	}
	setLevel(28,$bri);
	setLevel(29,$bri);
	oneOff(17);
	oneOff(20);
	$output = `/usr/bin/env curl -s http://max.kenkl.org/lights/lrdloff.php`;
}

// 20-Oct-2019: A thought... If I'm in my office gaming, I won't get the visual cue in the LR. So, let's check the office too...

if (isOn(21)){
	$output = `/usr/bin/env curl -s http://max.kenkl.org/lights/hosp2.php`;
}



if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['lr_sp2.php']);


?>
</body>
</html>
