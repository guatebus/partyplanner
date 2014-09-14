PartyPlanner
=============

This is a Symfony 2.4 application.

Installation instructions are as follows:

1. Unpack the zip.
2. Composer is used to manage the project's dependencies. If you don't have composer installed, install it
   on the application's root dir (https://getcomposer.org/download/)
3. Rrom the application's root dir run:

    'php composer.phar install'

4. Assetic is used to handle the project's assets. Run
    'app/console assetic:dump && app/console assets:install'
   to install all assets.
5. If you did not install the application inside your web directory's document root, add a vhost config, restart
   your server service and edit your /etc/hosts file (eg. add a new host 'partyplanner.dev')
6. Make sure your web server has write permissions in the app/cache and app/logs directories
7. Update the database-related parameters on the app/config/parameters.yml file (the project uses the mysql db)
8. Install the db and fixtures by running on the application root folder the following:

    'app/console doctrine:database:drop --force && app/console doctrine:database:create && app/console doctrine:schema:create && app/console doctrine:fixtures:load --append'

9. Browse to the application (http://partyplanner.dev/app.php)


** Access the debug environment using app_dev.php instead of app.php in your urls (to see more verbose output if you should encounter any issue)



Public side of application:

    accessible at: http://partyplanner.dev/app.php

Private side of application

    accessible at: http://partyplanner.dev/app.php/login

    login with credentials: 'admin' / 'admin'

    All actions inside the /admin/party route are active (though layout is not constant all-around, due to time constraints)
