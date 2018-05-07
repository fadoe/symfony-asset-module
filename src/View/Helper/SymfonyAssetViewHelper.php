<?php

namespace FaDoe\SymfonyAssetModule\View\Helper;

use Symfony\Component\Asset\Packages;
use Zend\View\Helper\AbstractHelper;

/**
 * Class SymfonyAssetViewHelper
 *
 * @package FaDoe\SymfonyAssetModule\View\Helper
 */
class SymfonyAssetViewHelper extends AbstractHelper
{
    /**
     * @var Packages
     */
    private $packages;

    /**
     * SymfonyAssetViewHelper constructor.
     *
     * @param Packages $packages
     */
    public function __construct(Packages $packages)
    {
        $this->packages = $packages;
    }

    /**
     * @param string $path
     * @param null|string $packageName
     *
     * @return string
     */
    public function __invoke(string $path, string $packageName = null): string
    {
        return $this->getUrl($path, $packageName);
    }

    /**
     * @param string $path
     * @param null|string $packageName
     *
     * @return string
     */
    public function getUrl(string $path, string $packageName = null): string
    {
        return $this->packages->getUrl($path, $packageName);
    }
}
