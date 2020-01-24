# TODO
### a list, in no particular order, of things to be done next...

- change uniform group changes to use either for loops or arrays to iterate through the lights involved.
- strip html headers from all but index.php - they're not really needed by the WebKit clients, and definitely not by the buttonthings or cronjobs.
- refine the layout of the screens in index.php - maybe put frequently-used calls on the front/top page?
- clean up unused/unreferenced scripts (medon, medoff, toggle, etc.).
- normalise the use of $ctWarm and $ctCool (from functions.php) across all calls to shift colour temperature, making future refinement a bit more straightforward.