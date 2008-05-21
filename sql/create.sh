#!/bin/sh

WHOAMI=`whoami`
DB="BlorgyNew"
HOST="zest"
DSN="pgsql://php@$HOST/$DB"
WD="/so/sites/blorgy/work-${WHOAMI}/sql"

cd $WD

# Clear any old database, and create a fresh one.
echo "Dropping the old database"
dropdb -h $HOST -U postgres $DB

echo "Creating the new database"
createdb -h $HOST -U postgres -E UTF8 $DB
createlang -h $HOST -U postgres plpgsql $DB

# Create all database objects.
# Later objects override earlier ones by the same name.
./create.php $DSN \
/so/packages/site/trunk/sql/*/*.sql \
/so/packages/admin/trunk/sql/*/*.sql \
/so/packages/nate-go-search/trunk/sql/*/*.sql \
/so/packages/blorg/trunk/sql/*/*.sql \
./tables/*.sql

# Create default admin users.
#psql -h $HOST -d $DB -U php -f /so/packages/admin/admin-users.sql

# Apply site specific changes to the admin tables.
#psql -h $HOST -d $DB -U php -f ./admin-changes.sql

cd -

