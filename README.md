# Statamic Eloquent Driver Globalset Migration Generator

When you're using the [Statamic Eloquent Driver](https://github.com/statamic/eloquent-driver) creating a new globalset will result in a new entry in the `global_sets` table. If you're working with multiple environments like [DTAP](https://en.wikipedia.org/wiki/Development,_testing,_acceptance_and_production); that new entry isn't visible on the next environment in the row after committing your changes. This package aims to fix that problem by creating a database migration for it. This way you can commit the migration and the entry will be made when you run `php artisan migrate` on deployment.

## Installation

```
composer require statamic-eloquent-driver-globalset-migration-generator
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
