<?php
namespace FaDoe\SymfonyAssetModule\Package;

use Zend\ServiceManager\ServiceLocatorInterface;

class PackagesFactory
{
    /**
     * @param ServiceLocatorInterface $serviceLocatorInterface
     *
     * @return PackagesService
     */
    public function __invoke(ServiceLocatorInterface $serviceLocatorInterface)
    {
        $context = $serviceLocatorInterface->get('FaDoe\SymfonyAssetModule\Context');

        return new PackagesService($context);
    }
}
