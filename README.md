![alt text](https://cdn.marshmallow-office.com/media/images/logo/marshmallow.transparent.red.png "marshmallow.")

# Laravel Nova Field to display sizes

### Installatie
```bash
composer require marshmallow/nova-fields-size
```

### Usage
```php
// In short:
Size::make('Column')
		->sortable(),


/**
 * Extended
 */
Size::make('Database Size')

	/**
	 * Options: ['bytes', 'Kb', 'Mb', 'Gb']
	 * Default: bytes
	 */
	->isStoredAs('bytes')		//

	/**
	 * Options: ['bytes', 'Kb', 'Mb', 'Gb', 'Auto']
	 * Default: Auto
	 */
	->displayAs('Auto')

	/**
	 * Default: 2
	 */
	->precision(2),
```
