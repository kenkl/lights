#!/usr/bin/env php
<?php
// This is meant to be run as a shell script (as seen with the shebang above). It looks wierd in a browser (no line breaks). Use ll.php with a browser.
include 'functions.php';
$output = `/usr/bin/env curl -s -k https://$hostname/api/$apikey`;
$hub = json_decode($output, true);
$lights = $hub["lights"];
$ison = "OFF";
$ids = array_keys($lights);
foreach($ids as $lightid){
	if ($lights[$lightid]["state"]["on"] == True){
		$ison = "ON";
	}
	else {
		$ison = "OFF";
	}
	printf("%d - %s   %s\n", $lightid, $lights[$lightid]["name"],$ison);
}

?>

