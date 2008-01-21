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
DSN="pgsql://php@$HOST/$DB"
TABLES=`cat persistent-table-list`

# Restore data in persistent tables
for table in $TABLES; do
	echo restoring $table
	psql -o /dev/null -q -h $HOST -U postgres -d $DB -f $DATA_DIR/$table.sql
done

cd -
