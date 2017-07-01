<?php

namespace Angelov\ResultLists\Pagination\UrlGenerators\RoutingPaginationUrlGenerator\RouteNameResolver;

interface RouteNameResolverInterface
{
    public function resolveCurrentRouteName() : string;
}
