# ISI Student Manager – Groupe 3

**TP 3 : Gestion collaborative des versions avec Git et GitHub**
Méthodologies de développement et Ateliers en PHP – Master ISI – S1
Faculté des Sciences Semlalia – Université Cadi Ayyad, Marrakech
Encadrant : Prof. Ikidid Abdelouafi

Dépôt du groupe : `git@github.com:Mahjoub07/ISI-Student-Manager-Groupe3.git`
(URL web : https://github.com/Mahjoub07/ISI-Student-Manager-Groupe3)

---

## Sommaire

1. [Membres du groupe](#1-membres-du-groupe)
2. [Description du projet](#2-description-du-projet)
3. [Installation et exécution](#3-installation-et-exécution)
4. [Déroulement du TP (exercices 1 à 9)](#4-déroulement-du-tp)
5. [Livrables](#5-livrables)

---

## 1. Membres du groupe

| Étudiant | Nom | Responsabilité | Fichier / branche |
| --- | --- | --- | --- |
| A | Elmahjoub Bounhar | Chef de projet, création du dépôt, page d'accueil | `index.php` / `feature/accueil` |
| B | Moulay Driss El Mehdi Chtioui | Page des étudiants (liste) | `etudiants.php` / `feature/etudiants` |
| C | Reda Tizliouin | Page des projets (liste) | `projets.php` / `feature/projets` |
| D | Hassan El Issaoui | Mise en forme CSS et navigation | `style.css` / `feature/style` |

## 2. Description du projet

Mini-application PHP « ISI Student Manager » développée en parallèle par quatre étudiants. Chaque membre travaille sur sa propre branche, puis intègre son travail dans `main` via une **Pull Request** relue par un autre membre du groupe.

Workflow suivi :

```
Branche → commit → push → Pull Request → revue → merge vers main
```

Structure du dépôt :

```
ISI-Student-Manager-Groupe3/
├── README.md
├── index.php          # page d'accueil + navigation (Étudiant A)
├── etudiants.php      # liste des étudiants (Étudiant B)
├── projets.php        # liste des projets (Étudiant C)
├── style.css          # mise en forme (Étudiant D)
└── configuration.txt  # fichier utilisé pour l'exercice sur les conflits
```

## 3. Installation et exécution

**Prérequis :** Git, PHP 8+ (ou XAMPP/WAMP), un compte GitHub avec une clé SSH configurée.

```bash
# 1. Générer une clé SSH Ed25519 puis l'ajouter à GitHub (Settings > SSH and GPG keys)
ssh-keygen -t ed25519 -C "votre.email@exemple.com"

# 2. Cloner le dépôt
git clone git@github.com:Mahjoub07/ISI-Student-Manager-Groupe3.git
cd ISI-Student-Manager-Groupe3

# 3. Lancer le serveur PHP intégré
php -S localhost:3000
```

Puis ouvrir dans le navigateur : `http://localhost:3000/index.php`
(pages : `etudiants.php`, `projets.php`).

---

## 4. Déroulement du TP

## Exercice 1 – Installation et configuration

Chaque étudiant vérifie l'installation de Git (`git --version`), configure son identité (`git config --global user.name` / `user.email`) et affiche la configuration (`git config --global --list`).

**Rôle de `user.name` et `user.email`** : ces deux paramètres identifient l'auteur de chaque commit (nom et adresse e-mail enregistrés dans l'historique). Ils permettent de savoir qui a fait quelle modification ; GitHub utilise l'e-mail pour associer le commit à un compte.

**Étudiant A**

![Config Git – Étudiant A](screenshots/ex1-A-config.png)

**Étudiant B**

![Config Git – Étudiant B](screenshots/ex1-B-config.png)

**Étudiant C**

![Config Git – Étudiant C](screenshots/ex1-C-config.jpeg)

**Étudiant D**

![Config Git – Étudiant D](screenshots/ex1-D-config.jpeg)

## Exercice 2 – Création du dépôt commun

L'étudiant A crée sur GitHub le dépôt public `ISI-Student-Manager-Groupe3` avec un fichier README, invite B, C et D comme collaborateurs, et ceux-ci acceptent l'invitation.

## Exercice 3 – Clonage et premier commit

### Configuration de l'authentification SSH

Génération de la paire de clés Ed25519 :

![ssh-keygen](screenshots/ex3-ssh-keygen.png)

Ajout de la clé à l'agent SSH et affichage de la clé publique (à copier dans GitHub) :

![ssh-add](screenshots/ex3-ssh-add.png)

Initialisation locale et déclaration du dépôt distant :

![git init et remote add](screenshots/ex3-ssh-github.png)

![git remote -v](screenshots/ex3-git-init-remote.png)

### Clonage du dépôt

![git clone](screenshots/ex3-clone.png)

### Adresse `origin`, branches et statut

**Adresse du dépôt (`git remote -v`)**

![origin](screenshots/ex3-origin.png)

**Branches locales (`git branch`)**

![Branches locales](screenshots/ex3-branches-locales.png)

**Branches distantes (`git branch -r`)**

![Branches distantes](screenshots/ex3-branches-distantes.png)

**Statut (`git status`)**

![git status](screenshots/ex3-status.png)

### Notions

| Notion | Explication |
| --- | --- |
| `clone` | Commande qui copie un dépôt distant sur l'ordinateur local, en récupérant son historique et ses branches de suivi distantes. |
| `origin` | Nom par défaut donné au dépôt distant lors du clonage. Il permet de référencer son adresse sans la retaper. |
| `main` | Branche principale du projet, généralement utilisée pour intégrer le code validé par l'équipe. |
| `origin/main` | Référence locale qui indique l'état connu de la branche `main` sur le dépôt distant lors de la dernière récupération. Ce n'est pas une branche locale de travail ordinaire. |
| `HEAD` | Référence qui indique la position courante de Git : généralement la branche sur laquelle on travaille, ou le commit courant en cas de HEAD détachée. |

Passage sur la branche `feature/accueil` :

![git switch -c feature/accueil](screenshots/ex3-switch-accueil.png)

## Exercice 4 – Commit initial

L'étudiant A crée `index.php` avec le message « Bienvenue dans ISI Student Manager » et l'envoie vers `main`.

![Commit initial et push – Étudiant A](screenshots/ex4-commit-push-A.png)

Les autres étudiants exécutent `git pull origin main` afin de récupérer la nouvelle version du projet.

![git pull – autres étudiants](screenshots/ex4-pull-autres.jpeg)

**Différence entre `commit` et `push`**

| `git commit` | `git push` |
| --- | --- |
| Enregistre les modifications dans l'historique local. | Envoie les commits vers le dépôt distant. |
| Ne nécessite pas de connexion à GitHub. | Nécessite une connexion et les autorisations nécessaires. |
| Crée un point de sauvegarde dans Git. | Partage les commits avec les autres membres de l'équipe. |

## Exercice 5 – Branches individuelles

Chacun crée sa branche à partir d'un `main` à jour et vérifie la branche active.

**Étudiant A** – `feature/accueil`

![Branche A](screenshots/ex5-A.png)

**Étudiant B** – `feature/etudiants`

![Branche B](screenshots/ex5-B.jpeg)

**Étudiant C** – `feature/projets`

![Branche C](screenshots/ex5-C.jpeg)

**Étudiant D** – `feature/style`

![Branche D](screenshots/ex5-D.jpeg)

## Exercice 6 – Développement en parallèle

**Étudiant A** – navigation dans `index.php`

![Dev A](screenshots/ex6-A.png)

**Étudiant B** – tableau PHP de 3 étudiants dans `etudiants.php`

![Dev B (1)](screenshots/ex6-B-1.jpeg)

![Dev B (2)](screenshots/ex6-B-2.jpeg)

**Étudiant C** – liste de projets dans `projets.php`

![Dev C](screenshots/ex6-C.jpeg)

**Étudiant D** – `style.css`

![Dev D](screenshots/ex6-D.jpeg)

## Exercice 7 – Pull Requests et revue de code

### 1–2. Création des Pull Requests et revue (A → B → C → D → A)

**Étudiant A**

![PR A](screenshots/ex7-pr-A.png)

**Étudiant B**

![PR B](screenshots/ex7-pr-B.png)

**Étudiant C**

![PR C](screenshots/ex7-pr-C.png)

**Étudiant D**

![PR D](screenshots/ex7-pr-D.png)

### 3. Fusion des Pull Requests après validation

**Étudiant A**

![Merge A](screenshots/ex7-merge-A.png)

**Étudiant B**

![Merge B](screenshots/ex7-merge-B.jpeg)

**Étudiant C**

![Merge C](screenshots/ex7-merge-A.png)

**Étudiant D**

![Merge D](screenshots/ex7-merge-D.jpeg)

### 4. Mise à jour de la branche `main` locale (`git pull`)

**Étudiant A**

![Pull A](screenshots/ex7-pull-A.png)

**Étudiant B**

![Pull B](screenshots/ex7-pull-B.jpeg)

**Étudiant C**

![Pull C](screenshots/ex7-pull-C.jpeg)

**Étudiant D**

![Pull D](screenshots/ex7-pull-D.jpeg)

### 5. Intérêt d'une Pull Request par rapport à un push direct sur `main`

- **Revue de code** : un autre membre relit et commente avant l'intégration, ce qui détecte les erreurs tôt.
- **`main` reste stable** : seul du code validé y est fusionné.
- **Traçabilité** : la discussion, les commentaires et les décisions sont conservés dans la Pull Request.
- **Collaboration** : chacun travaille sur sa branche sans écraser le travail des autres.
- **Contrôle** : possibilité d'exiger des validations ou des tests avant la fusion.

## Exercice 8 – Conflit de fusion contrôlé

### Création et commit de `configuration.txt` (Étudiant A, sur `main`)

![configuration.txt initial](screenshots/ex8-config-initial.png)

### Étudiant B modifie la ligne « Version » sur sa branche et pousse

![Modification B](screenshots/ex8-B-modif.jpeg)

### Étudiant C modifie la même ligne sur sa branche

![Modification C (1)](screenshots/ex8-C-modif-1.jpeg)

![Modification C (2)](screenshots/ex8-C-modif-2.jpeg)

### C publie sa branche et fusionne sa Pull Request dans `main`

![PR C fusionnée](screenshots/ex8-C-pr-merge.jpeg)

### B récupère `origin/main` et lance la fusion dans sa branche

![Fetch et merge B](screenshots/ex8-B-fetch-merge.jpeg)

### Le conflit

![Conflit](screenshots/ex8-conflit.jpeg)

### Résolution : ligne commune « Version : 3.0 - Version collaborative »

![Résolution](screenshots/ex8-resolution.jpeg)

### Push de la branche de B vers GitHub

![Push B](screenshots/ex8-B-push.jpeg)

### Pull Request et fusion dans `main`

![PR B](screenshots/ex8-B-pr.jpeg)

![Fusion dans main](screenshots/ex8-merge-main.jpeg)

Contenu final de `configuration.txt` :

```
Nom du projet : ISI Student Manager
Version : 3.0 - Version collaborative
Responsable : Groupe ISI
```

## Exercice 9 – Vérification et livrables

### Historique graphique des commits et des branches

```bash
git log --oneline --graph --all
```

![Historique graphique](screenshots/ex9-historique.png)

### `main` à jour

![main à jour](screenshots/ex9-status-main.png)

### L'application fonctionne

![Application 1](screenshots/ex9-app-1.png)

![Application 2](screenshots/ex9-app-2.png)

![Page projets](screenshots/ex9-app-projets.png)

---

## 5. Livrables

- **URL du dépôt GitHub du groupe** : https://github.com/Mahjoub07/ISI-Student-Manager-Groupe3
- **README.md** : ce fichier (membres, installation, exécution et déroulement des tâches).
