
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
$lightlist = array(11,12,13,14,15);

# Let's add a quick check whether the downlights should be full-brightness
$full = FALSE; # We default to half-brightness
$fulldl = $_GET['fulldl'];
if(isset ($fulldl)) $full = TRUE; #we only care if fulldl exists; value doesn't matter

foreach($lightlist as $id) {
  oneOnBright($id);
}
oneOn(17);
oneOn(20);

# Let's build the fulldl conditional into multiple calls (button-presses). 
if(isOn(23) && getBri(23) != 254) $full = TRUE;

# Downlights 
for($id = 22; $id <=25; $id++) {
    oneOn($id);
    setCT($id, $ctWarm);
    if($full) setLevel($id, 254); # DLs full-brightness?
    else setLevel($id, 127);
}

# Ironically, turn off the TV backlights if they're on. This will have no effect if we're streaming.
oneOff(28);
oneOff(29);
oneOff(39);

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['normal.php']);

?>
</body>
</html>

