Basic is a simple Yii2 Project
============================

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

the enviroment should support Yii2, for the project is based on Yii2.


INSTALLATION
------------

### Install from an Archive File

Extract the archive file downloaded to a directory named `basic` that is directly under the Web root.

Set cookie validation key in `config/web.php` file to some random secret string:

```php
'request' => [
    // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
    'cookieValidationKey' => '<secret random string goes here>',
],
```

You can then access the application through the following URL:

~~~
http://localhost/basic/web/
~~~


CONFIGURATION
-------------

### Database

1. CREATE DATABASE basic;

**NOTE:** this project won't create the database for you, this has to be done MANUALLY before you can access it.

2. Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=basic',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
];
```

3. php yii migrate, to create some tables and relation tables

4. http://localhost/basic/web/


### TODO:
1. Add books into library


Enjoy it!
