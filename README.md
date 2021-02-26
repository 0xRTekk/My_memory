# MY_MEMORY

My memory est une application web qui reproduit le jeu du memory.   
(Si si, sans déconner)

## Installation
#### A la main
Utiliser le gestionnaire de packages php [composer](https://getcomposer.org/) pour installer les dépendances.

```bash
composer install
```

Il faut aussi lancer le script sql afin de créer et charger la base de données !  
Soit via un client graphique SQL (PhpMyAdmin, HeidiSQL, MySqlWorkbench)  
ou alors en ligne de commande <3 (Pensez à créer d'abord la base de données ;) )

```bash
mysql -u root -p memory < CHEMIN/VERS/FICHIER/script/memory_script.sql
```


#### Via Docker-composer (PAS ENCORE AU POINT /!\)
Se placer dans le dossier docker et lancer la commande 
```bash
docker-compose up -d
```
Attendre que le téléchargement des images et la fin des commandes composer install et composer dump-autoload
Il faut ensuite se connecter au container mysql et éxecuter 
## Amélioration en cours 

Un environnement docker-compose est mis à disposition.  
Il n'est cependant pas totalement fonctionnel en l'état....   
Désolé :(  
L'initialisation de la base de données ne s'effectue pas (ce qui est problematique vous en conviendrez).  
L'idée serait de lancer la commande 

```bash
docker-compose up -d
```

afin de mettre à disposition un environnement de dev/test opérationnel   
(chargement de la base de données et installation des dépendances)

## Utilisation 

Arrivé sur la page d'accueil, vous devez renseigner un pseudo.  
Un listing des meilleurs temps de jeu est affiché et  
Si vous vous êtes déjà enregistré par le passé, vous pourrez voir vos meilleurs temps !  
Appuyez sur le MA-GNI-FIQUE bouton JOUER et TADAAAA :   
Vous arrivez sur le plateau de jeu.
   
Un timer se déclenche et vous avez alors 5 minutes pour trouver toutes les paires de fruits !   

## Contribution
Les Pull requests sont les bienvenues ! <3