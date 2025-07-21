# EcoRide - Guide d'installation et de déploiement

*Ce README fournit une base pour démarrer l’environnement de développement local.*

Ce projet est une application de covoiturage "EcoRide" développée en PHP, MySQL, JavaScript et CSS.

## Prérequis

- XAMPP (Apache + MySQL) ou tout autre environnement local PHP + MySQL
- Git (pour cloner le dépôt)

## Installation en local

1. **Cloner le dépôt**

   Dans un terminal de commande : 
   <dans le dossier de votre choix>
   git clone https://github.com/<votre-utilisateur>/ecoride.git
   cd ecoride


2. **Démarrer les services XAMPP**

   - Lancez Apache et MySQL via le panneau de contrôle XAMPP

3. **Créer la base de données**

   - Ouvrez phpMyAdmin [http://localhost/phpmyadmin](http://localhost/phpmyadmin))
   - Cliquez sur **Nouvelle base de données**
   - Nom de la base : `ecoride_test`
   - Cochez **utf8\_general\_ci** puis **Créer**

4. **Importer le schéma et les données de test**

   - Dans phpMyAdmin, sélectionnez la base `ecoride_test`
   - Allez dans l’onglet **Importer**
   - Choisissez le fichier `db/schema.sql` et cliquez sur **Exécuter**

5. **Configurer la connexion à la base**

   - Ouvrez le fichier `php/connect.php`
   - Vérifiez les informations de connexion :
     ```php
     $servername = "localhost";
     $username   = "root";
     $password   = "";
     $dbname     = "ecoride_test";
     ```

6. **Lancer l’application**

   - Placez le dossier `ecoride` dans `htdocs/` (ou `www/` selon votre configuration)
   - Ouvrez votre navigateur à l’adresse :
     ```
     http://localhost/ecoride/index.php
     ```

7. **Tester les fonctionnalités**

   - Inscription (`register.php`)
   - Connexion (`login.php`)
   - Création de trajet (`create_trip.php`)
   - Ajout de véhicule (`vehicles.php`)
   - Réservation, historique, modération, etc.

## Dépannage

- **Page blanche ou erreur de connexion** : vérifiez vos identifiants dans `php/connect.php` et que la base existe.
- **404 sur les assets** : assurez-vous que l’arborescence respecte celle indiquée dans le README.

## Structure du projet

```
Ecoride/
├── css/           # Feuilles de style CSS
├── js/            # Scripts JavaScript
├── php/           # Back-end (handlers, includes)
├── index.php      # Page d'accueil
├── trips.php      # Liste des trajets
├── login.php      # Connexion
├── register.php   # Inscription
├── account.php    # Espace utilisateur
├── trips.php      # Page des covoiturages disponibles
└── trip_detail.php # Informations d'un covoiturage sélectionné

```
