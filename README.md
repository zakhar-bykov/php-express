# php-express
Mini PHP web framework like express for Node.JS

> I am trying to make this router as cool as express for node.js.
> <br>Help me pls 🙏

## Installation
```
composer require zakhar-bykov/php-express
```

## Example
```php
require( __DIR__ . '/vendor/autoload.php' );

$app = new Express\Application();


$app -> all('/', function() {
    echo '<h1>Home page.</h1>';
});

$app -> get('/about', function() {
    echo '<h1>About page.</h1>';
});

$app -> post('/login', function() {
    echo '<h1>Login action.</h1>';
});

$app -> listen();
```

## License
[MIT](https://choosealicense.com/licenses/mit/)
