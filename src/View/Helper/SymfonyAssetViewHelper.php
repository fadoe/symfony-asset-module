<?php
namespace FaDoe\SymfonyAssetModule\View\Helper;

use Symfony\Component\Asset\Packages;
use Zend\View\Helper\AbstractHelper;

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
     * @param string      $path
     * @param null|string $packageName
     *
     * @return string
     */
    public function getUrl($path, $packageName = null)
    {
        return $this->packages->getUrl($path, $packageName);
    }

    /**
     * @param string      $path
     * @param null|string $packageName
     *
     * @return string
     */
    public function __invoke($path, $packageName = null)
    {
        return $this->getUrl($path, $packageName);
    }
}
