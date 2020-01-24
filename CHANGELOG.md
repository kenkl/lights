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
