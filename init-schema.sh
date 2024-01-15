#!/bin/bash

/opt/lampp/lampp start

# wait for mysql to be ready
while ! /opt/lampp/bin//mysql --protocol TCP  -e "show databases;"; do sleep 2; done

# initialize the database
/opt/lampp/bin/mysql < /schema.sql

## Run tail so we don't exit
/usr/bin/tail -f /opt/lampp/logs/php_error_log
