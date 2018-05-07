<?php

namespace FaDoe\SymfonyAssetModule\Context;

use Psr\Container\ContainerInterface;

/**
 * Class ZendRequestContextFactory
 *
 * @package FaDoe\SymfonyAssetModule\Context
 */
class ZendRequestContextFactory
{
    /**
     * @param ContainerInterface $container
     *
     * @return ZendRequestContext
     */
    public function __invoke(ContainerInterface $container)
    {
        $request = $container->get('Request');

        return new ZendRequestContext($request);
    }
}
