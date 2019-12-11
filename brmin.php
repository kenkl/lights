
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
# Minimize the bedroom lights, like what we do in cinema or teevee modes, but unconditional

  oneOff(5);
  oneOff(16);
  oneOff(9);
  oneState('true',3,38,7676,199);
  oneState('true',19,38,7676,199);
  $output = `/usr/bin/env curl http://max.kenkl.org/lights/brdlmin.php`;

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['brmin.php']);

?>
</body>
</html>
