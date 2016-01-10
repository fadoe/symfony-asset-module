<?php
namespace FaDoe\SymfonyAssetModule\Context;

use Zend\Http\PhpEnvironment\Request;
use Zend\ServiceManager\ServiceLocatorInterface;

class ZendRequestContextFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ZendRequestContextFactory
     */
    private $zendRequestContextFactory;

    protected function setUp()
    {
        $this->zendRequestContextFactory = new ZendRequestContextFactory();
    }

    public function testInitialState()
    {
        $this->assertTrue(method_exists($this->zendRequestContextFactory, '__invoke'));
    }

    public function testInvoke()
    {
        $request = $this->getMockBuilder(Request::class)->disableOriginalConstructor()->getMock();
        $serviceLocator = $this->getMock(ServiceLocatorInterface::class);
        $serviceLocator->expects($this->once())
            ->method('get')
            ->with('Request')
            ->willReturn($request);

        $this->assertInstanceOf(
            ZendRequestContext::class,
            $this->zendRequestContextFactory->__invoke($serviceLocator)
        );
    }
}
