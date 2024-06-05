# Techno Sketch

Techno Sketch is the registration platform for Techno Sketch events

![Alt text](https://technosketch.art/assets/images/logo.png)

# Developer Guide

## Dependencies
- PHP
- Composer
- Mysql
- Redis

### Setup

```powershell
git@github.com:Leapat-mukalla/techno-sketch-laravel.git
cd techno-sketch-laravel
```

Then install the dependencies by runing:

```powershell
composer install
```

#### ENV

```sh
touch .env
```

> Take the keys from one of the current developers and add them to .env

### Migrate DB and Seed data

```bash
php artisan migrate
```

```bash
php artisan db:seed
```

### Run the local server

```bash
php artisan serve
```


### Branches

Note: `main` is the base branch so create a new branch base on main, git tree should be `NewBranch` -> `main`


### Environemtens

- `development`: Development environment
- `test`: Used for unit test
- `production`: End user environment.

### Test cases

```powershell
WIP
```
