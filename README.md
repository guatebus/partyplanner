PartyPlanner
=============

This is a Symfony 2.4 application.

Installation instructions are as follows:

1. unpack the zip.
2. composer is used to manage the project's dependencies. If you don't have composer installed, install it
   on the application's root dir (https://getcomposer.org/download/)
3. run 'php composer.phar install' from the root dir
4. assetic is used to handle the project's assets. Run 'app/console assetic:dump && app/console assets:install' to install all assets.
5. if you did not install the application inside your web directory's document root, add a vhost config, restart
   your server service and edit your /etc/hosts file (eg. add a new host 'partyplanner.dev')
6. make sure your web server has write permissions in the app/cache and app/logs directories
7. update the database-related parameters on the app/config/parameters.yml file (the project uses the mysql db)
8. install the db and fixtures by running on the application root folder the following:
   'app/console doctrine:database:drop --force && app/console doctrine:database:create && app/console doctrine:schema:create && app/console doctrine:fixtures:load --append'
9. browse to the application (http://partyplanner.dev/app_dev.php)


Public side of application:

accessible at: http://partyplanner.dev/app_dev.php

* RSVP feature is not complete yet

Private side of application

accessible at: http://partyplanner.dev/app_dev.php/login

login with credentials: 'admin' / 'admin'

All actions inside the /admin/party route are active (though layout is not constant all-around, due to time constraints)