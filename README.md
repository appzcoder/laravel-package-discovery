# Laravel Package Auto Discovery

### Requirements
    Laravel >=5.1
    PHP >= 5.5.9

## Installation
Open your terminal(CLI), go to the root directory of your Laravel project, then follow the following procedure.

1. Run
    ```
    composer require appzcoder/laravel-package-discovery
    ```

2. Add service provider to **config/app.php**.
    ```php
    'providers' => [
        ...

        Appzcoder\LaravelPackageDiscovery\ServiceProvider::class,
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


## Author

[Sohel Amin](http://www.sohelamin.com)
