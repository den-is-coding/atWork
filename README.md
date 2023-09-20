

# About AtWorkProject

This project implements a Rest api with CRUD operations for members, companies and comments models.

# Technology stack

- Programming language: [PHP 8.2](https://www.php.net/releases/8.2/ru.php)
- Framework: [Laravel 10](https://laravel.com/docs/10.x/releases)
- Database: [MySQL 8.0.34](https://www.mysql.com/)
- Dependency management: [Composer 2.6.3](https://getcomposer.org/)
- Test API: [Postman 10.18.3](https://www.postman.com/)

# Project structure

## Database settings

All database settings are set in the file .env 

## Models
All model files are located in the directory "app/Models".

They contain fields of models and functions for creating relations between models.

## Migrations

All migration files are located in the directory "database/migrations".
    
## Controllers

All controllers' files are located in the directory "app/Http/Controllers".
The files contain methods for implementing CRUD operations with data and their validation.

## Routes
All routes are specified in the file "routes/api.php".

## Postman collection

File "REST_APT.postman_collection.json" with Postman collection for testing API is located project Root directory.

# Installation and launching server

1. Install MySQL and create database
2. Install PHP 8.2
3. Install Composer
4. Migrate database with command "php artisan migrate" in Terminal
5. Edit database variables\
   DB_CONNECTION=mysql\
   DB_HOST=\
   DB_PORT=\
   DB_DATABASE=\
   DB_USERNAME=\
   DB_PASSWORD=\
   in .env to configure database connection
6. Launch server with command "php artisan serve" in terminal
7. Install Postman for testing API
8. import collection "REST_APT.postman_collection.json"

# Features

- Database with tables for Members, Companies, Comments relations between models.
- CRUD operations for all models
- Get company comments by ID
- validate data for all models

# API Endpoints

### **To test the API, there is a Postman collection in the root directory of the project.**

## Members

### GET

http://localhost:8000/api/members

Returns all records from the members' database.\
Does not accept any parameters.\
Implemented using the function index() in MemberController.

http://localhost:8000/api/members/id

Returns record with field "id" = id from the members' database.\
Does not accept any parameters.\
Implemented using the function show() in MemberController.

### POST

http://localhost:8000/api/members

Add record to the database.\
Returns data of the added record and Response Code.\
Requires the following parameters:
- name
- surname
- phone_number
- avatar

**All parameters accept data corresponding to validation rules.**\
Implemented using the function store() in MemberController.

### PUT

http://localhost:8000/api/members/id

Change data of the record with "id" = id in the database.\
Returns data of the added record and Response Code.\
Requires the following parameters:
- name
- surname
- phone_number
- avatar

**All parameters accept data corresponding to validation rules.**\
Implemented using the function update() in MemberController.

### DELETE

http://localhost:8000/api/members/id

Delete record with "id" = id in the database.\
Returns Response Code.\
Implemented using the function destroy() in MemberController.


## Companies

### GET

http://localhost:8000/api/companies

Returns all records from the companies' database.\
Does not accept any parameters.\
Implemented using the function index() in CompanyController.

http://localhost:8000/api/companies/id

Returns record with field "id" = id from the companies' database.\
Does not accept any parameters.\
Implemented using the function show() in CompanyController.

### POST

http://localhost:8000/api/companies

Add record to the database.\
Returns data of the added record and Response Code.\
Requires the following parameters:
- description
- title
- logo

**All parameters accept data corresponding to validation rules.**\
Implemented using the function store() in CompanyController.

### PUT

http://localhost:8000/api/companies/id

Change data of the record with "id" = id in the database.\
Returns data of the added record and Response Code.\
Requires the following parameters:
- description
- title
- logo

**All parameters accept data corresponding to validation rules.**\
Implemented using the function update() in CompanyController.

### DELETE

http://localhost:8000/api/companies/id

Delete record with "id" = id in the database.\
Returns Response Code.\
Implemented using the function destroy() in CompanyController.

## Comments

http://localhost:8000/api/comments

### GET

http://localhost:8000/api/comments

Returns all records from the comments' database.\
Implemented using the function index() in CommentController.

http://localhost:8000/api/comments/id

Returns record with field "id" = id from the comments' database.\
Does not accept any parameters.\
Implemented using the function show() in CommentController.

http://localhost:8000/api/comments?company_id=1

Accept parameter "company_id" and returns all records in database with "company_id" = company_id.\


### POST

http://localhost:8000/api/comments

Add record to the database.\
Returns data of the added record and Response Code.\
Requires the following parameters:
- content
- score
- member_id
- company_id

**All parameters accept data corresponding to validation rules.**\
Implemented using the function store() in CommentController.

### PUT

http://localhost:8000/api/comments/id

Change data of the record with "id" = id in the database.\
Returns data of the added record and Response Code.\
Requires the following parameters:
- content
- score
- member_id
- company_id

**All parameters accept data corresponding to validation rules.**\
Implemented using the function update() in CommentController.

### DELETE

http://localhost:8000/api/comments/id

Delete record with "id" = id in the database.\
Returns Response Code.\
Implemented using the function destroy() in CommentController.



