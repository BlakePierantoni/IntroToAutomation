#!/bin/bash
apt update -y 
apt upgrade -y
apt install mysql-server -y
mysqladmin -u root password 'Iamr00t$'
mysql -u root -pIamr00t$ -e "CREATE DATABASE ContainerDemo DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;"
apt install awscli -y 
sleep 30
aws s3 cp s3://happycars-429646334739/ContainerDemo.sql /home/ubuntu
aws s3 cp s3://happycars-429646334739/mysqld.cnf /etc/mysql/mysql.conf.d/
mysql -u root -pIamr00t$ ContainerDemo < /home/ubuntu/ContainerDemo.sql
mysql -u root -pIamr00t$ -e "GRANT SELECT, DELETE, INSERT, UPDATE ON ContainerDemo.* TO 'reader'@'%' IDENTIFIED By 'Notr00t1';"
service mysql restart
