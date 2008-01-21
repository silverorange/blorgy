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
	echo dumping $table
	pg_dump -i -h $HOST -U php -d $DB -D -a -t $table --disable-triggers > $DATA_DIR/$table.sql
done

cd -
