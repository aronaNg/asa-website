# asa-app

#Prerequisite

Download composer : https://getcomposer.org/

Symfony 5.4 : https://symfony.com/doc/5.4/setup/

PHP >=7.2.5

Install npm :  sudo apt-get install -y npm

Install dependencies : composer install

Create database : php bin/console doctrine:database:create

Update the database with this 2 commands

  1 php bin/console make:migrations

  2 php bin/console doctrine:migrations:migrate


launch application : symfony serve
