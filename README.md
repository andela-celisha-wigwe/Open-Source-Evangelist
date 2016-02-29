[![Coverage Status](https://coveralls.io/repos/github/andela-celisha-wigwe/Open-Source-Evangelist/badge.svg?branch=develop)](https://coveralls.io/github/andela-celisha-wigwe/Open-Source-Evangelist?branch=develop)
[![Build Status](https://travis-ci.org/andela-celisha-wigwe/Open-Source-Evangelist.svg?branch=master)](https://travis-ci.org/andela-celisha-wigwe/Open-Source-Evangelist)
![StyleCI](https://styleci.io/repos/52610358/shield)](https://styleci.io/repos/52610358)

# Open-Source-Evangelist

##*Check Point 1B*

##Open Source Evangelist Agnostic PHP Package
This is the Open-Source-Evangelist repository.

It is a package that shows the Github rank for the any user.

##Installation

To run this package, you must have [PHP 5.5+](http://http://php.net/) and [Composer](https://getcomposer.org/) installed.

First download the package.

`$ composer require Elchroy/OSE`

Install Composer.

`$ composer install`

##Usage

###1 Through the EvangelistStatus class.

-Use (Import) the package.
```
use Elchroy\OSE\EvangelistStatus;
```
-Make a new status instance. (You need a [GitHub.com](https://github.com) username.)
```
$evangelistStatus = new EvangelistStatus('andela-celisha-wigwe');
```
-Request for the user's status.
```
echo $evangelistStatus->getStatus();
// Damn It!!! Please make the world better, Oh Ye Prodigal Junior Evangelist
```

###2 Through the Evangelist class.
-Import the package.
```
use Elchroy\OSE\Evangelist;
```
-Make a new evangelist. (You need a [GitHub.com](https://github.com) username.)
```
$evangelist = new Evangelist('andela-celisha-wigwe');
```
-Request for user's status.
```
echo $evangelist->status();
==> Damn It!!! Please make the world better, Oh Ye Prodigal Junior Evangelist
```
**Note that you can also get the status like this:**
```
echo $evangelist->status; // Without using the parentheses.
==> Damn It!!! Please make the world better, Oh Ye Prodigal Junior Evangelist
```

###3 Through PsySh *(Optional)*
You can run this package if you have appropriately installed (globally) [PsySh](https://http://psysh.org/) on your machine.

**Ensure to cd into the root of the application directory.**
-Load The package and its dependencies.
```
>>> require 'vendor/autoload.php';
```

-Make a new instance of the class.
```
>>> $evangelist = new Elchroy\OSE\Evangelist('andela-celisha-wigwe'); // Using the Evangelist class.
**OR**
>>> $evangelistStatus = new Elchroy\OSE\EvangelistStatus('andela-celisha-wigwe'); // Using the EvangelistStatus class.
```

-Display the user's status.
```
>>> echo $evangelist->status(); // Using the Evangelist class.
OR
>>> echo $evangelistStatus->getStatus();
```

##Test

To test this package, you can use [PHPUnit](https://phpunit.de/), from command line (WindowsOS) or terminal(MacOS).

`$ phpunit`

**Note: Ensure that you are with the directory of the application.**