# validation_db

# Guide d'utilisation du site Commodiies Market

Commodities Market est un site web à l'intention d'investisseurs ( particuliers comme institutionnels) dans les matières premières où ils peuvent acheter une certaine quantité de ces produits brut.

## Installation.

Utilisez GitHub et clonez le repository de l'adresse suivante https://github.com/AyeWai/validation_db pour récupérer tous les fichiers necessaires.


## Prérequis

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

### Les pages

Le site se compose de 4 pages princiales:

-Accueil  
-Se connecter  
-Panier  
-Modération  

La page "Accueil" est la page d'accueil comme son nom l'indique est la page d'accueil du site web, l'une des 3 pages accessibles utilisateurs non admin. 
Selon les entrées de la table "produit" de la base de données et leur nombre, les articles s'intègrent automatiquement à la page avec leurs caractéristiques propres.
Sur cette même page, l'utilisateur peut grâce à un système de bouton sélectionner la quantité de chaque article qu'ils désirent et qui seront affichés dans la page "Panier".

La page "Se connecter" permet de s'indentifier comme un utilisateur particulier ou un admin. Une fois connecté, l'utilisateur admin a accès à l'intégralité du site dont la page "Modération" et l'utilisateur institutionnel accès aux articles sensibles tel que l'uranium .
    
La page Panier fait la somme des articles sélectionnés par l'utilisateur selon le nombre d'articles sélectionné et leur prix.

La page Modération n'est visible après connexion que à l'admin ou il peut y ajouter, supprimer, ou modifier articles et utilisateurs. La page utilise la pdo pour agir sur la base de données et ainsi les informations se retrouvent modifiées sur le site.

### La base de données

Elle est composée de 3 tables, basket, products and users.

La table basket est utilisée par la page panier, chaque entrée est décrite par un identifiant d'utilisateur, un identifiant de produit et une quantité.

La table products contient les tous les articles, ici nos matières première ainsi que leurs caractéristiques, dont l'URL de leur photo dans la page accueil.

La table users contient les utilisateurs, c'est à dire leur description ainsi que les identifiants et mots de passe de chacun. 









