
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
// Candleboxes only on; everything else off. Simple...
include 'functions.php';
$lightlist = array(11,12,13,14,15,28,29,39,22,23,24,25); //including lrdl's here (22-25) to streamline the function
$candleboxen = array(17,20);

foreach($lightlist as $id){
	oneOff($id);
}

foreach($candleboxen as $id){
	oneOn($id);
}

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['lrcbon.php']);

?>
</body>
</html>
