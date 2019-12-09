

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

$id=$_GET['id'];
$lvl=$_GET['lvl'];

if($id == 'L')
{
  oneOff(11);
  oneOff(12);
  oneOff(13);
  oneOff(14);
  oneOff(15);
  oneOff(17);
  oneOff(20);
  oneOff(28);
  oneOff(29);
  $output = `/usr/bin/env curl -s http://max.kenkl.org/lights/lrdloff.php`;
}
if($id == 'O')
{
  oneOff(5);
  oneOff(9);
  oneOff(16);
  oneOff(3);
  oneOff(19);
  $output = `/usr/bin/env curl -s http://max.kenkl.org/lights/brdloff.php`;
}

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['alloff.php']);
?>
</body>
</html>





