# Request Logger
A hyper simple PHP request logger, which logs POST and GET requests into a text file. I had a need to log parameters
about requests, when testing potential cross site scripting flaws in some of my applications, this simple web
application accommodated for this with ease.

## Installation
Installation is simple, the easiest way it to clone this repository onto your server and then run:

```bash
composer install
```

This installs slim and sets up auto-loading

## Requirements
This middleware works with slim 3.0 Release Candidate, it was tested on PHP 5.6, and should work with later versions of PHP


