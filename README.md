![logo](http://eden.openovate.com/assets/images/cloud-social.png) Eden Timezone
====
[![Build Status](https://api.travis-ci.org/Eden-PHP/Timezone.svg)](https://travis-ci.org/Eden-PHP/Timezone)
====

 - [Install](#install)
 - [Introduction](#intro)
 - [API](#api)
    - [convertTo](#convertTo)
    - [getGMT](#getGMT)
    - [getGMTDates](#getGMTDates)
    - [getOffset](#getOffset)
    - [getOffsetDates](#getOffsetDates)
    - [getTime](#getTime)
    - [getUTC](#getUTC)
    - [getUTCDates](#getUTCDates)
    - [toRelative](#toRelative)
    - [setTime](#setTime)
    - [validation](#validation)
 - [Contributing](#contributing)

====

<a name="install"></a>
## Install

`composer install eden/timezone`

====

<a name="intro"></a>
## Introduction

Instantiate timezone in this manner.

```
$timezone = eden('timezone', time(), 'GMT');
```

====

<a name="api"></a>
## API

==== 

<a name="convertTo"></a>

### convertTo

Convert current time set here to another time zone 

#### Usage

```
eden('timezone', time(), 'GMT')->convertTo(*string $zone, string|null $format);
```

#### Parameters

 - `*string $zone` - valid UTC, GMT, PHP Location or TZ Abbreviation
 - `string|null $format` - format

Returns `string|int`

#### Example

```
eden('timezone', time(), 'GMT')->convertTo('Asia/Manila');
```

==== 

<a name="getGMT"></a>

### getGMT

Returns the GMT Format 

#### Usage

```
eden('timezone', time(), 'GMT')->getGMT(string $prefix);
```

#### Parameters

 - `string $prefix` - Prefix to add before the returned value

Returns `string`

#### Example

```
eden('timezone', time(), 'GMT')->getGMT();
```

==== 

<a name="getGMTDates"></a>

### getGMTDates

Returns a list of GMT formats and dates in a 24 hour period 

#### Usage

```
eden('timezone', time(), 'GMT')->getGMTDates(*string $format, int $interval, string|null $prefix);
```

#### Parameters

 - `*string $format` - The format of each date to display
 - `int $interval` - The frequency of rows
 - `string|null $prefix` - The prefix to add before each date display

Returns `array`

#### Example

```
eden('timezone', time(), 'GMT')->getGMTDates('F d, Y');
```

==== 

<a name="getOffset"></a>

### getOffset

Returns the current offset of this timezone 

#### Usage

```
eden('timezone', time(), 'GMT')->getOffset();
```

#### Parameters

Returns `int`

==== 

<a name="getOffsetDates"></a>

### getOffsetDates

Returns a list of offsets and dates in a 24 hour period 

#### Usage

```
eden('timezone', time(), 'GMT')->getOffsetDates(*string $format, int $interval);
```

#### Parameters

 - `*string $format` - The format of each date to display
 - `int $interval` - The frequency of rows

Returns `array`

#### Example

```
eden('timezone', time(), 'GMT')->getOffsetDates('F d, Y');
```

==== 

<a name="getTime"></a>

### getTime

Returns the time or date 

#### Usage

```
eden('timezone', time(), 'GMT')->getTime(string|null $format);
```

#### Parameters

 - `string|null $format` - Time format

Returns `string|int`

#### Example

```
eden('timezone', time(), 'GMT')->getTime();
```

==== 

<a name="getUTC"></a>

### getUTC

Returns the UTC Format 

#### Usage

```
eden('timezone', time(), 'GMT')->getUTC(string|null $prefix);
```

#### Parameters

 - `string|null $prefix` - The prefix to add before the returned value

Returns `string`

#### Example

```
eden('timezone', time(), 'GMT')->getUTC();
```

==== 

<a name="getUTCDates"></a>

### getUTCDates

Returns a list of UTC formats and dates in a 24 hour period 

#### Usage

```
eden('timezone', time(), 'GMT')->getUTCDates(*string $format, int $interval, string|null $prefix);
```

#### Parameters

 - `*string $format` - The format of each date to display
 - `int $interval` - The frequency of rows
 - `string|null $prefix` - The prefix to add before each date display

Returns `array`

#### Example

```
eden('timezone', time(), 'GMT')->getUTCDates('F d, Y');
```

==== 

<a name="toRelative"></a>

### toRelative

Returns the relative distance $time > this->time = ago 

#### Usage

```
eden('timezone', time(), 'GMT')->toRelative(int|string $time, int $level, string $default);
```

#### Parameters

 - `int|string $time` - The time to make relative
 - `int $level` - The granular level
 - `string $default` - The default date format

Returns `Eden\Timezone\Index`

#### Example

```
eden('timezone', time(), 'GMT')->toRelative();
```

==== 

<a name="setTime"></a>

### setTime

Sets a new time 

#### Usage

```
eden('timezone', time(), 'GMT')->setTime(*int|string $time);
```

#### Parameters

 - `*int|string $time` - The time value

Returns `Eden\Timezone\Index`

#### Example

```
eden('timezone', time(), 'GMT')->setTime(time() + 123);
```

==== 

<a name="validation"></a>

### validation

Returns timezone's validation methods 

#### Usage

```
eden('timezone', time(), 'GMT')->validation();
```

#### Parameters

Returns `Eden\Timezone\Index`

==== 

<a name="contributing"></a>
#Contributing to Eden

Contributions to *Eden* are following the Github work flow. Please read up before contributing.

##Setting up your machine with the Eden repository and your fork

1. Fork the repository
2. Fire up your local terminal create a new branch from the `v4` branch of your 
fork with a branch name describing what your changes are. 
 Possible branch name types:
    - bugfix
    - feature
    - improvement
3. Make your changes. Always make sure to sign-off (-s) on all commits made (git commit -s -m "Commit message")

##Making pull requests

1. Please ensure to run `phpunit` before making a pull request.
2. Push your code to your remote forked version.
3. Go back to your forked version on GitHub and submit a pull request.
4. An Eden developer will review your code and merge it in when it has been classified as suitable.