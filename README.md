
# Laravel Add App


## Introduction
This is a simple Laravel App. it helps users to share their adds with others.

### Basic functionalities:
1. Auth:
You can register new account, login with existing one and logout from logged account.

2. Adds:
**As a user:** view, store, update, publish, unpublish (own adds) - view, comment (others' adds)

**As an admin:** view, comment, delete all adds.

3. Users:
**As an admin:** You can (list, activate, deactivate) users' accounts.



## Installation

1. Clone the repository:
```sh
https://github.com/OpadaAlzaiede/add-app.git
```

2. Install all dependencies:
```php
composer install
```

3. Copy .env.example file to .env file:
```sh
cp .env.example .env
```

4. Generate the application key:
```
php artisan key:genetrate
```

5. Setup database enviroment variables in .env file:

6. Run migration files:
```
php artisan migrate:fresh
```

7. to seed needed roles to the database run: 
```
php artisan role:seed
```

8. to create admin account run: 
```
php artisan admin:create
```


9. to seed the database with some data run (optionally):
```
php artisan db:seed
```

** You should create a new database with the name provided to the DB_DATABASE varaiable in you DBMS server **

```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_username_password
```


10. Run the server:
```
php artisan serve
```

