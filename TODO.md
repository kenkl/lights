# TODO
### a list, in no particular order, of things to be done next...

- change uniform group changes to use either for loops or arrays to iterate through the lights involved.
- strip html headers from all but index.php - they're not really needed by the WebKit clients, and definitely not by the buttonthings or cronjobs.
- refine the layout of the screens in index.php - maybe put frequently-used calls on the front/top page?
- clean up unused/unreferenced scripts (medon, medoff, toggle, etc.).
- normalise the use of $ctWarm and $ctCool (from functions.php) across all calls to shift colour temperature, making future refinement a bit more straightforward.
- add generalized api calls to add fine-grained, granular control of individual lights on-the-fly. e.g.: `.../setLevel.php?id=34&bri=127`
- collect all the save*State functions into a single function ('saveState()'?) - be sensitive to light style (HS, CT, Bri only, on/off only) with try,catch to assemble a valid JSON string for restoration. As long as the string is valid, restoreState() works regardless of light style.
- for all the places we call ourselves to Do Things, there's doThing() in functions. Refactor all the places we're doing this "by hand" to use doThing() instead.
