<?php

namespace Angelov\ResultLists\Pagination\UrlGenerators\RoutingPaginationUrlGenerator\UrlPropertiesResolver;

use Symfony\Component\HttpFoundation\RequestStack;

class RequestUrlPropertiesResolver implements UrlPropertiesResolverInterface
{
    private $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function resolve(): array
    {
        $request = $this->requestStack->getCurrentRequest();

        return $request->query->all();
    }
}
