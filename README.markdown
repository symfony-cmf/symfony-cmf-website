# Symfony2 CMF Website

## Installation

To get the website running, first clone the repository:

    $ git clone git://github.com/symfony-cmf/symfony-cmf-website.git
    $ cd symfony-cmf-website

### Get vendors

#### With Git 1.6+

    $ git submodule update --init --recursive

#### With Git 1.5

You should see a update_vendor.sh script, make sure it is executable and run it:

    $ chmod 0777 update_vendor.sh
    $ ./update_vendor.sh

## Run tests

    You need PHPUnit 3.5 installed

    $ phpunit -c frontend
