# Lights

Lights is a PHP frontend to the Philips Hue Bridge. It provides an alternate method of grouping and controlling lights in the Hue ecosystem. As discussed in [ABOUT.md](https://github.com/kenkl/lights/blob/master/ABOUT.md), it was originally built around the X10 system. In time, I'd developed macros, groupings, and automation with simple cronjobs on Linux. Although the official Hue app does offer much of this utility, I continue to use/develop this application as it allows me a familiar, granular level of control.

Plus, I can integrate my own IoT things, based on Raspberry Pi, Arduino, ESP8266/ESP32 more easily, by using Lights as an abstraction layer for communicating with the Hue Bridge. 

Lights is a pretty basic PHP application. I'm currently hosting it on PHP7 via NGINX on CentOS8, but it was recently running on a RaspberryPi, running PHP 5.3.3 behind Apache2. As such, I expect any modern webserver with PHP5+ should be able to host this.

It does rely heavily on the [iUI](http://www.iui-js.org/) ([iUI's GitHub](https://github.com/iui/iUI) ) framework for browser use. iOS, Android, and most desktop browsers appear to work correctly. Essentially, as long as it's got a reasonable WebKit implementation, it'll work. I have seen some odd behaviour in the most current Edge browser, but you probably don't want to be using that anyway. Ha.

As mentioned, development of this application continues, and picks up new functionality offered by the Hue platform as my skillset evolves to exploit it. I'm planning to treat this README as a kind of changelog, until it gets a little too lengthy for my tastes.

If you've any questions, feel free to file an issue, and I'll do my best to answer them. 

-------------------------------------------------------------------------------

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

(I can already see that I should probably move this to the Wiki.)
