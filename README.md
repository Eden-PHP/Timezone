# Timezones

Timezones in *Eden* have progressed to be so simple to make conversions from one timezone to another. We simplified this process over time to one line of code. `Figure 1` shows how it's simply done.

**Figure 1. Convert Time**

	echo eden('timezone', 'GMT-8', 'September 25, 2013 8:10pm')
		->convertTo('Asia/Manila', 'F d, Y g:ia'); //--> September 26, 2013 12:10pm

The second argument on line 1 of `Figure 1` shows the initial timezone. Infact you can express the timezones using several formats.

	UTC Formats - UTC-8, UTC-8:30
	GMT Formats - GMT-8, GMT+0430
	PHP Formats - America/Los_Angeles, Asia/Manila
	Timezone Abbreviations - EST, PDT, MNL

The third argument in `Figure 1` is optional if you want to specify the time, other wise it will use the current server time. Next we convert the time to *Manila* using `convertTo()`. Optionally, you can specify the date format as described at *PHP.net*. With the timezone object you also can convert timezone formats to GMT, UTC, offset and reformat the time. The figure below describes how to do that.

**Figure 2. Convert Timezone Formats**

	echo eden('timezone', 'GMT-8', time())->getOffset(); //--> -28800 
	echo eden('timezone', 'America/Los_Angeles')->getTime('F d, Y g:ia'); //--> September 25, 2013 8:10pm
	echo eden('timezone', 'America/Los_Angeles', 'September 25, 2013 8:10pm')->getUTC(); //--> UTC-7:00
	echo eden('timezone', 'GMT-8', 'September 25, 2013 8:10pm')->getGMT(); //--> GMT-800 

For international applications with a user base, usually it's important to store their preferred timezone. Generating a list of timezones available is easy with *Eden* and the following Figures show how to easily generate a timezone list in key value format.

**Figure 3. A List of Offsets**

	$offsets = eden('timezone', 'GMT-8', 'September 25, 2013 8:10pm')
		->getOffsetDates('F d, Y g:ia', 60);
	 
	/* Array
	(
		[-43200] => September 25, 2013 4:10pm
		[-39600] => September 25, 2013 5:10pm
		[-36000] => September 25, 2013 6:10pm
		[-32400] => September 25, 2013 7:10pm
		[-28800] => September 25, 2013 8:10pm
		[-25200] => September 25, 2013 9:10pm
		[-21600] => September 25, 2013 10:10pm
		[-18000] => September 25, 2013 11:10pm
		[-14400] => September 26, 2013 12:10am
		[-10800] => September 26, 2013 1:10am
		[-7200] => September 26, 2013 2:10am
		[-3600] => September 26, 2013 3:10am
		[0] => September 26, 2013 4:10am
		[3600] => September 26, 2013 5:10am
		[7200] => September 26, 2013 6:10am
		[10800] => September 26, 2013 7:10am
		[14400] => September 26, 2013 8:10am
		[18000] => September 26, 2013 9:10am
		[21600] => September 26, 2013 10:10am
		[25200] => September 26, 2013 11:10am
		[28800] => September 26, 2013 12:10pm
		[32400] => September 26, 2013 1:10pm
		[36000] => September 26, 2013 2:10pm
		[39600] => September 26, 2013 3:10pm
		[43200] => September 26, 2013 4:10pm
	)
	 */

In the example above, `getOffsetDates()` will set each value according to the date format specified and will render a list of dates in 60 minute intervals. Although intervals are optional, You can change the intervals to any number representing minutes.

**Figure 4. A List of UTC in 2 hour intervals**

	$offsets = eden('timezone', 'GMT-8', 'September 25, 2013 8:10pm')
		->getUTCDates('F d, Y g:ia', 120);
	 
	/* Array
	(
		[UTC-12:00] => September 25, 2013 4:10pm
		[UTC-10:00] => September 25, 2013 6:10pm
		[UTC-8:00] => September 25, 2013 8:10pm
		[UTC-6:00] => September 25, 2013 10:10pm
		[UTC-4:00] => September 26, 2013 12:10am
		[UTC-2:00] => September 26, 2013 2:10am
		[UTC+0:00] => September 26, 2013 4:10am
		[UTC+2:00] => September 26, 2013 6:10am
		[UTC+4:00] => September 26, 2013 8:10am
		[UTC+6:00] => September 26, 2013 10:10am
		[UTC+8:00] => September 26, 2013 12:10pm
		[UTC+10:00] => September 26, 2013 2:10pm
		[UTC+12:00] => September 26, 2013 4:10pm
	)
	 */

