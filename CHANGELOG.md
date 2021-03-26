# Lights changelog

04-Dec-2019:

- Initial commit to GitHub. Most of the X10 logic has been removed in favour of communicating with the Hue Bridge. Most of the X10 functionality is retained, with the notable exception of direct dimming controls. It is on my to-do list, once I figure out how to get iUI to cooperate in a pleasing fashion.
- Functions unique to Hue that predates my initial Git commit includes:
  - Lights list (with simple toggles)
  - Condition-dependent scene transitions using isOn() - if a light's not on, there's little point to turning it back on just to dim it.
  - Simple toggles - if a light is on, turn it off. If off, turn it on. That's all.
  - Stateful toggles - capture the current state of the light, saving it, and then set the new desired state. When toggling back, restore the saved state.
  - Clear saved states for stateful toggles in strategic scripts (clearstates.php). Todo: add that to functions.php

05-Dec-2019:

- Initial commit of [buttonthing](https://github.com/kenkl/buttonthing), an ESP8266-based client to Lights. Although not directly contributing to Lights, it inspired some developments in Lights: simple toggles, stateful toggles.

08-Dec-2019:

- While developing a Python-based (on RaspberryPi) Buttonthing, I discovered that the redirects iUI mandates for WebKit clients kinda hoses up urllib.request. Prototyping a conditional send of the redirect (302) in hotog.php - "Only send the header to WebKit-reporting HTTP_USER_AGENT" - this may require updating *every* module here with that logic.

09-Dec-2019:

- Add alldltog.php - to bring up all downlights to full bright cool, using the stateful toggle method.
- Add clearstates() function to functions.php. Update callers (allallon, allalloff, and clearstates.php) to use the function.
- Begin the long slog to add the conditional for WebKit clients (HTTP_USER_AGENT) to the iUI-mandated redirect in each script.
- Normalize brfull, brhalf, cinema, loft_teevee - let's call functions instead of calling directly with hard-coded values.
- Add a conditional for cinema and loft_teevee to prevent turning on lights that aren't already on.
- Assorted bugfixes on things I've encountered along the way...

14-Dec-2019:

- Bugfixes in lrdl50 and normal.
- Update lables for 50% downlights functions.

18-Dec-2019:

- So, it occurred to me - the downlights are, quite naturally, sequential IDs in the inventory. So, I've begun refactoring those into For loops to iterate through them.
- Because we're simplifying the groups of downlights, we can get more sophisticated with what we're doing to them - avoiding the brief (~50ms) flash of the previous state. More testing/development is probably required.
- ITMFA!

19-Dec-2019:

- Had another clever idea - if the targeted lights are non-sequential, I could just jam them into an array and iterate over *that*. So, I refactored allalloff.php to prove that would be as easy as I imagined. It was. Reviewing some of the .php scripts, it seems I'll have a lot of that to do.

21-Dec-2019:

- Added weekend scheduling to pirthing1_vars, encapsulating the decision whether to activate/deactivate the nightlight into a single function. This could probably move to functions.php to make the functionality more widely availabe (and reduce the number of include/require calls at the top of each script).
- Add xmastreeon and xmastreeoff, which call a Flask listener on my RPi that's serving as my [XMas tree](https://thepihut.com/products/3d-xmas-tree-for-raspberry-pi). It runs a handful of Python scripts to turn on/off, etc., and these .php scripts simply call endpoints provided over in that project (which I'll post here in the next day or two). Added a couple test calls under buttons for manual control/testing.

22-Dec-2019:

