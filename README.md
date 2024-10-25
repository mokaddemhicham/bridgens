# Bridge ENS Club - Gestion des Événements et Formations

Une application web développée pour le club Bridge ENS pour faciliter la gestion des événements, formations, et cours dispensés par le club. Elle centralise les informations, automatise la gestion des membres et des partenaires, et offre une vue d’ensemble des activités via un tableau de bord convivial.

## Table des Matières
- [Description du Projet](#description-du-projet)
- [Fonctionnalités Principales](#fonctionnalités-principales)
- [Programme du Club](#programme-du-club)
- [Objectifs](#objectifs)
- [Pré-requis](#pré-requis)
- [Démarrage du Projet avec Docker](#démarrage-du-projet-avec-docker)
- [Auteurs](#auteurs)

---

## Description du Projet

L'application web Bridge ENS Club permet de centraliser et de faciliter la gestion des activités du club, incluant les formations, événements et cours. Elle vise à automatiser les processus administratifs pour le club et à fournir une plateforme de gestion simplifiée et intuitive.

### Fonctionnalités Principales

- **Gestion des formations, événements et cours** : Permet aux responsables de planifier et de coordonner facilement toutes les activités du club.
- **Automatisation de la gestion des membres** : Ajout, modification et suppression des membres avec un système informatisé.
- **Gestion des partenaires** : Suivi et gestion des partenaires du club.
- **Tableau de bord** : Vue d’ensemble informative des statistiques et des activités en cours du club.

## Programme du Club

### Côté Développement et Formations
- **Formation en outils bureautique** : Word, Excel, PowerPoint, Access
- **Multimédia** : Photoshop (bases), Adobe Illustrator, Montage vidéo
- **Développement web** : Création de sites web statiques et dynamiques (HTML, CSS, JS, PHP)
- **Programmation** : Langages C et C#, Programmation orientée objet
- **Administration** : Administration réseau, Assistance technique et à distance
- **Préparation aux concours** : Compétitions de programmation pour les étudiants en informatique

### Côté Service Scolaire
- Création de flyers et affiches, maintenance du site web de l’ENS, organisation d’événements et compétitions universitaires, montage et tri de médias, etc.

### Objectifs
- Élever le niveau scientifique des étudiants en informatique.
- Familiariser les étudiants avec les environnements informatiques.
- Organiser des compétitions en groupe pour développer l’esprit d’équipe.
- Représenter l’université dans des manifestations informatiques.

---

## Pré-requis

- **Docker** : Installez [Docker](https://www.docker.com/get-started) pour exécuter l'application dans un environnement conteneurisé.
- **Composer** : Bien que Docker s'occupe de l'installation des dépendances, assurez-vous que Composer est installé si vous travaillez localement.

## Démarrage du Projet avec Docker

1. **Cloner le dépôt**
   ```bash
   git clone https://github.com/username/bridge-ens-club.git
   cd bridge-ens-club
    ```
2. **Créer le fichier `.env`**
Copiez le fichier `.env.example` en `.env` et configurez les variables nécessaires, notamment la connexion à la base de données.

    ```bash
    cp .env.example .env
    ```

3. *Construire et Lancer les Conteneurs Docker*
Assurez-vous d'avoir `docker-compose.yml` et `Dockerfile` configurés pour le projet. Exécutez les commandes suivantes :

    ```bash
    docker-compose up -d --build
    ```

4. *Installer les Dépendances*
Une fois les conteneurs lancés, accédez au conteneur de l’application et installez les dépendances Laravel :

    ```bash
    docker-compose exec app composer install
    ```

5. *Accéder à l'Application*
L'application sera accessible via `http://localhost:8000` (ou un autre port configuré dans le `docker-compose.yml`).

---

## Auteurs
Développé par le club **Bridge ENS**, École Normale Supérieure.