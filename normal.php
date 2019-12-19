﻿
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

oneOnBright(11);
oneOnBright(12);
oneOnBright(13);
oneOnBright(14);
oneOnBright(15);
oneOn(17);
oneOn(20);
//$output = `/usr/bin/env curl -s http://max.kenkl.org/lights/lrdlonfullwarm.php`;
//$output = `/usr/bin/env curl -s http://max.kenkl.org/lights/lrdl50.php`;

// Let's try something different...
for($id = 22; $id <=25; $id++) {
    oneOn($id);
    setCT($id, 400);
    setLevel($id, 127);
}


if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['normal.php']);

?>
</body>
</html>

