# Gestion de Projets Collaboratifs

[![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4?logo=php)](https://php.net)

Application web de gestion de projets en équipe avec système de tâches, rôles utilisateurs et notifications.

![Dashboard Preview](screenshots/dashboard.png) <!-- Ajouter vos propres screenshots -->

## Fonctionnalités Clés

✅ Gestion complète des projets (CRUD)  
✅ Création de tâches avec pièces jointes  
✅ Système de rôles (Admin/Membre)  
✅ Tableau de bord avec statistiques  
✅ Notifications par email  
✅ Interface responsive Bootstrap  

## Prérequis

- PHP 8.1+
- Composer
- Node.js 16+
- SQLite (ou autre base de données)
## Installation
```bash
git clone https://github.com/votre-utilisateur/votre-repo.git
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed
npm install && npm run dev

## Installation Rapide

```bash
# Cloner le dépôt
git clone https://github.com/votre-utilisateur/votre-repo.git
cd votre-repo

# Installer les dépendances
composer install
npm install

# Configurer l'environnement
cp .env.example .env
php artisan key:generate

# Base de données SQLite
touch database/database.sqlite
php artisan migrate --seed

# Compiler les assets
npm run build

# Démarrer le serveur
php artisan serve

Base de données :
Modifier .env pour SQLite :
DB_CONNECTION=sqlite
# DB_DATABASE=... (commenter cette ligne)
Email (pour les notifications) :
Dans .env :
MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025


Rôles initiaux :
Exécuter dans Tinker :
php artisan tinker
>>> \App\Models\Role::create(['name' => 'Admin']);
>>> \App\Models\Role::create(['name' => 'Membre']);

Compiler les assets :
npm run dev
npm run dev
Démarrer le serveur de développement :
php artisan serve
Licence
Auteur : [TOTON Prestige ]
Contact : Natureadventure1995@gmail.com
WhatsApp : +229 0147167062

