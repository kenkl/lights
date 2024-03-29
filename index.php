﻿<!DOCTYPE html>
<!-- This is the core of the Lights app, relying on numerous external .php files, and the iUI framework. Gotta get 'em all!! -->
<html>
<head>
  <title>Lights</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
  <link rel="stylesheet" href="iui/iui.css" type="text/css" />
  <link rel="stylesheet" href="iui/t/default/default-theme.css"  type="text/css"/>
  <script type="application/x-javascript" src="iui/iui.js"></script> 
</head>
<body>
    <div class="toolbar">
        <h1 id="pageTitle"></h1>
        <a id="backButton" class="button" href="#"></a>
    </div>


    <ul id="home" title="Lights" selected="true">
	<li><a href="#lights3">Scene/Group Controls</a></li>
	<li><a href="#lightlist">Light List with simple toggles</a></li>
	<li><a href="#buttons">Button endpoints</a></li>
    <li><a onclick="javascript:location.reload(true)">Reload</a></li>
	<li> </li>
	<li><a href="goodmorning.php">Good morning, houseplants. Yes, it's wake-up time.</a></li>
	<li> </li>
	<li><a href="toggle.php?id=40">Toggle the espresso machine on or off.</a></li>
	<li><a href="toggle.php?id=35">Toggle the coffee station worklight on or off.</a></li>
    </ul>

	<ul id="lights3" title="Lights">
	<li><a href="#alldl">ALL Downlights</a></li>
	<li><a href="#kdl">Kitchen Downlights</a></li>
	<li><a href="#lrdl">Living room Downlights</a></li>
	<li><a href="#brdl">Bedroom Downlights</a></li>
	<li><a href="#lr">Living room scenes</a></li>
	<li><a href="#br">Bedroom scenes</a></li>
	<li><a href="#ho">Home Office scenes</a></li>
	<li> </li>
	<li><a href="medtog.php">Meditation Corner toggle</a></li>
	<li><a href="readtog.php">Living room reading toggle</a></li>
	<li><a href="brrtog.php">Bedroom reading toggle</a></li>
	<li><a href="hotog.php">Home Office toggle (test)</a></li>
	<li><a href="tvblsp2.php">TV Backlight SP2</a></li>
	<li><a href="tvbloff.php">TV Backlight OFF</a></li>
	<li><a href="#alloffprompt">All Off</a></li>	
	<li><a href="allallon.php">ALLALL ON (are you sure?)</a></li>	
	</ul>

	<ul id="buttons" title="Lights">
	    <li class="group">Button endpoints</li>
        <li><a href="but1.php">but1 (readtog)</a></li>
        <li><a href="but2.php">but2 (brrtog)</a></li>
        <li><a href="but3.php">but3 (medtog)</a></li>
        <li><a href="but4.php">but4 (alldltog)</a></li>
        <li><a href="but5.php">but5 (hotog)</a></li>
        <li><a href="but6.php">but6 (cycle through LR modes)</a></li>
        <li><a href="but7.php">but7 (kcstog)</a></li>
        <li><a href="but8.php">but8 (rpctog)</a></li>
		<li>  </li>
		<li><a href="hueaccenton.php">Accent group ON</a></li>
		<li><a href="hueaccentoff.php">Accent group OFF</a></li>
		<li><a href="clearstates.php">Clear all toggle statefiles</a></li>
		<li><a href="allallalloff.php">ALLALLALLOFF with statefile clear</a></li>
		<li><a href="#tests">Test controls</a></li>
    </ul>

	<ul id="tests" title="Lights">
	    <li class="group">Test controls</li>
        <li><a href="rgbtreeon.php">RGB XMas tree ON</a></li>
        <li><a href="rgbtreeoff.php">RGB XMas tree OFF</a></li>
        <li><a href="xmastreeon.php">XMas tree ON</a></li>
        <li><a href="xmastreeoff.php">XMas tree OFF</a></li>
        <li><a href="http://wing.kenkl.org:5000/api?call=honormal()">HO Normal</a></li>
        <li><a href="http://wing.kenkl.org:5000/api?call=hoh1()">HO Half (DF on)</a></li>
        <li><a href="http://wing.kenkl.org:5000/api?call=hoh2()">HO Half (DF off)</a></li>
        <li><a href="http://wing.kenkl.org:5000/api?call=hogame()">HO Game</a></li>
        <li><a href="http://wing.kenkl.org:5000/api?call=homin1()">HO Min (1)</a></li>
        <li><a href="http://wing.kenkl.org:5000/api?call=homin47()">HO Min (47)</a></li>
        <li><a href="http://wing.kenkl.org:5000/api?call=howltog()">HO WL Toggle</a></li>
        <li><a href="http://wing.kenkl.org:5000/api?call=hoalloff()">HO All Off</a></li>
    </ul>

	<ul id="br" title="Lights">
	    <li class="group">Bedroom scenes</li>
	    <li><a href="brfull.php">Full intensity</a></li>
	    <li><a href="brhalf.php">Half-ish</a></li>
	    <li><a href="brmin.php">Minimum</a></li>
	    <li><a href="brsp2.php">SP2 mode</a></li>
	    <li><a href="brwake.php">Wake-up gently (test)</a></li>
	    <li><a href="alloff.php?id=O">OFF</a></li>
    </ul>

	<ul id="lr" title="Lights">
	    <li class="group">Living room scenes</li>
	    <li><a href="normal.php?fulldl">Normal with FULLDL brightness</a></li>
	    <li><a href="normal.php">Normal (default state)</a></li>
	    <li><a href="loft_teevee.php">TV mode</a></li>
	    <li><a href="cinema.php">Cinema mode</a></li>
	    <li><a href="lr_sp2.php">Twilight mode (SP2)</a></li>
	    <li><a href="lr_sp2.php?force">Twilight mode (SP2) - force</a></li>
		<li><a href="lrcbon.php">Candleboxes only on</a></li>
	    <li><a href="alloff.php?id=L">OFF</a></li>
    </ul>

    <ul id="ho" title="Lights">
        <li class="group">Home Office</li>
        <li><a href="hoon.php">On Bright</a></li>
        <li><a href="hoon.php?lvl=128">Half Bright, DF on</a></li>
        <li><a href="hoon.php?lvl=127">Half Bright, DF off</a></li>
        <li><a href="hoon.php?lvl=47">Minimal (47)</a></li>
        <li><a href="hoon.php?lvl=1">Minimal (1)</a></li>
		<li>  </li>
        <li><a href="howltog.php">Work light toggle</a></li>
        <li><a href="hofltog.php">Floor lamp toggle</a></li>
	    <li><a href="horlx.php">On Relax</a></li>
        <li><a href="hogame.php">Game Mode</a></li>
        <li><a href="hosp2.php">SP2 Mode</a></li>
	<li><a href="hooff.php">OFF</a></li>
    </ul>
	
	<ul id="alloffprompt" title="Lights">
	    <li class="group">All Off.</li>
	    <li><a href="alloff.php?id=L">Living Room</a></li>
	    <li><a href="alloff.php?id=O">Bedroom</a></li>
	    <li><a href="hooff.php">Home Office</a></li>
	    <li><a href="allalloff.php?id=L">Everything</a></li>
	</ul>
						
	<ul id="kdl" title="Lights">
	    <li class="group">Kitchen downlights</li>
	    <li><a href="kdlonlast.php">ON - Last used setting</a></li>
	    <li><a href="kdlonfullwarm.php">ON Full (100%) Warm</a></li>
	    <li><a href="kdlonfullcool.php">ON Full (100%) Cool</a></li>
	    <li><a href="kdl50.php">Dim to half (ON, Last CT, 50%)</a></li>
	    <li><a href="kdlmin.php">Dim to Min (1)</a></li>
	    <li><a href="kdloff.php">OFF</a></li>
	</ul>
	
    <ul id="lrdl" title="Lights">
	    <li class="group">Living room downlights</li>
	    <li><a href="lrdlonlast.php">ON - Last used setting</a></li>
	    <li><a href="lrdlonfullwarm.php">ON Full (100%) Warm</a></li>
	    <li><a href="lrdlonfullcool.php">ON Full (100%) Cool</a></li>
	    <li><a href="lrdl50.php">Dim to half (ON, Last CT, 50%)</a></li>
	    <li><a href="lrdlmin.php">Dim to Min (1)</a></li>
	    <li><a href="lrdloff.php">OFF</a></li>
	</ul>

    <ul id="brdl" title="Lights">
	    <li class="group">Bedroom downlights</li>
	    <li><a href="brdlonlast.php">ON - Last used setting</a></li>
	    <li><a href="brdlonfullwarm.php">ON Full (100%) Warm</a></li>
	    <li><a href="brdlonfullcool.php">ON Full (100%) Cool</a></li>
	    <li><a href="brdl50.php">Dim to half (ON, Last CT, 50%)</a></li>
	    <li><a href="brdlmin.php">Dim to Min (1)</a></li>
	    <li><a href="brdloff.php">OFF</a></li>
	</ul>

	<ul id="alldl" title="Lights">
	    <li class="group">ALL downlights</li>
	    <li><a href="alldlonlast.php">ON - Last used setting</a></li>
	    <li><a href="alldlonfullwarm.php">ON Full (100%) Warm</a></li>
	    <li><a href="alldlonfullcool.php">ON Full (100%) Cool</a></li>
	    <li><a href="alldl50.php">Dim to half (50%)</a></li>
	    <li><a href="alldlmin.php">Dim to Min (1)</a></li>
	    <li><a href="alldloff.php">OFF</a></li>
	</ul>

	<ul id="lightlist" title="Lights">
	<li class="group">Light List (reload to refresh)</li>
    <li><a onclick="javascript:location.reload(true)">Reload</a></li>
        <?php
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
                printf("<a href=\"toggle.php?id={$lightid}\"><li> %d - %s   %s</a></li>\n", $lightid, $lights[$lightid]["name"],$ison);
        }
        if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['index.php#_lightlist']);
        ?>
	</ul>

</body>
</html>
