#!/bin/sh
if [ "$1" == "" ]; then
	echo "phpunit --log-junit log.xml --verbose TestSuite"
	/usr/bin/phpunit --log-junit log.xml TestSuite
else
	file="$1"
	class="`basename "$file" .php`"
	echo "phpunit --verbose $class $file"
	/usr/bin/phpunit $class "$file"
fi
