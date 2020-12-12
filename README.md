#This is the basic setup before start a project.

```
$ ssh-keygen 
Generating public/private rsa key pair.
RSA key stored at (/Users/UserName/.ssh/id_rsa)
```

## Setup local development.
1. Install those programs for windows  
* Git - https://git-scm.com/downloads  
* virtualbox - https://www.virtualbox.org/wiki/Downloads  
* vagrant - http://www.vagrantup.com/downloads.html  
* vagrant increase performance: https://stackoverflow.com/questions/50614748/laravel-homestead-vagrant-virtualbox-is-slow-on-windows  
* Node - https://nodejs.org/en/  

2. Open window git bash (with admin permission) and type

        vagrant box add laravel/homestead --provider=virtualbox
        git clone https://github.com/laravel/homestead.git ~/Homestead
        cd ~/Homestead
        git checkout release //latest stable version
        init.bat  // Windows...

For more details guide (optional)
https://laravel.com/docs/7.x/homestead

You need to update your homestead.yaml file before start virtual box.
File was located at "C:\Users\{PC_NAME}\Homestead.yaml"
Copy some configuration to Homestead. (Check file provided in email)
Remember to add guest IP into C:\Windows\System32\drivers\etc\hosts as below

```
192.168.10.10  ezentry.test

```

3. Open window git bash (with admin permission) and type

        cd homestead
        vagrant up #Start virtualbox in guest window

## In guest window.
1. Setup desktop manager for faster development, you can choose your own prefer, such as xfce, gnome, kde and so on.
    1. Login into homestead via virtualbox ~ username: vagrant, password:vagrant

            sudo apt-get update                                        #update ubuntu before install      
            sudo apt-get install xfce4 xorg
            startx                                                 #after startx, desktop show appeared

## Cloning project
After homestead started, Go ahead and run:

```
$ cd code //cd into your laravel directory
$ git clone git@github.com:iammh93/ez_entry.git
$ cd ezentry
$ git checkout master
$ cp .env.example .env
$ composer install
$ npm install && npm run dev
$ php artisan key:generate #if key does not generated after composer install
```

## Database Migration

```
mysql -u homestead -p                                         #password: secret
CREATE DATABASE ezentry;                                      #create database ezentry if does not existed
exit
php artisan migrate                                           #migrate core database
php artisan db:seed                                           #seed core database and admin account
```
In host, open browser and enter "www.ezentry.test", Website is online now

## Unit-test ##
1.  Setup Test Environment, login to mysql to create test databases

        mysql -u homestead -p;
        create database ezentry_testing;
2.  phpunit
