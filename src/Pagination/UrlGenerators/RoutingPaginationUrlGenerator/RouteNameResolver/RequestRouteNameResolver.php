<?php

namespace Angelov\ResultLists\Pagination\UrlGenerators\RoutingPaginationUrlGenerator\RouteNameResolver;

use Symfony\Component\HttpFoundation\RequestStack;

class RequestRouteNameResolver implements RouteNameResolverInterface
{
    private $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function resolveCurrentRouteName(): string
    {
        $request = $this->requestStack->getCurrentRequest();

        // @todo do something when the attribute is not available
        return $request->attributes->get('_route');
    }
}
