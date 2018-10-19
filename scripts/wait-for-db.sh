#!/usr/bin/env bash
until (echo "SHOW TABLES;" | mysql $MYSQL_DATABASE -u$MYSQL_USER -p$MYSQL_PASSWORD)
do
    echo "Trying mysql connection ..."
    sleep 1
done