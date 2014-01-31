#!/usr/bin/python
# -*- coding: utf-8 -*-

import psycopg2
import sys
con = None
shortname = "horton"

try:
	con = psycopg2.connect(host='dancy', database='Blorgy', user='blorgy')
	cur = con.cursor()
	cur.execute("SELECT id from instance where shortname=%s", (shortname,))
	instance = cur.fetchone()
	print instance

except psycopg2.DatabaseError, e:
	print 'Error %s' % e
	sys.exit(1)

finally:
	if con:
		con.close()
