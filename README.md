# Symfony Asset Module

## Installation

Install ```fadoe/symfony-asser-module``` via composer.

## Configuration

The config key is ```fadoe_symfony_asset_module```. You can extend the configuration in your ```autoload/global.php```:

```php
return [
    'fadoe_symfony_asset_module' => [
        'version' => 1,
        'version_format' => null,
        'base_path' => null,
        'base_urls' => null,
        'packages' => [],
    ],
];
```

## Example

Asset version is 1, the format is ```<image>?v=<version>```. There is also a named package named project in path ```image/projects```.

```php
return [
    'fadoe_symfony_asset_module' => [
        'version' => 1,
        'version_format' => "%s?v=%s,
        'base_path' => null,
        'base_urls' => null,
        'packages' => [
            'project' => [
                'version' => 1,
                'base_path' => 'image/project'
            ],
        ],
    ],
];
```

In you template you can now write:

```php
<?php echo $this->assetUrl('image.jpg'); ?>
```

This will output:

```html
image.jpg?v=1
```

When you use the naming package configuration:

```php
<?php echo $this->assetUrl('image.jpg', 'project'); ?>
```

Here is the result:

```html
/image/project/image.jpg?1
```
