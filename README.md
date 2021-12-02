## Подготовка

Vagrant. Если нет, то скачиваем: [www.vagrantup.com/downloads](https://www.vagrantup.com/downloads) <br>
PhpStorm с root-правами:<br>
File -> Settings -> Tools -> Vagrant <br>
в разделе «Environment variables» добавляем <code>SUDO_ASKPASS</code> с путем <code>/usr/bin/ssh-askpass</code>

## Установка

1. ```sh
   $ composer install
   ```

2. ```sh
   $ php init
   ```

3. ```sh
   $ cp vagrant/config/vagrant-local.example.yml vagrant/config/vagrant-local.yml
   ```
   редачим <code>vagrant-local.yml</code> (github_token)<br><br>

4. В файле<br>
   <code>common/config/main-local.php</code><br>
   редактируем доступы к БД, данные берем из<br>
   <code>vagrant/provision/once-as-root.sh</code>
5. ```sh
   $ vagrant up
   ```

### в PhpStorm:
Settings -> Directories -><br>
пометить <code>Excluded</code> папки:

    .vagrant
    vagrant
    console/runtime
    backend/runtime
    backend/web/assets
    frontend/runtime
    frontend/web/assets

пометить <code>Sources</code> папки:

    backend
    common
    console
    frontend

пометить <code>Tests</code> папки:

    backend/tests
    common/tests
    frontend/tests

<br>
Settings -> PHP -> CLI Interpreter -> добавляем из адреса [/usr/bin/php]<br><br>
Settings -> PHP -> Test Frameworks -> проверить чтоб codeception был настроен

### Создание нового подобного проекта:

    composer global require “fxp/composer-asset-plugin:^1.3.1”
    composer create-project --prefer-dist yiisoft/yii2-app-advanced PROJECT_NAME

### не забыть:
0:39, мой composer.json отличается:<br>
<code>"codeception/base": "^2.2.3",</code><br>
<code>"codeception/verify": "~0.3.1",</code><br><br>
 
Эмулятор packagist для фронта: [asset-packagist.org](https://asset-packagist.org/)
<br><br>


### ДАЛЕЕ НЕ НУЖНО

<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Advanced Project Template</h1>
    <br>
</p>

Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![build](https://github.com/yiisoft/yii2-app-advanced/workflows/build/badge.svg)](https://github.com/yiisoft/yii2-app-advanced/actions?query=workflow%3Abuild)

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
