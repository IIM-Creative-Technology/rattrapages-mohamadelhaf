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

fixed the cart logic, 
now when we press on a card category, we will see a notification that the category is successfully added to the cart, and when we open the cart_items table, we can see the category_id

added items successfully to cart,
show the total of items in the cart


added clear button in the cart to remove the items,
added the checkout button that send the cart id to the cart table


fixed the structure of the page, 
clear cart on checkout
confirmation of the checkout
redirect to the home page on checkout

made the tables dynamic,
updated the migration file for the tables, the model and the controller, also the routes
fetched the tables from the tables_table in the database,
created the seeder to seed the tables_table in the database: php artisan db:seed --class=CategoriesTableSeeder  ,
added the boolean field to see if a table is reserved,
added the pics,

added toastification for cart checkout and error while toast checkout
clean code




video link:https://www.loom.com/share/bee555e20c85428dbc68fecb1a9cdea9


