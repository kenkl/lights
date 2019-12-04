

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

$output = `curl -k -X PUT -H "Content-Type: application/json" -d '{"on": true,"bri": 144,"hue": 7676,"sat": 199}' https://$hostname/api/$apikey/lights/4/state` ;
$output = `curl -k -X PUT -H "Content-Type: application/json" -d '{"on": true}' https://$hostname/api/$apikey/lights/26/state` ;
$output = `curl -k -X PUT -H "Content-Type: application/json" -d '{"on": true}' https://$hostname/api/$apikey/lights/27/state` ;

header('Location: ' . $_SERVER['hueaccenton.php']);

?>
</body>
</html>





