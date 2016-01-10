<?php
namespace FaDoe\SymfonyAssetModule\Context;

use Zend\ServiceManager\ServiceLocatorInterface;

class ZendRequestContextFactory
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return ZendRequestContext
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $request = $serviceLocator->get('Request');

        return new ZendRequestContext($request);
    }
}
