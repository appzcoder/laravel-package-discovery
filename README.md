# Laravel Package Auto Discovery
This package supports Package Auto Discovery feature on Laravel older version (less than 5.5)

### Requirements
    Laravel >=5.1
    PHP >= 5.5.9

## Installation
Open your terminal(CLI), go to the root directory of your Laravel project, then follow the following procedure.

1. Run
    ```
    composer require appzcoder/laravel-package-discovery:dev-master
    ```

2. Add service provider to **config/app.php**.
    ```php
    'providers' => [
        ...

        Appzcoder\LaravelPackageDiscovery\LaravelPackageDiscoveryServiceProvider::class,
    ],
    ```

3. Add the dump script to **composer.json**.
    ```json
    "scripts": {
        ...

        "post-autoload-dump": [
            "Appzcoder\\LaravelPackageDiscovery\\ComposerScripts::postDump"
        ]
    },
    ```

4. Run ```composer dump-autoload```

## Usage
Make sure your package's **composer.json** file as below
    ```json
    "extra": {
        "laravel": {
            "providers": [
                "Barryvdh\\Debugbar\\ServiceProvider"
            ],
            "aliases": {
                "Debugbar": "Barryvdh\\Debugbar\\Facade"
            }
        }
    }
    ```

## Author

[Sohel Amin](http://www.sohelamin.com)
