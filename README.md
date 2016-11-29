# Présentation de mon Portfolio
*Réalisé dans l'optique de validation de la formation "Développeur Intégrateur Web" à la 3W Academy à Strasbourg.*

###[www.faress.webatt.fr](http://faress.webatt.fr)

## La loi des 5 (les technologies indispensables):

1. HTML
2. CSS
3. PHP
4. JAVASCRIPT
5. SQL

## Dépendances Day

Pour ce projet, j'ai utilisé **Bower ([Github bower](https://github.com/bower/bower/))** en pensant avoir besoin de plusieurs dépendances, mais j'ai finalement décidé de ne pas me disperser et de me limiter au strict nécessaire.

Malgré toute l'énergie investie dans le fonctionnement d'une routine **Gulp ([Github gulp](https://github.com/bower/bower/))** pour compiler mes fichiers **SCSS** je me suis rabattu sur **Prepros ([Github prepros](https://github.com/Subash/Prepros/))** pensant qu'il effectuais les pré-fixages Vendeurs... Oui mais non! J'ai en définitive opté pour Prepros et une seule dépendance : **Font-awesome ([Github font-awesome](https://github.com/FortAwesome/Font-Awesome/))**.

## Outils utilisés

* Sublime text
* Sass
* Prepros
* Github
* Photoshop
* Illustrator
* [Google.com](https://google.com/)

## Du Blabla

Toutes les animations ont été réalisées en **CSS** et **JAVASCRIPT**. Expérimentant la construction d'un site de A à Z je n'ai utilisé aucune librairies. Le peu de fonctionnalités mis en place ainsi que ma volonté de les coder moi même ne justifiait pas l'utilisation de **JQUERY** par exemple.

Grâce à **Sass** le **CSS** n'a jamais été aussi cool, **variables** `$maCouleur = #FFF` et **mixins** `@mixin maBordure($maCouleur){ border-color: $maCouleur; color: $maCouleur;}` m'ont grandement facilités la tâche.

Un peu de **SEO** (quelques **<meta>** et un **sitemap.xml**), un peu de **htAccess** (quelle galère avec **WAMP**) et de la motivation ont suffit pour donner... accès à mon portfolio.

## Installation en 2 étapes

### Étape 1

Créer un nouveau dossier nommé **CONFIG** et y crée un fichier `config_db.php`, le tout à la racine du projet. Y placer ce code (en ajoutant biensûr vos informations:
`<?php
	$config_online = [
		'host' => 'localhost',
		'port' => '3306',
		'login' => 'login',
		'password' => 'motDePasse',
		'bdd' => 'nomDeLaBase',
	];
?>`

**Dé-commenter la 2 à 12 de `index.php`.**

### Étape 2

Il ne reste plus qu'à crée une table nommée `faress_contact` dans votre base de donnée :

CREATE TABLE IF NOT EXISTS 'faress_contact' (
  'id' int(11) NOT NULL,
  'name' varchar(63) NOT NULL,
  'firstname' varchar(63) NOT NULL,
  'mail' varchar(255) NOT NULL,
  'object' varchar(63) NOT NULL,
  'message' varchar(511) NOT NULL,
  'date' timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;