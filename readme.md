# ECF API Salle De SPORT 2022

###### Développé par: `Jeannette David` Graduate Développeur web Full Stack
> ### Lien du projet en ligne : https://madnessfitness.fr
> :arrow_right: Présentation du projet : <br>

#### Identifiants de l'application (Administrateur) : 
- Login : admin
- Mot de passe : 123456789
---
# :memo: Les Compétences de l'examen :


### Activité – Type 1 : Développer la partie front-end d’une application web ou web mobile en intégrant les recommandations de sécurité

- Maquetter une application.
- Réaliser une interface utilisateur web statique et adaptable.
- Développer une interface utilisateur web dynamique.
- Réaliser une interface utilisateur avec une solution de gestion de contenu ou e-commerce.



### Activité – Type 2 : Développer la partie back-end d’une application web ou web mobile en intégrant les recommandations de sécurité

- Créer une base de données.
- Développer les composants d’accès aux données.
- Développer la partie back-end d’une application web ou web mobile.
- Élaborer et mettre en œuvre des composants dans une application de gestion de contenu ou e-commerce.
---

# :bookmark_tabs: L'Application  : 
### -Résumer :

L’application est une grande marque de salle de sport qui souhaite la création d’une
Interface simple à destination de ses équipes qui gèrent les droits d'accès à ses
Franchisés qui possèdent des salles de sport.
L’interface sera utilisée par l’équipe technique de développement de la marque.
### -Description : 
<b>L'application</b> Madness Fitness dispose de 3 rôles distinct : <br>
- Un Administrateur
- Des Franchises
- Des Structures <br>

Ces rôles possèdent des accès différents à la plateforme.En effet, L'administrateur est celui qui gère l'ensemble des utilisateurs qui possèdent des permissions. L'admin peut entre autres ajouter, modifier, supprimer, activer et désactiver ce qu'il veut ( Que ce soit des Franchises ou Structures)il peut aussi ajouter, modifier et supprimer des permissions.
Les permissions sont en fait des droits que l'admin peut accorder à ses utilisateurs. Celui-ci peut en effet attribuer des droits pour chaque Franchise qui seront hérité par l'essemble des structures qui lui appartienne .<br>
- <b>Point essentiel</b> : si jamais l'admin décide de supprimer une Franchise celle-ci enclenchera avec elle la suppression de toutes ces salles de sport et de ses permissions.Tout simplement car elles sont liées entre elles. À l'inverse si l'admin décide de supprimer une Structure alors celle-ci n'impactera pas les autres salles ni la Franchise elle-même, car les Structures sont indépendantes.Les Structures sont juste lié à une Franchise parent qui leur accorde des permissions.

Par la suite, les utilisateurs que ce soit des Franchises ou Structures peuvent se connecter sur la plateforme. Seulement il n'y a que l'admin qui à le droit de gérer l'ensemble de l'application. Les utilisateurs, lorsqu'il se connecte, ont uniquement le droit de voir leurs permissions.
 
---


#  Les Technologies Utilisés : 

### Technologie Front-end : 
- PHP, HTML, CSS, JAVASCRIPT 

### Technologie Back-end : 
- IDE DATAGRIP -> Pour écrire mes requêtes SQL 
- Server MY SQL (Phpmyadmin)
### - Framework : 
- LARAVEL, Boostrap, Ionic, Summernote, ADMINLTE

### - Librairie :
- JQuery, Font Awesome, Overlayscrollbars

### - Plugin : 
- DataTable


---

# :closed_lock_with_key: La Sécurité  : 
L'application possède une multitude d'option de sécurté :+1: <br>
Celle-ci comprends,une protection contre les :<br>
- <b>Injection SQL</b>
- <b>Failes XSS </b> <br>

L'appication web est également protégé vis à vis des formulaires vide. <b>Des messages d'erreurs</b> seront affichés au cas ou l'utilisateur ne saisi pas correctement les formulaires. <br>

- Les Mots de passe sont également hashé dans la Base de Données pour sécuriser les données.

### Utilisation des $session et Protection CSRF
En effet le $session est utilisé dans l'appication afin de bien authentifier l'utilisateur. Afin de garentir l'aspect sécurté de connexion et d'utilisation une protection supplémentaire CSRF permettra à l'utilisateur de sécuriser ses actions et sa connexion sur son compte. Cela protège aussi contre une attaque de type « Man-In-The-Middle » qui est possible sous HTTPS lors de l’utilisation d’une valeur secrète indépendante de la session.

