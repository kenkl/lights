
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
  oneOff(35);
  oneOff(39);
  $output = `/usr/bin/env curl -s http://max.kenkl.org/lights/lrdloff.php`;
}
if($id == 'O')
{
  oneOff(5);
  oneOff(9);
  oneOff(16);
  oneOff(36);
  $output = `/usr/bin/env curl -s http://max.kenkl.org/lights/brdloff.php`;
}

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['alloff.php']);
?>
