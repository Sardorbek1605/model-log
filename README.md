# model-log
Create history log for laravel model. This package can be used for creating log form model.

<!--/delete-->

## Installation
You should add repository to your composer.json file

```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/dostontiu/model-log"
    }
]
```

You can install the package via composer:

```bash
composer require dostontiu/model-log
```

## Configuration

1. You should publish migration files
```bash
php artisan vendor:publish --provider="Dostontiu\ModelLog\ModelLogServiceProvider"
```
2. Run migration
```bash
php artisan migrate
```
## Usage

You should add UpdateLoggable trait for necessary model 

```php
namespace App\Services\ModelLog;

use Dostontiu\ModelLog\Services\ModelLogService;
use Dostontiu\ModelLog\Traits\UpdateLoggable;

class User extends Modal
{
    use UpdateLoggable;
}
```

## License

The MIT License (MIT).