#!/bin/sh

WHOAMI=`whoami`
WD="/so/sites/blorgy/work-${WHOAMI}/sql"

if [ -z $1 ]; then
    echo "usage: $0 <database> <host> [data-dir]]"
    exit
fi

if [ -z $3 ]; then
	DATA_DIR="persistent-data"
else
	DATA_DIR=$3
fi

cd $WD
DB=$1
HOST=$2
TABLES=`cat persistent-table-list`

mkdir -p $DATA_DIR

for table in $TABLES; do
	if [[ "${table:0:1}" != ";" ]]
	then
		echo dumping $table to $DATA_DIR/$table.sql
		pg_dump \
			--host $HOST \
			--username php \
			--inserts \
			--data-only \
			--table $table \
			--disable-triggers \
			$DB > $DATA_DIR/$table.sql
	fi
done

cd -
