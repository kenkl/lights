
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

//$output = `/home/pi/bin/on_br_full` ;

$output = `/usr/bin/env curl -k -X PUT -H "Content-Type: application/json" -d '{"on": true,"bri": 254,"hue": 8402,"sat": 140}' https://huehub.kenkl.org/api/RPVo8wEXziF6OeLtCaCUqMdqWm28DrKqVQL7ftgG/lights/5/state`;
$output = `/usr/bin/env curl -k -X PUT -H "Content-Type: application/json" -d '{"on": true,"bri": 254,"hue": 8402,"sat": 140}' https://huehub.kenkl.org/api/RPVo8wEXziF6OeLtCaCUqMdqWm28DrKqVQL7ftgG/lights/16/state`;
$output = `/usr/bin/env curl -k -X PUT -H "Content-Type: application/json" -d '{"on": true,"bri": 254,"hue": 8402,"sat": 140}' https://huehub.kenkl.org/api/RPVo8wEXziF6OeLtCaCUqMdqWm28DrKqVQL7ftgG/lights/3/state`;
$output = `/usr/bin/env curl -k -X PUT -H "Content-Type: application/json" -d '{"on": true,"bri": 254,"hue": 8402,"sat": 140}' https://huehub.kenkl.org/api/RPVo8wEXziF6OeLtCaCUqMdqWm28DrKqVQL7ftgG/lights/19/state`;
$output = `/usr/bin/env curl -k -X PUT -H "Content-Type: application/json" -d '{"on": true}' https://huehub.kenkl.org/api/RPVo8wEXziF6OeLtCaCUqMdqWm28DrKqVQL7ftgG/lights/9/state`;

$output = `/usr/bin/curl http://max.kenkl.org/lights/brdlonfullwarm.php`;

// header('Location: ' . $_SERVER['HTTP_REFERER']);
header('Location: ' . $_SERVER['brfull.php']);

?>
</body>
</html>

