<?php

namespace FaDoe\SymfonyAssetModule\Package;

use Symfony\Component\Asset\Context\ContextInterface;
use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\PackageInterface;
use Symfony\Component\Asset\PathPackage;
use Symfony\Component\Asset\UrlPackage;
use Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy;
use Symfony\Component\Asset\VersionStrategy\StaticVersionStrategy;
use Symfony\Component\Asset\VersionStrategy\VersionStrategyInterface;

/**
 * Class PackagesService
 *
 * @package FaDoe\SymfonyAssetModule\Package
 */
class PackagesService
{
    /**
     * @var ContextInterface
     */
    private $context;

    /**
     * PackageFactory constructor.
     *
     * @param ContextInterface $context
     */
    public function __construct(ContextInterface $context = null)
    {
        $this->context = $context;
    }

    /**
     * @param string|null $version
     * @param string|null $versionFormat
     * @param string|null $basePath
     * @param array|null $baseUrls
     *
     * @return PackageInterface
     */
    public function createService(
        string $version = null,
        string $versionFormat = null,
        string $basePath = null,
        array $baseUrls = null
    ) {
        $strategy = $this->createStrategy($version, $versionFormat);
        $package  = $this->createPackage($strategy, $basePath, $baseUrls);

        return $package;
    }

    /**
     * @param string $version
     * @param string $versionFormat
     *
     * @return VersionStrategyInterface
     */
    private function createStrategy(string $version, string $versionFormat): VersionStrategyInterface
    {
        if (null === $version) {
            $strategy = new EmptyVersionStrategy();
        } else {
            $strategy = new StaticVersionStrategy($version, $versionFormat);
        }

        return $strategy;
    }

    /**
     * @param VersionStrategyInterface $strategy
     *
     * @param string|null $basePath
     * @param array $baseUrls
     *
     * @return PackageInterface
     */
    private function createPackage(
        VersionStrategyInterface $strategy,
        string $basePath = null,
        array $baseUrls = null
    ): PackageInterface {
        $context = $this->context;

        if (null !== $basePath) {
            $package = new PathPackage($basePath, $strategy, $context);
        } elseif (null !== $baseUrls) {
            $package = new UrlPackage($baseUrls, $strategy, $context);
        } else {
            $package = new Package($strategy, $context);
        }

        return $package;
    }
}