**Figure 5. A List of GMT in 30 minute intervals**

	$offsets = eden('timezone', 'GMT-8', 'September 25, 2013 8:10pm')
	->getGMTDates('F d, Y g:ia', 30);
 
	/* Array
	(
		[GMT-1200] => September 25, 2013 4:10pm
		[GMT-1130] => September 25, 2013 4:40pm
		[GMT-1100] => September 25, 2013 5:10pm
		[GMT-1030] => September 25, 2013 5:40pm
		[GMT-1000] => September 25, 2013 6:10pm
		[GMT-930] => September 25, 2013 6:40pm
		[GMT-900] => September 25, 2013 7:10pm
		[GMT-830] => September 25, 2013 7:40pm
		[GMT-800] => September 25, 2013 8:10pm
		[GMT-730] => September 25, 2013 8:40pm
		[GMT-700] => September 25, 2013 9:10pm
		[GMT-630] => September 25, 2013 9:40pm
		[GMT-600] => September 25, 2013 10:10pm
		[GMT-530] => September 25, 2013 10:40pm
		[GMT-500] => September 25, 2013 11:10pm
		[GMT-430] => September 25, 2013 11:40pm
		[GMT-400] => September 26, 2013 12:10am
		[GMT-330] => September 26, 2013 12:40am
		[GMT-300] => September 26, 2013 1:10am
		[GMT-230] => September 26, 2013 1:40am
		[GMT-200] => September 26, 2013 2:10am
		[GMT-130] => September 26, 2013 2:40am
		[GMT-100] => September 26, 2013 3:10am
		[GMT-030] => September 26, 2013 3:40am
		[GMT+000] => September 26, 2013 4:10am
		[GMT+030] => September 26, 2013 4:40am
		[GMT+100] => September 26, 2013 5:10am
		[GMT+130] => September 26, 2013 5:40am
		[GMT+200] => September 26, 2013 6:10am
		[GMT+230] => September 26, 2013 6:40am
		[GMT+300] => September 26, 2013 7:10am
		[GMT+330] => September 26, 2013 7:40am
		[GMT+400] => September 26, 2013 8:10am
		[GMT+430] => September 26, 2013 8:40am
		[GMT+500] => September 26, 2013 9:10am
		[GMT+530] => September 26, 2013 9:40am
		[GMT+600] => September 26, 2013 10:10am
		[GMT+630] => September 26, 2013 10:40am
		[GMT+700] => September 26, 2013 11:10am
		[GMT+730] => September 26, 2013 11:40am
		[GMT+800] => September 26, 2013 12:10pm
		[GMT+830] => September 26, 2013 12:40pm
		[GMT+900] => September 26, 2013 1:10pm
		[GMT+930] => September 26, 2013 1:40pm
		[GMT+1000] => September 26, 2013 2:10pm
		[GMT+1030] => September 26, 2013 2:40pm
		[GMT+1100] => September 26, 2013 3:10pm
		[GMT+1130] => September 26, 2013 3:40pm
		[GMT+1200] => September 26, 2013 4:10pm
	)
	 */

Handing timezones for projects can be a real pain. Eden makes this process easier so you can move on other important matters.

====

#Contributing to Eden

##Setting up your machine with the Eden repository and your fork

1. Fork the main Eden repository (https://github.com/Eden-PHP/Timezone)
2. Fire up your local terminal and clone the *MAIN EDEN REPOSITORY* (git clone git://github.com/Eden-PHP/Timezone.git)
3. Add your *FORKED EDEN REPOSITORY* as a remote (git remote add fork git@github.com:*github_username*/Timezone.git)

##Making pull requests

1. Before anything, make sure to update the *MAIN EDEN REPOSITORY*. (git checkout master; git pull origin master)
2. If PHP Unit testing is included in this package please make sure to update it and run the test to ensure everything still works (phpunit)
3. Once updated with the latest code, create a new branch with a branch name describing what your changes are (git checkout -b bugfix/fix-twitter-auth)
    Possible types:
    - bugfix
    - feature
    - improvement
4. Make your code changes. Always make sure to sign-off (-s) on all commits made (git commit -s -m "Commit message")
5. Once you've committed all the code to this branch, push the branch to your *FORKED EDEN REPOSITORY* (git push fork bugfix/fix-twitter-auth)
6. Go back to your *FORKED EDEN REPOSITORY* on GitHub and submit a pull request.
7. An Eden developer will review your code and merge it in when it has been classified as suitable.