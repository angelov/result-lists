<?php

namespace Angelov\ResultLists\Pagination\UrlGenerators\RoutingPaginationUrlGenerator\UrlPropertiesResolver;

use Angelov\ResultLists\Pagination\CurrentRequestResolvers\CurrentRequestResolverInterface;

class RequestUrlPropertiesResolver implements UrlPropertiesResolverInterface
{
    private $requestResolver;

    public function __construct(CurrentRequestResolverInterface $requestResolver)
    {
        $this->requestResolver = $requestResolver;
    }

    public function resolve() : array
    {
        return $this->requestResolver->getCurrentRequest()->getQueryParams();
    }
}
