#!/bin/sh
apt remove php
service apache2 stop
apt-get purge apache2
apt autoremove
#installing php8
echo '----------installing php8.0----------'
sleep 0.5
apt-get install apt-transport-https lsb-release ca-certificates
wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
sh -c 'echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/php.list'
apt update
apt-get install php8.0 php8.0-mysql php8.0-mbstring php8.0-xml php8.0-bcmath php8.0-curl php8.0-gd php8.0-zip
#installing composer
echo '----------installing composer----------'
sleep 0.5

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
mv composer.phar /usr/local/bin/composer
#installing ngrok
echo '----------installing ngrok----------'
sleep 0.5

wget https://bin.equinox.io/c/4VmDzA7iaHb/ngrok-stable-linux-amd64.zip
unzip ngrok-stable-linux-amd64.zip
mv ngrok /usr/local/bin/ngrok
#ask to add ngrok auth key
echo 'you still need to add your authtoken to ngrok'
sleep 0.5

#installing mariadb create db and add source.sql
echo '----------installing mariadb, creating db_tp database and initialising it with source.sql----------'
sleep 0.5

apt install mariadb-server
mysql_secure_installation
systemctl enable mariadb
systemctl start mariadb
mariadb -e "CREATE DATABASE IF NOT EXISTS db_tp"

#installing nginx
echo '----------installing nginx----------'
sleep 0.5

apt install nginx
#installing jenkins
echo '----------installing jenkins----------'
sleep 0.5

wget -q -O - https://pkg.jenkins.io/debian-stable/jenkins.io.key | apt-key add -
sh -c 'echo deb https://pkg.jenkins.io/debian-stable binary/ > \
    /etc/apt/sources.list.d/jenkins.list'
apt-get update
apt-get install jenkin
#installing java
echo '----------installing java----------'
sleep 0.5

apt update
apt install openjdk-11-jdk

#adding ssh key
echo '----------adding ssh key for github connection----------'
sleep 0.5

added_ssh = false

while true; do 
read -p "add an ssh key? Y/n : " Yn
case Yn in
    [Yy]*)
        added_ssh = true
        ssh-keygen -t rsa;
        break;;
    [Nn]*)
        echo 'no';
        exit;;
    *)
        echo 'enter y or n';;
    esac
done


php -v
composer --version
ngrok -v
mariadb --version
java --version
if [added_ssh = true];then
    echo 'add this key to github repo Deploy keys';
    cat /root/.ssh/id_rsa.pub;
fi
    

echo 'you should still add your ngrok authtoken!'