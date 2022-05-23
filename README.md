# asa-app

#Prerequisite

Download composer : https://getcomposer.org/

Symfony 5.4 : https://symfony.com/doc/5.4/setup/

PHP >=7.2.5

#Please follow these steps to launch the app locally

:white_check_mark: git clone https://github.com/stages-asa-app/asa-app.git

:white_check_mark: Install npm :  sudo apt-get install -y npm

:white_check_mark: Install dependencies : composer install

:white_check_mark: Create database : php bin/console doctrine:database:create OR php bin/console d:d:c

:white_check_mark: Use fixtures or faker : php bin/console doctrine:fixtures:load OR php bin/console d:f:l

:white_check_mark: Do database migrationss with this 2 commands

  1- php bin/console make:migrations

  2- php bin/console doctrine:migrations:migrate
  
:white_check_mark: To update the database : php bin/console d:s:u


:white_check_mark: launch application : symfony serve
