[![Review Assignment Due Date](https://classroom.github.com/assets/deadline-readme-button-24ddc0f5d75046c5622901739e7c5dd533143b0c8e959d652212380cedb1ea36.svg)](https://classroom.github.com/a/r0yr3kAI)
</br>
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

created the categories page,
created the database for the categories using the make:migration command
created the categoriesController.php using the make:controller command
created the categories.php model using the make:model command
seeding the database with data using the following command:php artisan db:seed --class=CategoriesTableSeeder
migrating with the database,
created the categories.vue component
adding the specefic routes for the categories page in web.php
created the categotiesLayout.vue

created cart controller
created cart.js
created cart.vue 
created the tables cart_table, and cart_items_table
did the migrations


