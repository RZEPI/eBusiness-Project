#!/bin/bash
docker exec mariadb mysqldump -u admin -proot prestashop-database > ./dump/backup.sql