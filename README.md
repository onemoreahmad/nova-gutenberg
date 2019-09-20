# Nova Gutenberg
This package is
Implementation of the [Gutenberg editor](https://wordpress.org/gutenberg/) as a Laravel Nova Field based on [Laraberg](https://github.com/VanOns/laraberg).

## Requirements
- Laravel Nova
- PHP 7.1.0+

## Changes
- [X] Change text direction ability.
- [X] Fixed hard reload on save.


## Installation
1. Install the package:
  ```sh
  composer require vysotsky-productions/nova-gutenberg:*
  ```

2. Publish Laravel FileManager's assets and config:
  ```sh
  php artisan vendor:publish --tag=lfm_config
  php artisan vendor:publish --tag=lfm_public
  ```

## Usage
```php
use VysotskyProductions\NovaGutenberg\Gutenberg;

class BlogPost extends Resource
{
    // ...

    public function fields(Request $request) : array
    {
        return [
            // ...
            Gutenberg::make("Content")
                ->direction("rtl"),
            // ...
        ];
    }

    // ...
}
```

### Preview
<img width="1658" alt="Screen Shot 2019-05-22 at 12 30 21 PM" src="https://prnt.sc/p8rjfv">
