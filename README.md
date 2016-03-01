[![Coverage Status](https://coveralls.io/repos/github/andela-celisha-wigwe/Open-Source-Evangelist/badge.svg?branch=develop)](https://coveralls.io/github/andela-celisha-wigwe/Open-Source-Evangelist?branch=develop)
[![Build Status](https://travis-ci.org/andela-celisha-wigwe/Open-Source-Evangelist.svg?branch=develop)](https://travis-ci.org/andela-celisha-wigwe/Open-Source-Evangelist)
[![StyleCI](https://styleci.io/repos/52610358/shield)](https://styleci.io/repos/52610358)

# Open-Source-Evangelist

##*Check Point 1B* - Open Source Evangelist Agnostic PHP Package
This is the Open-Source-Evangelist repository.

It is a package that shows the Github rank and status for any user.

##Installation

To run this package, you must have [PHP 5.5+](http://http://php.net/) and [Composer](https://getcomposer.org/) installed.

First download the package.

`$ composer require Elchroy/OSE`

Install Composer.

`$ composer install`

##Usage

There are two main ways to use this package.

**Ensure to have a valid GitHub username.**

###1. Through the EvangelistStatus class

* Use (Import) the package.
```
use Elchroy\OSE\EvangelistStatus;
```
* Make a new status instance. (You need a [GitHub.com](https://github.com) username.)
```
$evangelistStatus = new EvangelistStatus('andela-celisha-wigwe');
```
* Request for the user's status.
```
echo $evangelistStatus->getStatus();
// Damn It!!! Please make the world better, Oh Ye Prodigal Junior Evangelist
```

###2. Through the Evangelist class
* Import the package.
```
use Elchroy\OSE\Evangelist;
```
* Make a new evangelist. (You need a [GitHub.com](https://github.com) username.)
```
$evangelist = new Evangelist('andela-celisha-wigwe');
```
* Request for user's status.
```
echo $evangelist->status();
==> Damn It!!! Please make the world better, Oh Ye Prodigal Junior Evangelist
```
**You can also get the status like this:**
```
echo $evangelist->status; // Without using the parentheses.
==> Damn It!!! Please make the world better, Oh Ye Prodigal Junior Evangelist
```
**You can get more user details through this way, as long as such information is available from GitHub.**
```
echo $evangelist->url;
==> "https://api.github.com/users/andela-celisha-wigwe"
echo $evangelist->company;
==> "Andela"
echo $evangelist->type;
==> "User"
echo $evangelist->rank;
==> 1
echo $evangelist->following;
==> 1
echo $evangelist->organizations_url;
==> "https://api.github.com/users/andela-celisha-wigwe/orgs"
```

##Test

To test this package, you can use [PHPUnit](https://phpunit.de/), from command line (WindowsOS) or terminal(MacOS).

**Note: Ensure that you are with the directory of the application.**

`$ phpunit`