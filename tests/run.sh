#!/bin/sh
if [ "$1" == "" ]; then
	phpunit --log-xml log.xml TestSuite
else
	file="$1"
	class="`basename "$file" .php`"
	phpunit $class "$file"
fi
