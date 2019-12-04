

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
$output = `/usr/bin/env curl -k -X PUT -H "Content-Type: application/json" -d '{"on": false}' https://huehub.kenkl.org/api/RPVo8wEXziF6OeLtCaCUqMdqWm28DrKqVQL7ftgG/lights/11/state` ;
$output = `/usr/bin/env curl -k -X PUT -H "Content-Type: application/json" -d '{"on": false}' https://huehub.kenkl.org/api/RPVo8wEXziF6OeLtCaCUqMdqWm28DrKqVQL7ftgG/lights/12/state` ;
$output = `/usr/bin/env curl -k -X PUT -H "Content-Type: application/json" -d '{"on": false}' https://huehub.kenkl.org/api/RPVo8wEXziF6OeLtCaCUqMdqWm28DrKqVQL7ftgG/lights/13/state` ;
$output = `/usr/bin/env curl -k -X PUT -H "Content-Type: application/json" -d '{"on": false}' https://huehub.kenkl.org/api/RPVo8wEXziF6OeLtCaCUqMdqWm28DrKqVQL7ftgG/lights/14/state` ;
$output = `/usr/bin/env curl -k -X PUT -H "Content-Type: application/json" -d '{"on": false}' https://huehub.kenkl.org/api/RPVo8wEXziF6OeLtCaCUqMdqWm28DrKqVQL7ftgG/lights/15/state` ;
$output = `/usr/bin/env curl -k -X PUT -H "Content-Type: application/json" -d '{"on": false}' https://huehub.kenkl.org/api/RPVo8wEXziF6OeLtCaCUqMdqWm28DrKqVQL7ftgG/lights/17/state` ;
$output = `/usr/bin/env curl -k -X PUT -H "Content-Type: application/json" -d '{"on": false}' https://huehub.kenkl.org/api/RPVo8wEXziF6OeLtCaCUqMdqWm28DrKqVQL7ftgG/lights/20/state` ;
$output = `/usr/bin/env curl -s http://max.kenkl.org/lights/lrdloff.php`;
oneOff(28);
oneOff(29);
}
if($id == 'O')
{
$output = `/usr/bin/env curl -k -X PUT -H "Content-Type: application/json" -d '{"on": false}' https://huehub.kenkl.org/api/RPVo8wEXziF6OeLtCaCUqMdqWm28DrKqVQL7ftgG/lights/5/state` ;
$output = `/usr/bin/env curl -k -X PUT -H "Content-Type: application/json" -d '{"on": false}' https://huehub.kenkl.org/api/RPVo8wEXziF6OeLtCaCUqMdqWm28DrKqVQL7ftgG/lights/9/state` ;
$output = `/usr/bin/env curl -k -X PUT -H "Content-Type: application/json" -d '{"on": false}' https://huehub.kenkl.org/api/RPVo8wEXziF6OeLtCaCUqMdqWm28DrKqVQL7ftgG/lights/16/state` ;
$output = `/usr/bin/env curl -k -X PUT -H "Content-Type: application/json" -d '{"on": false}' https://huehub.kenkl.org/api/RPVo8wEXziF6OeLtCaCUqMdqWm28DrKqVQL7ftgG/lights/3/state` ;
$output = `/usr/bin/env curl -k -X PUT -H "Content-Type: application/json" -d '{"on": false}' https://huehub.kenkl.org/api/RPVo8wEXziF6OeLtCaCUqMdqWm28DrKqVQL7ftgG/lights/19/state` ;
$output = `/usr/bin/env curl -s http://max.kenkl.org/lights/brdloff.php`;
}

#$output = `/usr/local/bin/heyu -c /home/pi/.heyu/x10config alloff {$id}` ;

header('Location: ' . $_SERVER['alloff.php']);
?>
</body>
</html>





