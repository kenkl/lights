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

- Had another clever idea - if the targeted lights are non-sequential, I could just jam them into an array and iterate over *that*. So, I refactored allalloff.php to prove that would be as easy as I imagined. It was.