- Passage à un protocole HTTPS pour sécuriser les données et l'application.

---
# :computer:  Déploiment de l'application en Local
- Télécharger le dossier <b>.zip</b> puis veuillez extraire les fichiers dans votre serveur local.
- Installer la Base de données <b>user_management</b> dans votre serveur web local mysql. Puis Importer la Base de données 
- Ouvrez le projet avec votre éditeur de code : 
- Effectuer la commande suivante dans votre terminal : :arrow_down: 
```javascript
>composer install 
```
-  Créer le fichier <b>.env</b> à la racine du projet. <br>
-  Veuillez par la suite compléter le fichier .env avec vos données.

Pour cela vous pouvez vous aider du fichier <b>.env.exemple</b> <br>
copier - coller les données du fichier .env.exemple dans .env que vous venez de créer.
```javascript=8
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=http://localhost/

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=user_management
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
SESSION_LIFETIME=120
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

```
-Les lignes qui doivent être modifiés par vos données se situe entre <b>15 et 20</b>.

```javascript=15
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=user_management
DB_USERNAME=root
DB_PASSWORD=
```
-Une fois votre fichier <b>.env</b> configuré passons à la dernière étape :+1: 
Pour finir votre installation en local veuillez ouvrir à nouveau votre terminal pour saisir la commande suivante : 
```javascript
>php artisan config:cache
```
# Démarer l'application dans votre navigateur : :rocket: 
- Ouvrez votre terminal avec votre éditeur de code et effectuer la commande : 
```javascript
>php artisan serve
```

- Vous voici arriver devant l'interface de connexion : 
### Connexion Pour les Franchises ou Structures :
![connexion](https://user-images.githubusercontent.com/74544250/199036674-043c1f9c-0d11-47e7-9fb4-cecba119aa82.png) <br> 

<b>Ou</b>

- Ouvrez votre terminal avec la commande <b>Windows+S</b> dirigez vous sur le projet avec la commande <b>cd</b> pour arriver sur le dossier de l'application dans votre serveur local.
- Effectuer la commande :
```javascript
>php artisan serve
```

---
# :notebook_with_decorative_cover: Les Annexes : 

### - La Maquette de l'application se trouve dans le dossier github
## MCD (Model Conceptuel de Données) :
![mcd](https://user-images.githubusercontent.com/74544250/199040048-201c89ba-74cc-4a03-81ce-086040502a43.png)

## MLD (Méthode Merise): 
![image alt](https://user-images.githubusercontent.com/74544250/199057007-d33c2449-8e3b-4c5f-8bc5-6f9d4a4e57c2.png)

## MPD :
![image alt](https://user-images.githubusercontent.com/74544250/199059143-e5070e34-6de7-469a-9985-783440a134bc.png)

## Diagramme de Cas d'utilisation : 
![Uml](https://user-images.githubusercontent.com/74544250/199040078-26c738bd-19d9-41ad-b2fe-92a506d731b4.png)

## Diagramme de Classe : 
![Diagramme](https://user-images.githubusercontent.com/74544250/199040224-6f0c8c9b-5a5a-458e-9a89-acf3d5af801a.png)

## Diagramme de Séquence : 
### -ADMINISTRATEUR :
![SEQUENCE 1](https://user-images.githubusercontent.com/74544250/199436135-4b53960d-886d-4e1b-8573-9260f971bee9.png)

![SEQUENCE 2](https://user-images.githubusercontent.com/74544250/199436186-3a3e5dda-5cff-41e3-aabd-0e1c101e799c.png)

### - Utilisateurs : 

![SEQUENCE 3](https://user-images.githubusercontent.com/74544250/199440561-60eb62be-886d-4615-a6d3-64f8ba0fddfe.png)

## Charte Graphique : 
![Wirefrmae2](https://user-images.githubusercontent.com/74544250/199218005-9fe384c5-55b7-4fc3-979d-b0a7165f7f22.png)

## Wireframe : 

![Wirefrmae1](https://user-images.githubusercontent.com/74544250/199217979-74eb25b2-d08e-4f48-bca8-0d119ced20c1.png)

![Wirefrmae2](https://user-images.githubusercontent.com/74544250/199216689-f13ee23b-5422-4ef4-ae22-722f4da82c82.png)


---
