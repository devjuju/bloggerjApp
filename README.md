# Blog professionnel - Développé en PHP

## 📌 A propos du projet
Ce projet est un **blog professionnel personnalisé** entièrement construit en **PHP**
sans utiliser de CMS (comme WordPress) ni de frameworks lourds.

L’objectif est de démontrer des compétences en développement web full-stack tout 
en offrant une plateforme sécurisée et réactive pour la publication de contenu.

### ✅ Fonctionnalités
- **Section Public:**
  - Page d’accueil avec image de marque personnelle (photo, slogan, téléchargement de CV)  
 -  Liste des articles de blog (triés par date)  
  - Détail de l’article de blog avec commentaires (validé avant publication)  
  - Formulaire de contact (email envoyé via PHPMailer)
  - Formulaire d’inscription
   - Formulaire de connexion

- **Section Admin:**
  - Authentification sécurisée (basée sur les rôles)
  - CRUD pour les articles de blog  
  -  Système de validation et de suppression des commentaires

- **Securité:**
  - XSS protection (`htmlspecialchars`)
  -  Protection contre les injections SQL (PDO avec instructions préparées)
- **Conception réactive:** Utilisation axée sur le mobile **Bootstrap 5**

---

## 🛠️ Technologies & Tools
- **Language:** PHP 8.x
- **Database:** MySQL
- **Frontend:** HTML5, CSS3, Bootstrap 5
- **Libraries:**
  - [PHPMailer](https://github.com/PHPMailer/PHPMailer) for sending emails
- **Dependency Manager:** Composer
- **Version Control:** Git & GitHub
- **Quality Analysis:**  Codacy B

---

## 🚀 Installation et configuration

### 1. Cloner le repository
```bash
git clone https://github.com/devjuju/bloggerjApp.git
```

### 2. Installer les dépendances
```bash
composer Install
```
```bash
php composer.phar dump-autoload
```

### 3. Installer la base de données
Ajouter une base de données dans votre logiciel d’administration SQL avec le nom suivant :
```bash
bloggerj
```

### 4. Importer la base de données
Importer le fichier `config/bloggerj.sql`.

### 5. Configurer la base de données
Remplacer les identifiants utilisés dans le code par les votre dans le fichier `src/core/DB.php` à la ligne 16 et 17 :

```php
private const DBUSER = 'votre identifiant';
private const DBPASS = 'votre mot de passe';
```

### 6. Démarrer le serveur
Pour démarrer le projet, lancez la commande `php -S localhost:8000 -t public` dans le terminal. Vous pouvez choisir le port que vous souhaitez si le port `8000` est déjà utilisé.
```bash
php -S localhost:8000 -t public
```

### 7. Accèder à la page d'administration du blog
Pour vous connecter à l’administration, aller sur la page de connexion. 
Entrer vos identifiants et mot de passe suivants :

👉 Copiez la ligne ci-dessous pour l’identifiant et coller le dans le champ `Email`
```bash
admin@gmail.com
```

👉 Copiez la ligne ci-dessous pour le mot de passe et coller le dans le champ `Mot de passe`
```bash
codeadminpass
```