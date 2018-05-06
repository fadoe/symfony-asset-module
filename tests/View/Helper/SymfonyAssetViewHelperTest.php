<?php

namespace FaDoe\SymfonyAssetModule\View\Helper;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Asset\Packages;
use Zend\View\Helper\AbstractHelper;

class SymfonyAssetViewHelperTest extends TestCase
{
    /**
     * @var SymfonyAssetViewHelper
     */
    private $viewHelper;

    /**
     * @var Packages|\PHPUnit_Framework_MockObject_MockObject
     */
    private $packages;

    protected function setUp()
    {
        $this->packages = $this->getMockBuilder(Packages::class)->getMock();

        $this->viewHelper = new SymfonyAssetViewHelper($this->packages);
    }

    public function initialState()
    {
        $this->assertInstanceOf(AbstractHelper::class, $this->viewHelper);
    }

    public function testGetUrl()
    {
        $path = '/image.jpg';
        $packageName = null;
        $this->packages->expects($this->once())
            ->method('getUrl')
            ->with($path, $packageName);

        $this->viewHelper->getUrl($path, $packageName);
    }

    public function testInvoke()
    {
        $path = '/image.jpg';
        $packageName = null;
        $this->packages->expects($this->once())
            ->method('getUrl')
            ->with($path, $packageName);

        $this->viewHelper->__invoke($path, $packageName);
    }
}
