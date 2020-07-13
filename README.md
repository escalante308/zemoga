## Zemoga Twitter App

This is a simple application to test some features using Laravel.

## Installation and Execution

### Software Prerequisites

This application runs on PHP7.4 and uses a MySQL database. It requires the same extensions that the Laravel base application uses. Also you need to use a server like Nginx or Apache to serve the files and configure the Virtual Host to access the application from a browser. In this development i used Nginx and this is the virtual host file that I created to access the app.

    server {
        listen 80 default_server;
        listen [::]:80 default_server;
        access_log /var/log/nginx/laravel-access.log;
        error_log  /var/log/nginx/laravel-error.log;
        root /home/vega/zemoga/public;
        index index.php index.html index.htm;
        server_name _;

        location / {
            try_files $uri $uri/ /index.php?$query_string;
        }

        location ~ \.php$ {
            try_files $uri =404;
            fastcgi_split_path_info ^(.+\.php)(/.+)$;
            fastcgi_index index.php;
            fastcgi_pass unix:/run/php/php7.4-fpm.sock;
            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
            include fastcgi_params;
        }
    }

### Installation

First, you need to create a MySQL database, so the application can create all the Database Schema on it. If you have root credentials, you can run these commands to enter to the MySQL console manager and create the database.

    mysql -u root -p
    <enter root password>
    mysql> create database zemoga;
    mysql> exit;

Clone this repo on your local environment using the following command

    git clone https://github.com/escalante308/zemoga.git


And enter on the 'zemoga' folder, where the files were downloaded

    cd zemoga

Then we need to setup the environment variables, so first we run

    cp .env.example .env

Edit the .env file with your favorite text editor and change these values

    DB_DATABASE=zemoga
    DB_USERNAME=root
    DB_PASSWORD=<root password>

    TWITTER_CONSUMER_KEY="<twitter consumer key>"
    TWITTER_CONSUMER_SECRET="<twitter consumer secret>"
    TWITTER_ACCESS_TOKEN="<twitter access token>"
    TWITTER_ACCESS_TOKEN_SECRET="<twitter access token secret>"

and close your editor.

After this, we will change the folder permissions for access

    sudo chown -R $USER:www-data storage
    sudo chown -R $USER:www-data bootstrap/cache
    chmod -R 775 storage
    chmod -R 775 bootstrap/cache

Then you have to run the Composer install command to download the dependences and configure the settings

    composer install

After that, we need to run the migration process to create the database schema and the data seeders

    php artisan migrate
    php artisan db:seed

And create the Application Key running

    php artisan key:generate

In this point you will be able to access the application using your browser, depending on the method you selected to serve the files (Docker, VM, Local Installation, Cloud Deployment), you need to access to a different URL. In my case, i should go to

    https://localhost

Additionally, you can run the Unit tests to check if the different features are working as expected

    php artisan test

### Technologies Used

- Laravel 7.0
- PHP 7.4
- Mysql 8.0
- Atymic/Twitter as the library to connect to the Twitter API (https://github.com/atymic/twitter/)
- Bootstrap 4.5
- PHPUnit

### Time Details

- Saturday July 11
    - Environment creation / Basic Features / Design / Database Schema : 8 hours
- Sunday July 12
    - Unit Tests / API Endpoints / Environment Settings: 6 hours
  
Total Time: 14 hours

## Database Table Schema (Portfolios Table)

    create table if not exists portfolios
    (
	    idportfolio int unsigned auto_increment primary key,
	    description varchar(255) null,
	    image_url varchar(255) null,
	    twitter_user_name varchar(255) null,
	    title varchar(255) null,
    	imageURL varchar(255) null,
	    twitterUserName varchar(255) null,
	    imag_url varchar(255) null,
	    created_at timestamp null,
	    updated_at timestamp null 
    )
    collate=utf8mb4_unicode_ci;