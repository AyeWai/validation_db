# validation_db

# Guide d'utilisation du site Commodiies Market

Commodities Market est un site web à l'intention d'investisseurs ( particuliers comme institutionnels) dans les matières premières où ils peuvent acheter une certaine quantité de ces produits brut.

## Installation.

Utilisez GitHub et clonez le repository de l'adresse suivante https://github.com/AyeWai/validation_db pour récupérer tous les fichiers necessaires.


##Pré-requis

Pour le bon fonctionnement du site web, il nous faut la suite de programmes LAMP ( Apache, MySQL et PhpMyAdmin pour environnement Linux).
On installe et lance celle-ci dans une machine virtuelle avec les commandes suivantes :

```bash

mkdir WebDir
vagrant init ubuntu/xenial64
vagrant up
vagrant ssh

sudo apt-get -y update
sudo apt-get install apache2 -y
sudo apt-get install php7.1
sudo apt-get install mysql-server php7.1-mysql
sudo apt install phpmyadmin

service mysql restart
service apache2 restart

```
Le git clone doit être inseré dans le localhost. Ensuite il faut démarrer phpmyadmin et importer le contenu du script script_Db.sql ou l'importer directement dans MySQL, pour obtenir la base de données. 
Votre machine doit avoir un accès constant à internet, les produits illustrant la base de données provenant de site web d'images libres de droits.

## Utilisation

Le site se compose de 4 pages princiales:

-Accueil
-Se connecter
-Panier
-Modération

*La page Accueil est la page d'accueil comme son nom l'indique


