# Symfony2 CMF Website

### You will need:
  * Git 1.6+
  * PHP 5.3.3+
  * php5-intl
  * phpunit 3.6+ (optional)
  * composer

## Installation
To get the website running, first clone the repository:

    $ git clone git://github.com/symfony-cmf/symfony-cmf-website.git
    $ cd symfony-cmf-website

## Get the code

    $ curl -s http://getcomposer.org/installer | php --
    $ php composer.phar install

This will fetch the vendors and all it's dependencies.

The next step is to setup the database:

    app/console doctrine:database:create
    app/console doctrine:phpcr:init:dbal
    app/console doctrine:phpcr:repository:init
    app/console doctrine:phpcr:fixtures:load

### Setup your permissions - see [Setting up Permissions](http://symfony.com/doc/current/book/installation.html#configuration-and-setup).
[![StyleCI](https://styleci.io/repos/806312/shield)](https://styleci.io/repos/806312)
For Mac Os X users, when changing the owner of the cache folder, use '_www' instead of www-data.

## Access by web browser

Create an apache virtual host entry along the lines of

    <Virtualhost *:80>
        Servername http://cmf-website.lo
        DocumentRoot /path/to/symfony-cmf/symfony-cmf-website/web
        <Directory /path/to/symfony-cmf/symfony-cmf-website>
            AllowOverride All
        </Directory>
    </Virtualhost>

And add an entry to your hosts file for "cmf-website.lo"

If you are running Symfony2 for the first time, run http://simple-cms.lo/config.php to ensure your
system settings have been setup inline with the expected behaviour of the Symfony2 framework.

Then point your browser to http://cmf-website.lo/app_dev.php

## Run tests

Functional tests are written with PHPUnit. Note that Bundles and Components are tested independently.

    app/console doctrine:phpcr:workspace:create standard_test
    phpunit -c app
