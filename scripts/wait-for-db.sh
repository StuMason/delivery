#!/usr/bin/env bash
until (echo "SHOW TABLES;" | mysql delivery -uroot -psecret)
do
    echo "Trying mysql connection ..."
    sleep 1
done