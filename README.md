# Archived
With the release of Statamic [4.16.0](https://github.com/statamic/cms/releases/tag/v4.16.0) and Eloquent driver [4.4.0](https://github.com/statamic/eloquent-driver/releases/tag/v4.4.0) this is no longer needed. We can now set the [global sets in the config](https://github.com/statamic/eloquent-driver/blob/master/config/eloquent-driver.php#L60). This creates a file with settings on creating a global. This will tell Statamic on other environments that this global exists. The data of that global will still be stored in [it's own table](https://github.com/statamic/eloquent-driver/blob/master/config/eloquent-driver.php#L65) when set to eloquent.

# Statamic Eloquent Driver Globalset Migration Generator

When you're using the [Statamic Eloquent Driver](https://github.com/statamic/eloquent-driver) creating a new globalset will result in a new entry in the `global_sets` table. If you're working with multiple environments like [DTAP](https://en.wikipedia.org/wiki/Development,_testing,_acceptance_and_production); that new entry isn't visible on the next environment in the row after committing your changes. This package aims to fix that problem by creating a database migration for it. This way you can commit the migration and the entry will be made when you run `php artisan migrate` on deployment. More info: [#128](https://github.com/statamic/eloquent-driver/issues/128)

## Installation

```
composer require justbetter/statamic-eloquent-driver-globalset-migration-generator
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
