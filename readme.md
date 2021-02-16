# Generator Codes

Generator can be run from web browser or CLI.Your choose.

- From webstite you need to open `index.php` from `app/index.php`
- From CLI run code from main folder.Example :
```sh
> php app\Scripts\CreateCodes.php --numberOfCodes 1000000 --lengthCombination 15 --file C:\Users\nevvg\Desktop\generateCodes.txt
```

### MINIMUM REQUIREMENTS

- composer
- PHP >=7.4
- Server with PHP

### INSTALATION

* After download run from terminal `composer install && composer dump-autoload`
* If you run in ubuntu remember about add permissions to folder `chmod 777 -R `
* Open index.php on the server with PHP if you want to web browser Generator
* If you prefer terminal run command below

### CLI

```sh
php CreateCodes.php --numberOfCodes 1000000 --lengthCombination 15 --file C:\Users\nevvg\Desktop\generateCodes.txt
```