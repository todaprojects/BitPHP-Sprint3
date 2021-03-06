# BitPHP-Sprint3

## A minimalist CMS:
  - for publishing blog posts;
  - with user & admin interfaces.

## Features

  ### user interface
  - navigate menu;
  - read posts;
      
  ### admin interface
  - login / logout;
  - update & delete recent posts;
  - publish new post.
  
## Usage

1) Initial configurations on file **'`/config/bootstrap.php`'**:

1. 1 set a relative path of app's directory:
```php
    /*
    * relative path of project directory, :
    * '/' (if URL http://localhost/)
    * '/app-directory/' (if URL http://localhost/app-directory/)
    * '/php/app-directory/' (if URL http://localhost/php/app-directory/)
    */
    define('ROOT_PATH', '/app-directory/');
```

1. 2 set database parameters:
```php
    // database configuration parameters
    $conn = array(
        'driver'   => 'pdo_mysql',
        'host'     => 'localhost',  // location of MySQL server
        'dbname'   => 'db_name',    // database name
        'user'     => 'root',       // user name
        'password' => 'root'        // user password
    );

```
2) App uses PHP Doctrine ORM and it should be installed before using this app:

    2.1  open **`command prompt`** inside the project directory.

    2.2 run command: **`php composer.phar install`** (or **`composer install`**, if _PHP Composer path_ is stored in System variables).

    2.3 run command: **`vendor/bin/doctrine orm:schema-tool:update --force --dump-sql`** (on Unix) or - **`vendor\bin\doctrine orm:schema-tool:update --force --dump-sql`** (on windows)

3) Sql database initial data can be imported from the **'`db_data.sql`'** file, located in the **'`/config`'** folder.

4) After above mentioned configuration, app can be started by running **'`index.php`'** on app directory.

> ![image](https://user-images.githubusercontent.com/70706753/99279322-c991fe80-2838-11eb-8dce-e96f0949c39e.png)

5) **Admin interface** can be accessed by adding writing **`admin/`** to the end of URL:

> ![image](https://user-images.githubusercontent.com/70706753/99280646-3e196d00-283a-11eb-8988-73970c9c9115.png)
> 
> ![image](https://user-images.githubusercontent.com/70706753/99283084-31e2df00-283d-11eb-93c2-59e3d4f1fe2d.png)

> 5.1 access post for an update:
![image](https://user-images.githubusercontent.com/70706753/99281581-56d65280-283b-11eb-9df9-d73d6b561ffa.png)

> 5.2 publish a new post:
> ![image](https://user-images.githubusercontent.com/70706753/99281889-b46a9f00-283b-11eb-86e9-438b0afa67a6.png)

> 5.3 making a logout after blog post managing has been done:
> ![image](https://user-images.githubusercontent.com/70706753/99282387-496d9800-283c-11eb-85b3-cc1afdfc30b6.png)
