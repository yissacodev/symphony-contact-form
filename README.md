# Symphony Form Contact project

## How to run ?
1. <p>Download PHP versión > 7.x.x </p>
2. <p>Download XAMP or WAMP</p>
3. <p>Download and install Composer</p>

## Clone Git repository
One time you have all software installed you must clone this repository to your Project Folder
then you'll open a terminal into folder:

1. Composer install
2. Create your database MySql
3. You should configurate the .env file and put here the Database name, user and password

## Start The project
Insert:
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force
php bin/console doctrine:fixtures:load
