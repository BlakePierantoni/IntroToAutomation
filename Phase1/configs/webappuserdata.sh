#!/bin/bash
apt update -y 
apt upgrade -y
apt install apache2 php libapache2-mod-php php-mysql mysql-client -y 
systemctl enable apache2 --now
touch /var/www/html/.htaaccess
mv /var/www/html/index.html /var/www/index.html.bak
echo 'Directory Index index.php' > /var/www/html/.htaaccess
apt install awscli -y 
sleep 60
aws s3 cp s3://happycars-429646334739/index.php /var/www/html/
aws s3 cp s3://happycars-429646334739/config.php /var/www/html/
aws s3 cp s3://happycars-429646334739/create.php /var/www/html/
aws s3 cp s3://happycars-429646334739/delete.php /var/www/html/
aws s3 cp s3://happycars-429646334739/error.php /var/www/html/
aws s3 cp s3://happycars-429646334739/read.php /var/www/html/
aws s3 cp s3://happycars-429646334739/search.php /var/www/html/
aws s3 cp s3://happycars-429646334739/update.php /var/www/html/
aws s3 cp s3://happycars-429646334739/nav.php /var/www/html/
aws s3 cp s3://happycars-429646334739/analytics.php /var/www/html/
aws s3 cp s3://happycars-429646334739/php.ini /etc/php/7.2/apache2/
service apache2 restart
