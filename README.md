# Slim Framework RESTful API example application

Use this example application to quickly setup and start working on a new REST API application.
This application uses the latest Slim 3 with the Laravel Database ORM for easier database access
and Phinx migrations for easier schema creation.

This skeleton application was built for Composer. This makes setting up a new Slim Framework application quick and easy.

## Install the Application

Make sure you have Git, PHP, MySQL and Composer already installed and in the search path:

		mysqladmin version -u root -p
		git --version
		php --version
		composer --version

Run this command from the directory in which you want to install your new Slim Framework application:

    git clone https://github.com/itl-modern-web-applications/php-slim-backend.git

Then go to the newly created directory:

		cd php-slim-backend

Then install required dependencies:

		composer install

Then rename .env.example file to .env

		move .env.example .env

Then edit the .env file and set your environment variables

		code .env

Then run the migrations. This will create required table:

    vendor\bin\phinx migrate

And then run your application:

		composer run start
