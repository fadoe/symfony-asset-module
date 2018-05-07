<?php

namespace FaDoe\SymfonyAssetModule\View\Helper;

use Psr\Container\ContainerInterface;
use Symfony\Component\Asset\Packages;

/**
 * Class SymfonyAssetViewHelperFactory
 *
 * @package FaDoe\SymfonyAssetModule\View\Helper
 */
class SymfonyAssetViewHelperFactory
{
    /**
     * @param ContainerInterface $container
     *
     * @return SymfonyAssetViewHelper
     * @throws \Exception
     */
    public function __invoke(ContainerInterface $container): SymfonyAssetViewHelper
    {
        $config = $container->get('Config');

        if (false === isset($config['fadoe_symfony_asset_module'])) {
            throw new \Exception('Config not found');
        }

        $config = $config['fadoe_symfony_asset_module'];

        $packagesService = $container->get('FaDoe\SymfonyAssetModule\PackagesService');

        $version = $config['version'];
        $versionFormat = $config['version_format'];
        $basePath = $config['base_path'];
        $baseUrls = $config['base_urls'];
        $defaultPackage = $packagesService->createService($version, $versionFormat, $basePath, $baseUrls);

        $namedPackages = [];
        foreach ($config['packages'] as $key => $value) {
            $version = $value['version'];
            $versionFormat = $value['version_format'];
            $basePath = $value['base_path'];
            $baseUrls = $value['base_urls'];
            $namedPackages[$key] = $packagesService->createService($version, $versionFormat, $basePath, $baseUrls);
        }

        $packages = new Packages($defaultPackage, $namedPackages);

        return new SymfonyAssetViewHelper($packages);
    }
}
