# R606_eval

Cette application est une application qui affiche des textes d'une base de données

## Lancement du projet

Pour installer les dépendances vous devez lancer la commande suivante:

```bash
composer install
```

Ensuite, vous devez créer le fichier `.env` à partir du fichier `.env.exemple`.\
Exemple pour les conteneurs docker :
```properties
DB_HOST="db"
DB_NAME="ma_bdd"
DB_USER="root"
DB_PASSWORD="db_pwd"
```

Une fois fait, vous pouvez lancer le projet avec Docker :

```bash
docker-compose up -d
```

Vous pouvez ensuite accéder au projet sur [http://127.0.0.1:8000](http://127.0.0.1:8000)

## Tests

Pour lancer les tests vous pouvez lancer la commande suivante:

```bash
composer test
```

Pour lancer le linter de PHPStan, vous pouvez lancer la commande suivante:

```bash
composer lint
```

## Base de donnée

Au besoin, vous pouvez retrouver un script SQL pour l'initialisation de la base de données avec quelques données de tests au chemin suivant: `./_docker/db/init.sql`.

## TODO

- [ ] Ajout de tests unitaires de la classe Database
- [ ] Faire un CD de déploiment sur push on master et avec CI validé
- [ ] Initialisation automatique de la base de données dans Docker
- [ ] Ajouter un système de migration
