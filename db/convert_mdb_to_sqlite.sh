#!/bin/bash

#using mdbtools to convert accdb file to sqlite file

#path to .accdb file
#mdb=$1;
#mdb="Waterbase_UWWTD_v6_20171207.mdb";        #v6
#mdb="Waterbase_UWWTD_v7_20190913021736.accdb" #v7
mdb="Waterbase_UWWTD_v8.accdb"

#export the desired tables from the acces mdb file to a new sqlite file

#get table names
tables=$(mdb-tables $mdb)

#export from mdb
for table in ${tables[@]}; do
  echo -n "Exporting $table from Access (mdb) to SQL..."
  mdb-schema --drop-table $mdb sqlite --table $table > $table.schema.sql; #table schema
  mdb-export -I sqlite $mdb $table > $table.sql;                          #table data
done

#count rows for each table
for table in ${tables[@]}; do
  rows=$(wc -l $table.sql | awk '{print $1}'); #number of rows
  echo ">> [mdb] table $table: $rows rows ";
done

#import the generated sql files to sqlite
for table in ${tables[@]}; do
  echo -n "Importing $table to sqlite3... "
  sqlite3 $mdb.sqlite < $table.schema.sql
  sqlite3 $mdb.sqlite < $table.sql
  echo "Done"
done

#count rows for each table
for table in ${tables[@]}; do
  sql="SELECT COUNT(*) FROM $table;"
  rows=$(echo "$sql" | sqlite3 $mdb.sqlite);
  echo ">> [sqlite] table $table: $rows rows ";
done
