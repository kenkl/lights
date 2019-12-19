# Lights

Lights is a PHP frontend to the Philips Hue Bridge. It provides an alternate method of grouping and controlling lights in the Hue ecosystem. As discussed in [ABOUT.md](https://github.com/kenkl/lights/blob/master/ABOUT.md), it was originally built around the X10 system. In time, I'd developed macros, groupings, and automation with simple cronjobs on Linux. Although the official Hue app does offer much of this utility, I continue to use/develop this application as it allows me a familiar, granular level of control.

Plus, I can integrate my own IoT things, based on Raspberry Pi, Arduino, ESP8266/ESP32 more easily, by using Lights as an abstraction layer for communicating with the Hue Bridge. 

Lights is a pretty basic PHP application. I'm currently hosting it on PHP7 via NGINX on CentOS8, but it was recently running on a RaspberryPi, running PHP 5.3.3 behind Apache2. As such, I expect any modern webserver with PHP5+ should be able to host this.

It does rely heavily on the [iUI](http://www.iui-js.org/) ([iUI's GitHub](https://github.com/iui/iUI) ) framework for browser use. iOS, Android, and most desktop browsers appear to work correctly. Essentially, as long as it's got a reasonable WebKit implementation, it'll work. I have seen some odd behaviour in the most current Edge browser, but you probably don't want to be using that anyway. Ha.

As mentioned, development of this application continues, and picks up new functionality offered by the Hue platform as my skillset evolves to exploit it. There is a changelog in [CHANGELOG.md](https://github.com/kenkl/lights/blob/master/CHANGELOG.md), roughly tracking (as I remember to update it) the changes I make as I proceed.
