# ECF API Salle De SPORT 2022

###### Développé par: `Jeannette David`
 
> :arrow_right: Présentation du projet : 
<br>


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




# :bookmark_tabs:   Application  : 
### -Description :

L’application est une grande marque de salle de sport qui souhaite la création d’une 
interface simple à destination de ses équipes qui gèrent les droits d'accès à ses 
applications web de ses franchisés et partenaires qui possèdent des salles de sport.
L’interface sera utilisée par l’équipe technique de développement de la marque

---



# Analyses et Choix techniques : :rocket: 

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

### Utilisation des $session et Protection CSRF
En effet le $session est utilisé dans l'appication afin de bien authentifier l'utilisateur. Afin de garentir l'aspect sécurté de connexion et d'utilisation une protection supplémentaire CSRF permettra à l'utilisateur de sécuriser ses actions et sa connexion sur son compte. Cela protège aussi contre une attaque de type « Man-In-The-Middle » qui est possible sous HTTPS lors de l’utilisation d’une valeur secrète indépendante de la session.

# :computer:  Déploiment de l'application en Local

- Veuillez installer la Base de données <b>user_management</b> dans votre serveur web local mysql. Puis Importer la Base de données 
-  Changer le fichier <b>.env</b> avec vos données : ligne  8 à 13.
```javascript=8
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=user_management
DB_USERNAME=root
DB_PASSWORD=
```
### Démarer l'application dans votre navigateur : :rocket: 
- Ouvrez votre terminal avec votre éditeur de code et effectuer la commande :
:arrow_right: <b>php artisan serve</b> 
- Vous voici arriver devant l'interface de connexion : 
image ....

ou

- Ouvrez votre terminal avec la commande <b>Windows+S</b> dirigez vous avec la commande <b>cd</b> pour arriver sur le dossier de l'application dans votre serveur local.
- Effectuer la commande :
:arrow_right: <b>php artisan serve</b> 
- Vous voici arriver devant l'interface de connexion : 
image ....

# :paperclip: Annexes :
à Venir...

---

