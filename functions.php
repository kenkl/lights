<?php

$hostname = "huehub.kenkl.org";
$apikey = "RPVo8wEXziF6OeLtCaCUqMdqWm28DrKqVQL7ftgG";
$baseexe = '/usr/bin/env curl -s -k -X PUT -H "Content-Type: application/json"';
$baseurl = "https://".$hostname."/api/".$apikey."/lights/";

function oneState(string $on,int $id, int $bri, int $hue, int $sat) {
	global $baseexe, $baseurl;
	$dothis = $baseexe." -d '{\"on\": ".$on.",\"bri\": ".$bri.",\"hue\": ".$hue.",\"sat\": ".$sat."}' ".$baseurl.$id."/state";

	// echo $dothis."\n";
	$output = `$dothis`;
}
function stateFileName(int $id) {
	$statefile = "/tmp/lights.".$id.".state";
	return $statefile;
}
function saveHueState(int $id) {
	global $hostname, $apikey;
	$statefile = stateFileName($id);
	$output = `/usr/bin/env curl -k -s -X GET https://$hostname/api/$apikey/lights/$id`;
	$results = json_decode($output,true);
		$state = $results["state"];
		$on = $state["on"];
		$bri = $state["bri"];
		$hue = $state["hue"];
		$sat = $state["sat"];

		if ($on) {
			$on = "true";
		}
		else {
			$on = "false";
		}

	$writethis = "'{\"on\": ".$on.",\"bri\": ".$bri.",\"hue\": ".$hue.",\"sat\": ".$sat."}' \n";

	$myfile = fopen($statefile, "w");
	if($myfile != FALSE) {
	    fwrite($myfile, $writethis);
		fclose($myfile);
	}
	else {
		echo "FFS. That didn't work.";
	}

}
function saveCTState(int $id) {
	global $hostname, $apikey;
	$statefile = stateFileName($id);
	$output = `/usr/bin/env curl -k -s -X GET https://$hostname/api/$apikey/lights/$id`;
	$results = json_decode($output,true);
		$state = $results["state"];
		$on = $state["on"];
		$bri = $state["bri"];
		$ct = $state["ct"];

		if ($on) {
			$on = "true";
		}
		else {
			$on = "false";
		}

	$writethis = "'{\"on\": ".$on.",\"bri\": ".$bri.",\"ct\": ".$ct."}' \n";

	$myfile = fopen($statefile, "w");
	if($myfile != FALSE) {
	    fwrite($myfile, $writethis);
		fclose($myfile);
	}
	else {
		echo "FFS. That didn't work.";
	}

}
function saveOnState(int $id) {
	global $hostname, $apikey;
	$statefile = stateFileName($id);
	$output = `/usr/bin/env curl -k -s -X GET https://$hostname/api/$apikey/lights/$id`;
	$results = json_decode($output,true);
		$state = $results["state"];
		$on = $state["on"];

		if ($on) {
			$on = "true";
		}
		else {
			$on = "false";
		}

	$writethis = "'{\"on\": ".$on."}' \n";

	$myfile = fopen($statefile, "w");
	if($myfile != FALSE) {
	    fwrite($myfile, $writethis);
		fclose($myfile);
	}
	else {
		echo "FFS. That didn't work.";
	}

}
function restoreState(int $id) {
	global $hostname, $apikey;
	$statefile = stateFileName($id);

	if(is_readable($statefile)) {
		$contents = file_get_contents($statefile);
		$contents = rtrim($contents);
		$output = `/usr/bin/env curl -s -k -X PUT -H "Content-Type: application/json" -d $contents https://$hostname/api/$apikey/lights/$id/state`;
		unlink($statefile);
		return TRUE;
	}
	else {
		return FALSE;
	}

}
function oneOn(int $id) {
	global $hostname, $apikey;
	$output = `/usr/bin/env curl -s -k -X PUT -H "Content-Type: application/json" -d '{"on": true}' https://$hostname/api/$apikey/lights/$id/state`;
}
function oneOnBright(int $id) {
	global $hostname, $apikey;
	$output = `/usr/bin/env curl -s -k -X PUT -H "Content-Type: application/json" -d '{"on": true,"bri": 254,"hue": 7676,"sat": 143}' https://$hostname/api/$apikey/lights/$id/state`;
}
function oneOnRelax(int $id) {
	global $hostname, $apikey;
	$output = `/usr/bin/env curl -s -k -X PUT -H "Content-Type: application/json" -d '{"on": true,"bri": 144,"hue": 7688,"sat": 199}' https://$hostname/api/$apikey/lights/$id/state`;
}
function oneOnConcentrate(int $id) {
	global $hostname, $apikey;
	$output = `/usr/bin/env curl -s -k -X PUT -H "Content-Type: application/json" -d '{"on": true,"bri": 254,"hue": 39391,"sat": 14}' https://$hostname/api/$apikey/lights/$id/state`;
}
function oneOnSpotCool(int $id) {
	global $hostname, $apikey;
	$output = `/usr/bin/env curl -s -k -X PUT -H "Content-Type: application/json" -d '{"on": true,"bri": 254,"ct": 330}' https://$hostname/api/$apikey/lights/$id/state`;
}
function oneOnSpotWarm(int $id) {
	global $hostname, $apikey;
	$output = `/usr/bin/env curl -s -k -X PUT -H "Content-Type: application/json" -d '{"on": true,"bri": 254,"ct": 447}' https://$hostname/api/$apikey/lights/$id/state`;
}
function setLevel(int $id,int $bri) {
	global $hostname, $apikey;
	$output = `/usr/bin/env curl -s -k -X PUT -H "Content-Type: application/json" -d '{"on": true,"bri": $bri}' https://$hostname/api/$apikey/lights/$id/state`;
}
function oneOff(int $id) {
	global $hostname, $apikey;
	$output = `/usr/bin/env curl -s -k -X PUT -H "Content-Type: application/json" -d '{"on": false}' https://$hostname/api/$apikey/lights/$id/state`;
}
function isOn(int $id) {
	global $hostname, $apikey;
	$output = `/usr/bin/env curl -k -s -X GET https://$hostname/api/$apikey/lights/$id`;
	$results = json_decode($output,true);
        $state = $results["state"];
        $ison = $state["on"];
	
	if ($ison == True) {
		return True;
	}
	else {
		return False;
	}
}
function sp2_on(int $id) {
	global $hostname, $apikey;
        $output = `/usr/bin/env curl -k -s -X PUT -H "Content-Type: application/json" -d '{"on": true,"bri": 76,"hue": 3771,"sat": 240}' https://$hostname/api/$apikey/lights/$id/state`;
}
function game_on(int $id) {
	global $hostname, $apikey;
        $output = `/usr/bin/env curl -k -s -X PUT -H "Content-Type: application/json" -d '{"on": true,"bri": 144,"hue": 5262,"sat": 201}' https://$hostname/api/$apikey/lights/$id/state`;
}
function onFullRed(int $id){
	oneOn($id);
	oneState(true, $id, 254, 0, 254);
}
function onFullGreen(int $id){
	oneOn($id);
	oneState(true, $id, 254, 25500, 254);
}
function onFullBlue(int $id){
	oneOn($id);
	oneState(true, $id, 254, 46920, 254);
}
function toggle(int $id){
	global $hostname, $apikey;
	if (isOn($id)){
        oneOff($id);
	}
	else {
		oneOn($id);
	}
}

?>

