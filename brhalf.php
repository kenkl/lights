
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

oneState('true',5,100,7676,143);
oneState('true',16,100,7676,143);
oneState('true',3,100,7676,143);
oneState('true',19,100,7676,143);
oneOn(9);

//$output = `/usr/bin/env curl http://max.kenkl.org/lights/brdlonfullwarm.php`;
//$output = `/usr/bin/env curl http://max.kenkl.org/lights/brdl50.php`;

// Let's try something different...
for($id = 30; $id <=33; $id++) {
  oneOn($id);
  setCT($id, 400);
  setLevel($id, 127);
}

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['brhalf.php']);

?>
</body>
</html>

