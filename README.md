# asa-app

#Prerequisite

Download composer : https://getcomposer.org/

Symfony 5.4 : https://symfony.com/doc/5.4/setup/

PHP >=7.2.5

Install npm :  sudo apt-get install -y npm

Install dependencies : composer install

Create database : php bin/console doctrine:database:create

Update the database with this 2 commands

  php bin/console make:migrations

  php bin/console migrations:migrate


launch application : symfony serve
