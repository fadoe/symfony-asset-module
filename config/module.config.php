<?php

use FaDoe\SymfonyAssetModule\Context\ZendRequestContextFactory;
use FaDoe\SymfonyAssetModule\Package\PackagesFactory;
use FaDoe\SymfonyAssetModule\View\Helper\SymfonyAssetViewHelperFactory;

return [
    'fadoe_symfony_asset_module' => [
        'version' => 1,
        'version_format' => null,
        'base_path' => null,
        'base_urls' => null,
        'packages' => [],
    ],
    'service_manager' => [
        'factories' => [
            'FaDoe\SymfonyAssetModule\Context' => ZendRequestContextFactory::class,
            'FaDoe\SymfonyAssetModule\PackagesService' => PackagesFactory::class,
        ],
    ],
    'view_helpers' => [
        'factories' => [
            'assetUrl' => SymfonyAssetViewHelperFactory::class
        ],
    ],
];
