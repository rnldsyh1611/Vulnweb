#!/bin/bash

mysqld_safe --datadir=/var/lib/mysql &

sleep 5

mysql -u root -proot -e "CREATE DATABASE IF NOT EXISTS vulnweb;"
mysql -u root -proot vulnweb < /init.sql

php-fpm &

sleep 3

nginx -g 'daemon off;'
