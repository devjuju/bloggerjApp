# 📰 PHP Dev Blog

Un projet de blog personnel entièrement créé en PHP, permettant aux visiteurs de lire et de commenter les articles, et aux administrateurs de gérer le contenu via un back-office sécurisé. Entièrement responsive et sécurisé, sans aucun CMS.

## 🚀 Features

### 🧑‍💻 Public Area

- Page d'accueil avec image de marque personnelle (nom, photo/logo, slogan)
- Liste des articles de blog (du plus récent au plus récent)
- Détails de l'article de blog avec section commentaires
- Formulaire de contact (nom, email, message) avec notification par email

### 🔐 Admin Area (Restricted Access)

- Inscription/connexion de l'utilisateur
- Contrôle d'accès basé sur les rôles (administrateur/utilisateur)
- Ajouter/Modifier/Supprimer des articles de blog
- Modération des commentaires
- Gestion sécurisée des sessions et validations de formulaires

## 🛡️ Security Considerations

- Protection contre :
  - XSS (Cross-Site Scripting)
  - CSRF (Cross-Site Request Forgery)
  - Injection SQL
  - Détournement de session
  - Téléchargement de fichiers malveillants
- Accès administrateur réservé aux utilisateurs vérifiés
- Les commentaires doivent être approuvés avant publication

## 🧱 Tech Stack

- PHP (non CMS)
- MySQL
- Bootstrap 5
- Composer

## 📱 Responsive Design

Le blog est entièrement adapté aux appareils mobiles et s'adapte parfaitement à toutes les tailles d'écran.

## 📦 Installation

1. **Cloner le repository**
   ```bash
   git clone https://github.com/devjuju/bloggerjApp.git

2. **Installer les dépendances**
   composer install
   Autoload PSR-4

3. **Importer la base de données**
   bloggerj.sql dans le dossier config/ est une base de donnée avec un jeu de données (plusieurs posts, utilisateurs, et commentaires)

4. **Changement de connexion à la base de donnée**
   Modifier le fichier src/core/Db.php avec vos identifiants et mot de passe :

   private const DBUSER = 'votre identifiant';
   private const DBPASS = 'votre mot de passe'; 

5. **Démarrer le serveur local**
    Taper dans votre terminal la ligne suivante:
    php -S localhost:8000 -t public

6. **Accéder à la page d'administration**
   Aller sur la page de connection et entrer les informations suivantes
   mail : admin@admin.com
   pwd : codeadminpass