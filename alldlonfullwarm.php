

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

oneOnSpotWarm(22);
oneOnSpotWarm(23);
oneOnSpotWarm(24);
oneOnSpotWarm(25);
oneOnSpotWarm(6);
oneOnSpotWarm(7);
oneOnSpotWarm(8);
oneOnSpotWarm(30);
oneOnSpotWarm(31);
oneOnSpotWarm(32);
oneOnSpotWarm(33);

header('Location: ' . $_SERVER['alldlonfullwarm.php']);

?>
</body>
</html>





