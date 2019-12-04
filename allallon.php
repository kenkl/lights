
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

$output = `/usr/bin/env curl -s http://max.kenkl.org/lights/brhalf.php`;
$output = `/usr/bin/env curl -s http://max.kenkl.org/lights/normal.php`;
$output = `/usr/bin/env curl -s http://max.kenkl.org/lights/kdlonfullwarm.php`;
$output = `/usr/bin/env curl -s http://max.kenkl.org/lights/kdl50.php`;
$output = `/usr/bin/env curl -s http://max.kenkl.org/lights/hoon.php`;

// clear any dangling toggles that were in use...
$output = `/usr/bin/env curl -s http://max.kenkl.org/lights/clearstates.php`;

header('Location: ' . $_SERVER['allallon.php']);

?>
</body>
</html>

