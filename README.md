IFabrikator CMS Core
========================

Welcome to the IFabrikator CMS Core - a basic concept project for
building CMS applications based on Symfony 2 Standard Edition


1) Basic concepts
----------------------------------

Any internet based application or a site can be looked at as a hierarchical list of
web pages (sections and subsections). A web page is a very simple structure consisting of:

  * Page title

  * Meta-keywords and meta-description tags

  * Breadcrumbs

  * Menus

  * One or more content areas

The appearance  of a web page is determined by an html-template and css files.

Thus a web page at data level can be easily presented by a number of database
table fields:

    CREATE TABLE `Page` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `parent_id` int(11) DEFAULT NULL,
        `site_id` int(11) DEFAULT NULL,
        `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `language` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
        `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `is_active` tinyint(1) NOT NULL,
        `is_logon_required` tinyint(1) NOT NULL,
        `url` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
        `redirect` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
        `meta_description` longtext COLLATE utf8_unicode_ci NOT NULL,
        `meta_keywords` longtext COLLATE utf8_unicode_ci NOT NULL,
        `template` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        PRIMARY KEY (`id`),
        KEY `IDX_B438191E727ACA70` (`parent_id`),
        KEY `IDX_B438191EF6BD1646` (`site_id`),
        CONSTRAINT `FK_B438191EF6BD1646` FOREIGN KEY (`site_id`) REFERENCES `Site` (`id`),
        CONSTRAINT `FK_B438191E727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `Page` (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci


2) Installation
-------------------------------------

### Use Composer (*recommended*)

As Symfony uses [Composer][2] to manage its dependencies, the recommended way
to create a new project is to use it.

If you don't have Composer yet, download it following the instructions on
http://getcomposer.org/ or just run the following command:

    curl -s http://getcomposer.org/installer | php

Then, use the `create-project` command to generate a new Symfony application:

    php composer.phar create-project symfony/framework-standard-edition path/to/install

Composer will install Symfony and all its dependencies under the
`path/to/install` directory.

### Download an Archive File

To quickly test Symfony, you can also download an [archive][3] of the Standard
Edition and unpack it somewhere under your web server root directory.

If you downloaded an archive "without vendors", you also need to install all
the necessary dependencies. Download composer (see above) and run the
following command:

    php composer.phar install

### Create database

After finishing it you will have to create a database and put its connection parameters into parameters.yml
(must be first created from parameters.yml.dist)

Then create database tables:

    php app/console doctrine:schema:update --force


### Install fixtures

And load the project fixtures:

    php app/console doctrine:fixtures:load


### Configure your web-server

Create a virtual host in your web-server config with the name of symbare.ifedor.loc (comes with fixtures). You
are free to change it afterwards.

3) And some more
--------------------------------

Congratulations! You're now ready to use Symfony.

From the `config.php` page, click the "Bypass configuration and go to the
Welcome page" link to load up your first Symfony page.

You can also use a web-based configurator by clicking on the "Configure your
Symfony Application online" link of the `config.php` page.

To see a real-live Symfony page in action, access the following page:

    web/app_dev.php/demo/hello/Fabien

4) Getting started with Symfony
-------------------------------

This distribution is meant to be the starting point for your Symfony
applications, but it also contains some sample code that you can learn from
and play with.

A great way to start learning Symfony is via the [Quick Tour][4], which will
take you through all the basic features of Symfony2.

Once you're feeling good, you can move onto reading the official
[Symfony2 book][5].

A default bundle, `AcmeDemoBundle`, shows you Symfony2 in action. After
playing with it, you can remove it by following these steps:

  * delete the `src/Acme` directory;

  * remove the routing entry referencing AcmeDemoBundle in `app/config/routing_dev.yml`;

  * remove the AcmeDemoBundle from the registered bundles in `app/AppKernel.php`;

  * remove the `web/bundles/acmedemo` directory;

  * remove the `security.providers`, `security.firewalls.login` and
    `security.firewalls.secured_area` entries in the `security.yml` file or
    tweak the security configuration to fit your needs.

What's inside?
---------------

The Symfony Standard Edition is configured with the following defaults:

  * Twig is the only configured template engine;

  * Doctrine ORM/DBAL is configured;

  * Swiftmailer is configured;

  * Annotations for everything are enabled.

It comes pre-configured with the following bundles:

  * **FrameworkBundle** - The core Symfony framework bundle

  * [**SensioFrameworkExtraBundle**][6] - Adds several enhancements, including
    template and routing annotation capability

  * [**DoctrineBundle**][7] - Adds support for the Doctrine ORM

  * [**TwigBundle**][8] - Adds support for the Twig templating engine

  * [**SecurityBundle**][9] - Adds security by integrating Symfony's security
    component

  * [**SwiftmailerBundle**][10] - Adds support for Swiftmailer, a library for
    sending emails

  * [**MonologBundle**][11] - Adds support for Monolog, a logging library

  * [**AsseticBundle**][12] - Adds support for Assetic, an asset processing
    library

  * **WebProfilerBundle** (in dev/test env) - Adds profiling functionality and
    the web debug toolbar

  * **SensioDistributionBundle** (in dev/test env) - Adds functionality for
    configuring and working with Symfony distributions

  * [**SensioGeneratorBundle**][13] (in dev/test env) - Adds code generation
    capabilities

  * **AcmeDemoBundle** (in dev/test env) - A demo bundle with some example
    code

All libraries and bundles included in the Symfony Standard Edition are
released under the MIT or BSD license.

Enjoy!

[1]:  http://symfony.com/doc/2.3/book/installation.html
[2]:  http://getcomposer.org/
[3]:  http://symfony.com/download
[4]:  http://symfony.com/doc/2.3/quick_tour/the_big_picture.html
[5]:  http://symfony.com/doc/2.3/index.html
[6]:  http://symfony.com/doc/2.3/bundles/SensioFrameworkExtraBundle/index.html
[7]:  http://symfony.com/doc/2.3/book/doctrine.html
[8]:  http://symfony.com/doc/2.3/book/templating.html
[9]:  http://symfony.com/doc/2.3/book/security.html
[10]: http://symfony.com/doc/2.3/cookbook/email.html
[11]: http://symfony.com/doc/2.3/cookbook/logging/monolog.html
[12]: http://symfony.com/doc/2.3/cookbook/assetic/asset_management.html
[13]: http://symfony.com/doc/2.3/bundles/SensioGeneratorBundle/index.html
