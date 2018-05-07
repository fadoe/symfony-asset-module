<?php

namespace FaDoe\SymfonyAssetModule;

/**
 * Class Module
 *
 * @package FaDoe\SymfonyAssetModule
 */
class Module
{
    /**
     * Returns configuration to merge with application configuration
     *
     * @return array|\Traversable
     */
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}
