# TP_Qualité-Logiciel-Tests" 

Nicolas Bergeault , Theo Rodrigues, Pierre Barbé

Faire une machine virtuel sur VirtualBox ou HyperV avec la version 11 de debian
Lien de téléchargement debian 11 : https://cdimage.debian.org/debian-cd/current/amd64/iso-cd/debian-11.1.0-amd64-netinst.iso

Récuperer le script sur github dans le dossier utils/dependencies-install-(need-root).sh
Changer le droit du script puis lancer le avec :
- sudo chmod 777 dependencies-install-(need-root).sh
- su
- ./dependencies-install-(need-root).sh

Copier la clé SSH puis l'ajouter dans "Deploy keys" dans le projet github

Aller sur jenkins à l'adresse localhost:8080 et connecter à l'aide du token afficher dans la console à la du script

Tableau de bord -> Gestion des plugins 
Puis installer SonarQubeScanner

Tableau de bord -> Configuration global
Ajouter sonarQube Scanner
![6774bda2dbeb40e9dc83c23977d9b605](https://user-images.githubusercontent.com/56303623/138104241-870cdf5b-da16-4f98-bd88-ba35dcdf17ad.png)

Aller sur sonarQube http://localhost:9000
puis générer un token et copier le

Tableau de bord -> System configuration
Section SonarQube servers
Nom : sonarqube
Url du serveur : http://localhost:9000

Ajouter un token global puis coller le token dans la secret phrase


- sudo visudo
![1e2560f18ab8b70a268bce0468260b76](https://user-images.githubusercontent.com/56303623/138106652-34ce1c21-992d-4246-8bfc-706ebe194253.png)

Créer un compte ngrok sur https://ngrok.com/ puis récupérer votre token puis sur le cmd faites:
- ngrok authtoken {token}
- ngrok http 8080

Copier l'url ngrok/io


Ajouter cette url dans les webhooks du projet github

Récuperer le token sonarqube puis ajouter le dans les credentials jenkin

Créer un projet freestyle sur jenkins puis dans la configuration du projet :

Cocher la case git puis mettre le lien du projet github
![0d6083001394ae3a1cb00ed87dcdc406](https://user-images.githubusercontent.com/56303623/138098780-1183fe44-1af5-412c-bcba-9cb68aaa17a5.png)

Ajouter une etape de build "Lancer une analyse avec SonarQube Scanner" :
![096235f87b63f161f29efe0ec033f9ae](https://user-images.githubusercontent.com/56303623/138098597-f3aa90d0-e844-4537-bfc3-6de1bd9006e5.png)

Ajouter une etape de build "Exécuter un script shell" :
![7ec4323ec47694fbdb4a19014e8d2e78](https://user-images.githubusercontent.com/56303623/138098568-d3279750-2043-464c-8735-238e54bcead7.png)



sudo vim /etc/php/8.0/fpm/php.ini
file_uploads = On
allow_url_fopen = On
memory_limit = 256M
upload_max_filesize = 64M

sudo vim /etc/nginx/sites-available/default

server {
    listen 80;
    listen [::]:80;
    root /var/www/html;
    index  index.php index.html index.htm;
    server_name  example.com www.example.com;

    location / {
        try_files $uri $uri/ =404;       
    }

  
     # pass PHP scripts to FastCGI server
        #
        location ~ \.php$ {
               include snippets/fastcgi-php.conf;
        #
        #       # With php-fpm (or other unix sockets):
               fastcgi_pass unix:/run/php/php8.0-fpm.sock;
        #       # With php-cgi (or other tcp sockets):
        #       fastcgi_pass 127.0.0.1:9000;
        }
}
sudo systemctl restart nginx
