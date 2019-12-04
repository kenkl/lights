# Lights

For many years (since the mid '90s), I'd used [X10](https://www.x10.com/x10-home-automation.html) home-automation gear to automate/control the lighting in my home. Sometime in the autumn of 2009, I got an iPhone 3GS, which inspired me to create a webapp interface to the X10 gear. Before long, I found [iUI](http://www.iui-js.org/) ([iUI's GitHub](https://github.com/iui/iUI) ), a framework to make a webapp that I could use as a frontend to the various scripts I had already assembled to run the lights. All that I needed was a PHP webserver of some description, place the files from iUI and wire up calls to my shell scripts.

In the decade since, the Lights app has slowly evolved as I moved house a couple times, added new lights, refined capabilities and placements, etc.; it's been a staple of my personal IT infrastructure for all this time. I don't remember what flavour of Linux I'd originally hosted/developed this on, but in the spring of 2012, I got my first [Raspberry Pi](https://en.wikipedia.org/wiki/Raspberry_Pi) and was immediately struck - I could host Lights on a dedicated machine! So that's what I did. Lights lived there until earlier this year, serving without any major issues for all this time.

In September of this year (2019), I had gone 'round to a coworker's house, and he gave me a brief demo of the [Philips Hue](https://www2.meethue.com/en-us) lights he'd deployed around his place, and I was struck (again) - the Hue lights could *change colours* and their brighten/dim behaviour was so much faster than the old X10 gear! I initially had a bit of sticker-shock over the Hue bulb pricing - $40 for a single light bulb seemed excessive, but then I did some maths. With an expected lifespan of [roughly ten years](https://www.bestsmarthomegadget.com/how-long-do-philips-hue-bulbs-last/), they're actually not obscenely expensive. Plus, they can change colours!

I'd fully expected to retire the Lights app - the [Hue app](https://www2.meethue.com/en-us/app/bridge) is a reasonably capable bit of software, and actually necessary for adding Hue lights to the environment. I bought my first starter-kit, and began exploring what it could do, but found myself missing the relative simplicity of *my* app. Then, I discovered that the API for the Hue Bridge is [well documented](https://developers.meethue.com/develop/get-started-2/)(a free developer account is necessary to dig deeper than the "Get Started" section) and could be easily called from my crusty old web-app (remember - the first iteration of Lights was in the autumn of 2009, so roughly its ten year anniversary). I'd intended to slowly decommission the X10 gear/lights, but to be able to use a single app (mine) to control both the Hue and X10 lights.

The transition was a lot quicker than I expected; the last of my X10 gear was retired and taken out of service about a month after the visit to my coworker's place. Since then, I've added more lights, and continued to work through my code in Lights to get rid of the X10-specific calls. I think they're mostly-gone, but I'm sure there's a few scraps scattered about somewhere in the few dozen .php files that make up this thing.

I'm very conscious that the code is kinda messy in places, and inconsistent. I've kinda just begun to wrap up calls in functions to make maintenance a bit easier, and to make things a bit more readable. As with many live projects, it's a work in progress, and parts of it represent earlier, less sophisticated phases of its existence. 

There are references to the server (max.kenkl.org) that hosts this, the Hue Bridge (huehub.kenkl.org), and the API key it's using to do so, scattered throughout the files in this repo. *None* of this is accessable outside my private network. I did buy the domain, "just in case", but didn't add any of this to it; name resolution will fail outside my network.

In addition to the .php files here, I've taken a snapshot of the crontab on Max, where I've got the lighting scenes scheduled. Again, the Hue app can do this stuff, but I've been using a cronjob for a decade to do these, and I'm not really seeing a good reason to change that right now.

If you want to spin this up somewhere in your own lab or whatever, the requirements are pretty light. First, we need a webserver that supports PHP (Max is a CentOS8 VM, running NGINX (1.14.1) and PHP-FPM (7.2.11). It's got 2 cores, 2GB RAM, and 16GB disk space - installed with the minimal .iso). All of this PHP code simply lives in a /lights directory in the webserver's document directory (NGINX calls it 'root' in the config, Apache uses DocumentRoot in its config). Also in the /lights directory is the iUI framework (which can be downloaded [here](http://www.iui-js.org/download) ). Its directory needs to be called 'iui' - rename or symlink to let the .php scripts find it.

One of the challenges I had, migrating from Raspberry Pi to CentOS8, was SELinux. It will, in its initial configuration, prevent the webserver calling out to the Hue Bridge (among other things). I worked through the pain with setroubleshoot, audit2allow, etc. to get it to "play nice" with my bits. It would have been easier to simply disable it (set it to permissive), but where's the fun in that? Ha.

Here's what it looks like, running on my iPhone (XS Max) today:
![Lights app](https://i.imgur.com/eV7qhY3.png "Lights app action-shot")


(to be continued - 20191204@1652UTC)

