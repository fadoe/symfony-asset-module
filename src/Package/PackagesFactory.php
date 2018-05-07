<?php

namespace FaDoe\SymfonyAssetModule\Package;

use Psr\Container\ContainerInterface;

/**
 * Class PackagesFactory
 *
 * @package FaDoe\SymfonyAssetModule\Package
 */
class PackagesFactory
{
    /**
     * @param ContainerInterface $container
     *
     * @return PackagesService
     */
    public function __invoke(ContainerInterface $container): PackagesService
    {
        $context = $container->get('FaDoe\SymfonyAssetModule\Context');

        return new PackagesService($context);
    }
}
