# Nova Gutenberg
Forked from [Gutenberg editor](https://github.com/GeneaLabs/nova-gutenberg).

## Changes
- [X] Change text direction ability.
- [X] Fixed hard reload on save.

## Requirements
- Laravel Nova
- PHP 7.1.0+

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
