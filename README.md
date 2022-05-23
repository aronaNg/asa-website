# asa-app

#Prerequisites

Download composer : https://getcomposer.org/

Symfony 5.4 : https://symfony.com/doc/5.4/setup/

PHP >=7.2.5

#Please follow these steps to launch the app locally

💡 git clone https://github.com/stages-asa-app/asa-app.git

💡 Install npm :  sudo apt-get install -y npm

💡 Install dependencies : composer install

💡 Configure your .env file according to the database you are using.
   Hint: the line starts with #DATABASE. Uncomment the one you are using.

💡 Create database : php bin/console doctrine:database:create OR php bin/console d:d:c

💡 Use fixtures or faker : php bin/console doctrine:fixtures:load OR php bin/console d:f:l

💡 Do database migrations with this 2 commands

    1- php bin/console make:migrations

    2- php bin/console doctrine:migrations:migrate
  
💡 To update the database : php bin/console d:s:u


:white_check_mark: launch the app and enjoy 🧑‍💻 : symfony serve

💥 Important: If you are having problems with the "build", check if you have the public/build folder which contains files. Otherwise do "npm run" and take one of the indicated choices
