# PowerLinks

Les sources du site qui gère des liens vers divers technos lié au web, on peut retrouver cette fonctionnalité sur des messagagerie instanté comme Discord, le soucis c'est qu'il est difficile de retrouver un lien qui nous a intéressé ou même juste les gérer, cette application permet de résoudre cette problématique avec des fonctionnalités supplémentaires.

## Installation

* Récupérer le projet

```bash
$ git clone https://github.com/TuxBoy/PowerLinks.git && cd PowerLinks
```

* Installer les dépendances

```bash
$ composer install
```

* Configurer le .env

```bash
$ cp .env.example .env
```

$ Lancer les tests

```bash
$ ./vendor/bin/phpunit
```

## Déploiement

```bash
$ envoy run deploy

// Ou avec le recalcule de cache twig
$ envoy run deploy --cache

```
