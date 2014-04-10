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


### Dynamic routing

The classic MVC concept implies a configuration fixed route. When the request hits the route it is dispatched
to the corresponding and again firmly fixed controller method.

When building a CMS this inflexible relation between route and controller method is a problem.
The actual web resource is structured by a site administrator with the help of
an administrative interface. So dynamic routing becomes a must.

Now what if we need several different types of content being placed on the same web page:
i.e. a text and a feedback form? By the way, we would prefer the types of content and their
order to be again decided by site administrator. Later we could change our mind and think of
the feedback form for example to be placed on a different page. How do we achieve that without
making changes to the controller source code?

### ApplicationController

IFabrikator provides a one and only entry point for all requests - ApplicationController.
This is a standard Symfony 2 controller class which dispatches all the requests to our
application (site) except other standard controllers, routes to which are placed above
the ApplicationController route in routing.yml.

### "Controls" and the "forward" method

A "control" is a functional unit placed on a web page. It can be referred to as a mini web
application. For instance a control can display a news list or an authorization form.
In the administrative interface we can see controls that display or edit the site's
page tree, user permissions and so on.

A control is relatively independent from a web page. In theory there should be no
problem to move a control to another place of a web page or to a different web page.
It can be deactivated or removed from page. A web page can contain one or more controls or
even contain none. In the world of Java this kind of mini web applications is called
portlets.

Thus form the IFabrikator CMS's point of view there are pages (Page entities in program code and DB)
which represent a site's structure and controls placed on these pages (Control entities). A web resource
functionality is determined by presence of controls of different types attached to pages.


ApplicationController calls other controller classes (Control entities) using standard "forward"
method.



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


[1]:  http://symfony.com/doc/2.3/book/installation.html
[2]:  http://getcomposer.org/
[3]:  http://symfony.com/download
