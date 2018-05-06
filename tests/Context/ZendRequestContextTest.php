<?php

namespace FaDoe\SymfonyAssetModule\Context;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Asset\Context\ContextInterface;
use Zend\Http\PhpEnvironment\Request;

class ZendRequestContextTest extends TestCase
{
    /**
     * @var ZendRequestContext
     */
    private $zendRequestContext;

    /**
     * @var Request|\PHPUnit_Framework_MockObject_MockObject
     */
    private $request;

    protected function setUp()
    {
        $this->request = $this->getMockBuilder(Request::class)->disableOriginalConstructor()->getMock();

        $this->zendRequestContext = new ZendRequestContext($this->request);
    }

    public function testInitialState()
    {
        $this->assertInstanceOf(ContextInterface::class, $this->zendRequestContext);
    }

    public function testGetBasePath()
    {
        $this->request->expects($this->once())
            ->method('getBasePath')
            ->willReturn('/');

        $this->assertEquals('/', $this->zendRequestContext->getBasePath());
    }

    public function testIsSecure()
    {
        $this->assertTrue($this->zendRequestContext->isSecure());
    }
}
