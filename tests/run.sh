#!/bin/sh

working_dir=$( basename "$current_dir" )
site=$( basename "$( dirname "$current_dir" )" )

include_path="/so/packages/swat/"$working_dir\
":/so/packages/turing/"$working_dir\
":/so/packages/site/"$working_dir\
":/so/sites/"$site"/"$working_dir"/pear/lib"

if [ "$1" == "" ]; then
	echo "phpunit --log-junit log.xml --verbose TestSuite"
	/usr/bin/phpunit \
		--include-path $include_path \
		--log-junit log.xml \
		--verbose \
		-d error_reporting=34815 \
		TestSuite
else
	file="$1"
	class="`basename "$file" .php`"
	/usr/bin/phpunit \
		--include-path $include_path \
		--verbose \
		-d error_reporting=34815 \
		$class "$file"
fi
