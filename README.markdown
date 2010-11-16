# Symfony2 CMF Website

## Installation

To get the website running, first clone the repository:

    $ git clone git://github.com/symfony-cmf/symfony-cmf-website.git
    $ cd symfony-cmf-website

### Get vendors

    $ php bin/vendors install

### Create a parameters file

    $ cp app/config/parameters.ini.dist app/config/parameters.ini

### Setup your permissions - see [Setting up Permissions](http://symfony.com/doc/current/book/installation.html#configuration-and-setup).

## Run tests

    You need PHPUnit 3.5 installed

    $ phpunit -c app
