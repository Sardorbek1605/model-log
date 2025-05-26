# model-log
Create history log for laravel model. This package can be used for creating log form model.

<!--/delete-->

## Installation
You should add repository to your composer.json file

```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/Sardorbek1605/model-log"
    }
]
```

You can install the package via composer:

```bash
composer require Sardorbek1605/model-log
```

## Configuration

1. You should publish migration files
```bash
php artisan vendor:publish --provider="Sardorbek\ModelLog\ModelLogServiceProvider"
```
2. Run migration
```bash
php artisan migrate
```
## Usage

You should add UpdateLoggable trait for necessary model 

```php
namespace App\Services\ModelLog;

use Sardorbek\ModelLog\Services\ModelLogService;
use Sardorbek\ModelLog\Traits\UpdateLoggable;

class User extends Modal
{
    use UpdateLoggable;
}
```

## License

The MIT License (MIT).