- As mentioned, my project, [xmastreething](https://github.com/kenkl/xmastreething), is now published. I've folded its automation into the hueaccent* scripts.
- Also, teevee and cinema modes will turn off xmastreething. It's a little bright/distracting when I'm consuming my popular entertainment. 

23-Dec-2019:

- Let's codify the Warm and Cool colour temperatures with $ctWarm and $ctCool, keeping them in one place, making it simpler to shift them.
- Add a 3-state toggle to medtog: 1-On Warm, 2-On Cool, 3-Previous state.
- Add a fulldl flag to normal.php to bring the downlights to full brightness if desired. Add an option in index.php to call it.
- Add 3-state toggle to alldltog.

24-Dec-2019:

- Minor tweak: turn off the TV backlights with teevee and cinema modes. It's possible for streaming to end without completely extinguishing them. Also, if I'm staying up past SP2, I don't necessarily want them on. Turning them off has no effect if there's an active streaming session happening; the off command will be ignored there.

29-Dec-2019:

- Minor tweaks to allalloff and clearstates.php - include clearstates in the buttons endpoints page of the app.
- Indulging the idea of setting brightness levels on the fly with parameters when calling the PHP. Initial test/rollout with hoon.php. Although it's not a particularly innovative use of PHP, this was never A Thing with X10 really, so brightness level setting as a parameter has largely been ignored. Hue makes this practical and attractive.

01-Jan-2020:

- Happy new year!!
- Add but6.php to cycle through the "normal" living room scene modes.
- Added new functions getBri() and doThing() to functions.php to support but6.php

04-Jan-2020:

- Update readtog to use the 3-state toggle, similar to medtog's behaviour
- add full-brightness downlight toggle to normal.php for multiple button-presses
- tweak tv backlight brightness for SP2 mode. 
- add override (force) check to lr_sp2, add an option to the app in index.php

12-Jan-2020:

- Experimenting with using pirthing1 to control the random nightlight thing in the bathroom. Does it need a different schedule than the downlight that the main script targets?

23-Jan-2020:

I've made several changes/additions in the past couple weeks, refining code, refining behaviours, fixing bugs, and adding a couple of the Hue filament bulbs to the system.

- Add a "preheat" for the nightlight downlight driven by pirthing1.php in brsp2.php. The problem is that the downlight would briefly (~300 ms) flash whatever colour temperature it had been before the first time pirthing1 would fire when activetime() became true. For the rest of activetime(), it's fine. Minor, but annoying behaviour. Briefly flashing it at the target colour temperature during brsp2.php fixed that.
- Tone down the level in brwake.php. It was running a little hot (bright). This is an ongoing experiment...
- Add the new filament bulbs (id 34 & 35) to a number of scenes, including normal, loft_teevee, cinema, hueaccenton/off, allalloff, alloff. They'll probably move around soon; still evaluating where I want them to be in the rooms.
- Refining brdl*.php scripts - we're sweeping through a sequential set of lights in them, let's use a for loop for efficiency. 
- Also in brdl*.php (and hueaccent*.php) - strip the html headers/footers - these are pretty much pure scripts; WebKit doesn't care, and buttonthings definitely don't. These calls into Lights are basically API calls, let's fine-tune the payload accordingly. This is a model for more sweeping future edits to all the other scripts.
- Add an override/manual call for hueaccent*.php in index.php.
- Add [TODO.md](https://github.com/kenkl/lights/blob/master/TODO.md) to chart future changes/cleanup to do here.

24-Jan-2020:

- Got a new bedside-table lamp (36). The change from the old lamp has a kind of domino effect with brfull, brhalf, brmin, brsp2, brwake, and revealed some cleanup/refactoring to do with them, cinema, loft_teevee, allalloff, and alloff.

25-Jan-2020:

- Minor tweaks to brightness levels for 4 and 34 in hueaccenton 
- Moved the old bedside-table lamp (3, 19) to be a monitor backlight in my home office (with visions of using Hue Sync with it on my gaming rig). For normal scene control, update hoon, hooff, horlx, hogame, hosp2, and rewrite hotog to be *way* more efficient/simple.
- Add howltog for the new work light (37). It isn't in any other scenes, so a simple toggle (also added to index for the app) will suffice for now.

26-Jan-2020:

- Bugfix in brsp2 - change check for active light. 3 is no longer here; change to 36 (new bedside-table).
- Add kcstog - a coffeeshop scene around the new bistro table I just got. That required adding saveBriState() in functions - saveOnState doesn't capture brightness level. (I should really create a unified saveState() function...)
- Add but7 to abstract kcstog for buttonthings.
- Add allallalloff (three 'all's) for a non-conditional off of ALL units and clearing all statefiles. For reasons.

27-Jan-2020:

- Tweaking on the levels in hoon and horlx scripts. The new monitor backlight lamp is throwing off the balance in here a little.

03-Feb-2020:

- Add the HO work light to hooff.php. Oops.

08-Feb-2020:

- Create rpctog.php - Record Player Corner toggle - for brightening up the corner where my record-player lives to make manipulating discs easier/safer.
- Add but8.php to hook rpctog and add it to the button endpoints page in index.

09-Feb-2020:

- Added a hook for Adafruit_IO (AIO) to pirthing1 to signal whether the nightlight triggered by pirthing1 is on (or off) at any given moment. The actual logic is in ../sandbox/aiothings.php and has my AIO creds in it right now, so I can't really include it here as written. I need to refactor it to make it GitHub safe (probably fold setToggle() into functions.php), but it's coming.

17-Feb-2020:

- Fold setToggle() and other AIO-related variables into functions.php. aiothings.php (mentioned on the 9th) is no longer A Thing.
- Add secrets.php to abstract/protect my AIO creds for setToggle().
- Update pirthing1_on/off to use the new function calling style (including the feed key).
- Add pirthing2 scripts to respond to another PIR sensor in the house. For now, it's only changing a couple lights, the plan is to hook an AIO feed for it.

24-Feb-2020:

- Having seen it be stable/accurate for a few days, pirthing2 gets a different colour-temperature (via hue/saturation) for the "pilot lights", *and* calls out to AIO to update the "catpee" feed. The idea is to have a way to get a sense of how frequently Sophie (my cat) uses her litterbox. With a WebHook or IFTTT, I could even have it send me a text or something. It delights me that I can use hundreds of thousands of dollars worth of IT infrastructure to watch my cat pee.
- Minor fixes for allallon and hoon

12-May-2020:

- 60 days into the self-quarantine of COVID-19, I'm making changes to my home-office (work) space. That has (so far) involved added a new floor-lamp (ID 38), and I've added it to several scripts here - ho*.php and allalloff.php. Other cleanup (use toggle() from functions now that I remember it's there.) to existing scripts.

16-May-2020:

- Continued refinement of HO scripts; adding "Minimal" levels to index.php for these. Get the work light to track when it's supposed to be off at dimmer levels. 

07-Jun-2020:

- Fix pirthing2_on.php - it should track the brightness level of the light (if it's on, of course). It was setting bri to 254 blindly, which was... distracting if we're in a dimmed state.

31-Oct-2020:

- Happy Halloween!! Add the Hue play gradient lightstrip (unit 39) to the mix. There were a handful of PHP scripts that were already managing the TV backlights; adding one more was relatively simple.

09-Dec-2020:

- Almost a year ago (22-Dec-2019), I folded a Flask-enabled RPi Xmas tree thing into the automation/controls here. Not long afterward, I got the updated [3D RGB Xmas tree](https://thepihut.com/products/3d-rgb-xmas-tree-for-raspberry-pi), played with it a little, but because the season had passed, never really did much with it. I've spent a little time spinning it up on a different RPi, using what I learnt/built in [xmastreething](https://github.com/kenkl/xmastreething) with the new one, and added a couple scripts, rgbtreeon.php and rgbtreeoff.php to Lights to manage it. It's not folded into any scenes/groups yet - there are just on/off controls in the frontend (index) to control it.

21-Dec-2020:

- Added a grouping script to bring all lights up normally, with full downlights. I've found this helpful in breaking through the 'fog' after I've hit snooze (and turned down/off some of these) a few too many times. [Good morning, houseplants. Yes, it's wake-up time.](https://genius.com/Kid-koala-music-for-morning-people-lyrics)

20-Mar-2021:

- Rework goodmorning.php to have fewer transitions (via normal.php and brhalf.php) during activation. Let's just bring everyone up to where we want them in one go. It's a bit less 'busy' this way.
- Minor refactor of alldlon* scripts to clean up the code a little (use arrays).

26-Mar-2021:

- Got a [Philips Hue Smart Plug](https://www.amazon.com/gp/product/B07XD578LD) for the espresso machine. Add it to allalloff.php "just in case" it's not already off, and add a toggle for it on the front screen of the app.


