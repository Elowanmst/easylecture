# projet annuel site e-commerce de vente de E-Book "easylecture"

## projet et architecture
ce projet est un site de e-commerce sur la vente de E-Book

En termes d'architecture, l’application adopte une architecture monolithique basée sur le modèle MVC, propulsée par
le framework Laravel.
L’interface utilisateur (frontend) et la logique serveur (backend) cohabitent au sein d’un
même environnement.
L'utilisation de Blade et Livewire permet d’optimiser l’expérience utilisateur avec une
navigation fluide et sans rechargement complet de page.

La base de données est :
- En développement : SQLite, pour sa simplicité de déploiement et sa rapidité. BDD relationelle car nous voulons avoir une integrité forte car il y aura des donnée sensible sur notre site comparer à une base de donnée non relationnel (NoSQL)
- En production : à definir

Les fichiers multimédias (comme les images de produits ou les avatars) sont gérés grâce à la
bibliothèque Spatie Laravel Medialibrary


## mise en place / installation

### installation des dependances
````
composer install
````

### fichier .env
````
cp .env.example .env
````

### key generate
````
php artisan key:generate
````


### migration BDD

````
php artisan migrate
````

### lancement du server 
````
php artisan serve
````

### resumé
pour lancer le projet vous devez lancer ses commandes ; 
````
composer install //dependances
cp .env.example .env //creation du .env
php artisan key:generate //generation de la clé
php artisan migrate //si besoin, si il y a une des migration de faite
php artisan serve //lancement du serveur 
````




