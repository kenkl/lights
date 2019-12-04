<!DOCTYPE html>
<!-- This is a list of the current lights and their status in huehub. The rest of the app is NOT available here. -->
<html><head><title>Lights List</title></head><body>
<?php
include 'functions.php';
$output = `/usr/bin/env curl -s -k https://$hostname/api/$apikey`;
$hub = json_decode($output, true);
$lights = $hub["lights"];
$ison = "OFF";
$ids = array_keys($lights);
foreach($ids as $lightid){
	if ($lights[$lightid]["state"]["on"] == True) {
		$ison = "ON";
	}
	else {
		$ison = "OFF";
	}
	printf("%d - %s   %s<br>\n", $lightid, $lights[$lightid]["name"],$ison);
}
?>
</body>
</html>


