#!/bin/sh
if [ "$1" == "" ]; then
	echo "phpunit --log-junit log.xml --verbose TestSuite"
	/usr/bin/phpunit \
		--include-path '/so/packages/hot-date/trunk:/so/packages/swat/trunk' \
		--log-junit log.xml \
		--verbose \
		TestSuite
else
	file="$1"
	class="`basename "$file" .php`"
	echo "phpunit --verbose $class $file"
	/usr/bin/phpunit \
		--include-path '/so/packages/hot-date/trunk:/so/packages/swat/trunk' \
		--verbose \
		$class "$file"
fi
