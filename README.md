# instalike-me-php
PHP library for http://instalike.me API

## Usage
```php
require('./instalike-me.php');

$insta = new InstaLikeMe('YOUR-API-KEY');

$data = $insta->api('ping', []);

var_dump($data);
```
