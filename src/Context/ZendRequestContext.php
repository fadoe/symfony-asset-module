<?php

namespace FaDoe\SymfonyAssetModule\Context;

use Symfony\Component\Asset\Context\ContextInterface;
use Zend\Http\PhpEnvironment\Request;

/**
 * Class ZendRequestContext
 *
 * @package FaDoe\SymfonyAssetModule\Context
 */
class ZendRequestContext implements ContextInterface
{
    /**
     * @var Request
     */
    private $request;

    /**
     * ZendRequestContext constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Gets the base path.
     *
     * @return string The base path
     */
    public function getBasePath(): string
    {
        return $this->request->getBasePath();
    }

    /**
     * Checks whether the request is secure or not.
     *
     * @return bool true if the request is secure, false otherwise
     */
    public function isSecure(): bool
    {
        return true;
    }
}
