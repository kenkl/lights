
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!--
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Lights</title>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
  <link rel="apple-touch-icon" href="msc_icon.png" />
  <style type="text/css" media="screen">@import "iui/iui.css";</style>
  <script type="application/x-javascript" src="iui/iui.js"></script>

</head>
<body>
-->

<?php
// Let's detect the state of one of the lights in the LR to build a conditional whether to do A Thing

$output = `/usr/bin/env curl -k -X GET https://huehub.kenkl.org/api/RPVo8wEXziF6OeLtCaCUqMdqWm28DrKqVQL7ftgG/lights/14`;
$results = json_decode($output,true);

$state = $results["state"];
$ison = $state["on"];

if ($ison == True) {
	echo "It's on";
}
else {
	echo "It's off";
}

//header('Location: ' . $_SERVER['lr_detect.php']);

?>
<!--
</body>
</html>
-->


