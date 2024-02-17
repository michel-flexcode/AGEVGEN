<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## AGEVGEN Application de Gestion des Évaluations des Enseignements
-AGEVGEN est une application dédiée à la gestion des évaluations des cours par les étudiants. Elle offre plusieurs fonctionnalités clés :

## Création de Formulaires
- Permet aux administrateurs de créer des formulaires personnalisés pour évaluer les enseignements offerts par différents professeurs.

## Distribution Automatique
- Les questionnaires conçus peuvent être envoyés automatiquement aux élèves qui ont participé aux cours concernés.

## Gestion des Questions
- L'administrateur peut ajouter de nouvelles questions aux formulaires, permettant ainsi la création de divers questionnaires adaptés à chaque besoin.

## Collecte et Analyse des Données
- Offre la possibilité de recueillir les réponses des étudiants et de les compiler dans un tableau pour une analyse approfondie.

AGEVGEN vise à simplifier le processus d'évaluation des cours, en rendant la collecte et l'analyse des feedbacks étudiants à la fois efficace et organisée.

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.


## Prérequis

- Avoir Git installé sur votre machine
- Avoir Composer installé pour la gestion des dépendances PHP
- PHP >= 8.2
- Une base de données (MySQL, SQLite,..)

# Installation et Configuration du Projet

1. **Cloner le Projet GitHub**

   Ouvrez un terminal et clonez le dépôt en utilisant le lien HTTPS que vous avez. Remplacez `<git@github.com:michel-flexcode/AGEVGEN.git>` par le lien réel du projet GitHub :

2. **Naviguer dans le Répertoire du Projet**

Changez de répertoire pour entrer dans le dossier du projet cloné:
`cd AGEVGEN` 

3. **Installer les Dépendances PHP**

Exécutez Composer pour installer les dépendances PHP du projet :
`composer install` 

4. **Installer les Dépendances npm**

Installez les dépendances npm pour gérer les packages JavaScript :
`npm install` 

5. **Configurer le Fichier .env**

Copiez le fichier `.env.example` en `.env` si cela n'a pas déjà été fait :
Ouvrez le fichier `.env` avec votre éditeur de texte et modifiez les valeurs de `APP_NAME` avec le nom de votre application et `DB_DATABASE` avec le nom de votre base de données.

6. **Exécuter les Migrations de Base de Données**

Pour créer les tables dans votre base de données, exécutez :
`php artisan migrate` 

7. **Réinitialiser la Base de Données avec des Données de Test (Optionnel)**

Si vous souhaitez réinitialiser votre base de données et la remplir avec des données de test, utilisez :
`php artisan migrate:fresh --seed` 

8. **Générer une Clé d'Application**

Générez une nouvelle clé d'application Laravel :
`php artisan key:generate` 

9. **Compiler les Assets**

Compilez les assets (CSS, JavaScript) pour le développement :
`npm run dev` 




## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).


## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
