# Application de gestion des stages

Application Symfony 7.4 pour la gestion de stages, d'étudiants, d'entreprises et de visites.

## Pré-requis

- PHP 8.2
- Composer
- Symfony CLI
- MySQL (de préférence, sur phpmyadmin)

## Installation

1. Cloner le dépôt ou télécharger le .zip:

```bash
git clone <url-du-repository>
cd ProjetE6
```

OU

```bash
Code -> Download ZIP
```

2. Installer les dépendances:

```bash
composer install
```

3. Importer la base de données

```bash
Chercher le fichier gkvstage.sql dans le dossier SQL
Importer ce fichier dans un SGBDR (de préférence, phpmyadmin)
```

## Lancer l'application

```bash
symfony server:start
```

Puis ouvrir:

```text
http://127.0.0.1:8000
```
