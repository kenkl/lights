<?php

$hostname = "huehub.kenkl.org";
$apikey = "RPVo8wEXziF6OeLtCaCUqMdqWm28DrKqVQL7ftgG";
$baseexe = '/usr/bin/env curl -s -k -X PUT -H "Content-Type: application/json"';
$baseurl = "https://".$hostname."/api/".$apikey."/lights/";
$mybase = "http://max.kenkl.org/lights/";
$callcurl = '/usr/bin/env curl -k -s -X GET ';

function oneState(string $on,int $id, int $bri, int $hue, int $sat) {
	// Let's shift to using the setHSState() form, to harmonize with setCTState somewhat. 
	// We do have callers in many scripts, so let's just thunk it over for now.
	setHSState($on,$id,$bri,$hue,$sat);
}
function setHSState(string $on,int $id, int $bri, int $hue, int $sat) {
	global $baseexe, $baseurl;
	$dothis = $baseexe." -d '{\"on\": ".$on.",\"bri\": ".$bri.",\"hue\": ".$hue.",\"sat\": ".$sat."}' ".$baseurl.$id."/state";
	$output = `$dothis`;
}
function setHS(int $id, int $hue, int $sat) {  // Set HS only; existing brightness and on state left as-is
	global $baseexe, $baseurl;
	$dothis = $baseexe." -d '{\"hue\": ".$hue.",\"sat\": ".$sat."}' ".$baseurl.$id."/state";
	$output = `$dothis`;
}
function setCTState(string $on,int $id, int $bri, int $ct) {
	// 330 = Cool, 447 = Warm (400 seems closer to 7676,254 - explore)
	global $baseexe, $baseurl;
	$dothis = $baseexe." -d '{\"on\": ".$on.",\"bri\": ".$bri.",\"ct\": ".$ct."}' ".$baseurl.$id."/state";
	$output = `$dothis`;
}
function setCT(int $id, int $ct) {
	global $baseexe, $baseurl;
	$dothis = $baseexe." -d '{\"ct\": ".$ct."}' ".$baseurl.$id."/state";
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
function checkState(int $id) {        // Is this light in-progress with conditional toggle or PIRThing?
	$statefile = stateFileName($id);
	if(is_readable($statefile)) {
		return TRUE;
	}
	else {
		return FALSE;
	}
}
function restoreState(int $id) {
	//global $hostname, $apikey;
	global $baseexe, $baseurl;
	$statefile = stateFileName($id);

	if(is_readable($statefile)) {
		$contents = file_get_contents($statefile);
		$contents = rtrim($contents);
		$dothis = $baseexe." -d ".$contents." ".$baseurl.$id."/state";
		$output = `$dothis`;
		unlink($statefile);
		return TRUE;
	}
	else {
		return FALSE;
	}

}
function clearState(int $id) {
	array_map('unlink', glob(stateFileName($id)));
}
function clearStates() {
	array_map('unlink', glob("/tmp/lights.*.state"));
}
function oneOn(int $id) {
	global $baseexe, $baseurl;
	$dothis = $baseexe." -d '{\"on\": true}' ".$baseurl.$id."/state";
	$output = `$dothis`;
}
function oneOff(int $id) {
	global $baseexe, $baseurl;
	$dothis = $baseexe." -d '{\"on\": false}' ".$baseurl.$id."/state";
	$output = `$dothis`;
}
function oneOnBright(int $id) {
	setHSState('true',$id,254,7676,143);
}
function oneOnRelax(int $id) {
	setHSState('true',$id,144,7688,199);
}
function oneOnConcentrate(int $id) {
	setHSState('true',$id,254,39391,14);
}
function oneOnSpotCool(int $id) {
	setCTState('true',$id,254,330);
}
function oneOnSpotWarm(int $id) {
	//setCTState('true',$id,254,447);
	setCTState('true',$id,254,400);
}
function setLevel(int $id,int $bri) {
	global $baseexe,$baseurl;
	$dothis = $baseexe." -d '{\"on\": true,\"bri\": ".$bri."}' ".$baseurl.$id."/state";
	$output = `$dothis`;
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
	setHSState('true',$id,76,3771,240);
}
function game_on(int $id) {
	setHSState('true',$id,144,5262,201);
}
function onFullRed(int $id){
	setHSState('true', $id, 254, 0, 254);
}
function onFullGreen(int $id){
	setHSState('true', $id, 254, 25500, 254);
}
function onFullBlue(int $id){
	setHSState('true', $id, 254, 46920, 254);
}
function toggle(int $id){
	//global $hostname, $apikey;
	if (isOn($id)){
        oneOff($id);
	}
	else {
		oneOn($id);
	}
}

?>

