<?php
namespace FaDoe\SymfonyAssetModule\View\Helper;

use Symfony\Component\Asset\Packages;
use Zend\View\HelperPluginManager;

class SymfonyAssetViewHelperFactory
{
    /**
     * @param HelperPluginManager $pluginManager
     *
     * @return SymfonyAssetViewHelper
     * @throws \Exception
     */
    public function __invoke(HelperPluginManager $pluginManager)
    {
        $serviceLocator = $pluginManager->getServiceLocator();

        $config = $serviceLocator->get('Config');

        if (false === isset($config['fadoe_symfony_asset_module'])) {
            throw new \Exception('Config not found');
        }

        $config = $config['fadoe_symfony_asset_module'];

        $packagesService = $serviceLocator->get('FaDoe\SymfonyAssetModule\PackagesService');

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
