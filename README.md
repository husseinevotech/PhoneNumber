
## About Me

Hussein El-Hewehii, PHP Full-Stack Developer with 3 years experience:

- [Linked In](https://www.linkedin.com/in/hussein-el-hewehii-768b5a113/).

## Project Description

A Single Page Application That Lists Phone Numbers
- Categorized By: 
    -   Country Name, 
    -   Country Code, 
    -   State(Valid or InValid),
    -   Number
- Filtered By:
    - Country Name
    - State
- Pagination.


## Technologies

### Back-End

- **[PHP 8.0](https://www.php.net/docs.php)**
- **[Laravel 8](https://laravel.com/docs/8.x/installation)**

### Front-End

- **HTML**
- **CSS**
- **[Bootstrap 5](https://getbootstrap.com/)**
- **[VueJs 3](https://vuejs.org/)**
- **[Vuex](https://vuex.vuejs.org/)**

### Database

- **[SQLite](https://www.sqlite.org/docs.html)**

## Installation


> Download Project

``` bash
git clone https://github.com/hussienhewehii/PhoneNumber.git
```

> Install Composer Packages

``` bash
composer install
```

> Install Node Packages

``` bash
npm install
```

> Complite Node Packages

``` bash
npm run dev
```

> Create sqlite database file for production in database folder file
```
choose database name yourself
```
> Create sqlite database file for testing in database folder file
```
choose testing database name yourself
```

> Create .env file

``` bash
cp .env.example .env
```

> Create .env.testing file

``` bash
cp .env.example .env.testing
```

> Configure .env files

``` bash
update both files to look like this:
DB_CONNECTION=sqlite
#DB_HOST=127.0.0.1
#DB_PORT=3306
#DB_DATABASE=laravel
#DB_USERNAME=root
#DB_PASSWORD=

change DB_DATABASE in .env.testing file to sqlite testing database name
```

> Migrate & Seed Database 

``` bash
php artisan migrate --seed
```

> Generate Key

``` bash
php artisan key:generate
```

> Run On Local Machine

``` bash
php artisan serve
```
