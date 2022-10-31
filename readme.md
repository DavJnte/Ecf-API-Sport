# ECF API Salle De SPORT 2022

###### Développé par: `Jeannette David`
 
> :arrow_right: Présentation du projet : 
---
# :memo: Compétences de l'examen :


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

# :bookmark_tabs:   Application  : 
### -Description :

L’application est une grande marque de salle de sport qui souhaite la création d’une 
interface simple à destination de ses équipes qui gèrent les droits d'accès à ses 
applications web de ses franchisés et partenaires qui possèdent des salles de sport.
L’interface sera utilisée par l’équipe technique de développement de la marque

---



# Analyses et Choix techniques : 

### - Les Langages utilisés :<br>
-PHP -HTML -CSS -JAVASCRIPT 

### - Framework : 
LARAVEL , Boostrap , Ionic , Summernote, ADMINLTE

### - Librairie :
JQuery , Font Awesome , IchekBootstrap , Overlayscrollbars

### - Plugin : 
DataTable

---

# :closed_lock_with_key: Sécurité  : 
L'application possède une multitude d'option de sécurté :+1: <br>
Celle-ci comprends,une protection contre les :<br>
- <b>Injection SQL</b>
- <b>Failes XSS </b> <br>

L'appication web est également protégé vis à vis des formulaires vide. <b>Des messages d'erreurs</b> seront affichés au cas ou l'utilisateur ne saisi pas correctement les formulaires. <br>

- Les Mots de passe sont également hashé dans la Base de Données pour sécuriser les données.

### Utilisation des $session et Protection CSRF
En effet le $session est utilisé dans l'appication afin de bien authentifier l'utilisateur. Afin de garentir l'aspect sécurté de connexion et d'utilisation une protection supplémentaire CSRF permettra à l'utilisateur de sécuriser ses actions et sa connexion sur son compte. Cela protège aussi contre une attaque de type « Man-In-The-Middle » qui est possible sous HTTPS lors de l’utilisation d’une valeur secrète indépendante de la session.

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
:arrow_right: <b>php artisan serve</b> 
- Vous voici arriver devant l'interface de connexion : 
image ....

<b>Ou</b>

- Ouvrez votre terminal avec la commande <b>Windows+S</b> dirigez vous sur le projet avec la commande <b>cd</b> pour arriver sur le dossier de l'application dans votre serveur local.
- Effectuer la commande :
:arrow_right: <b>php artisan serve</b> 

---
# :paperclip: Annexes :
à Venir...

