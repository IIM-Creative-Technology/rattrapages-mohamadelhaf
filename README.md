[![Review Assignment Due Date](https://classroom.github.com/assets/deadline-readme-button-24ddc0f5d75046c5622901739e7c5dd533143b0c8e959d652212380cedb1ea36.svg)](https://classroom.github.com/a/r0yr3kAI)
steps:
commands que j'ai fais;
(cloned the project)
git init
git clone

(create the folder and setup the project):
composer create-project laravel/laravel laravel(create)
composer require --dev barryvdh/laravel-ide-helper(helper-ide)
php artisan migrate(migrate with the database)(mysql)
php artisan serve to run the server
php artisan breeze:install with vue.js
php artisan migrate
npm install
npm run dev

docs:
cours et video du prof
laravel documentation


outil:
vue.js,
laragon,
phpmyadmin,
vs code,

created the form to select a table from the dropdown list,
created the database for the selected_tables table,
using this command:php artisan make:migration create_selected_tables_table(it creates a new migration file)
then  run the command php artisan migrate to create the table,
then  create the SelectedTable model using the following command:
php artisan make:model SelectedTable
then  create the tableController
add the post route in web.php to make a post request to the database