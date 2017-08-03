<?php

namespace Angelov\ResultLists\Pagination\CurrentPageResolvers;

use Angelov\ResultLists\Pagination\CurrentRequestResolvers\CurrentRequestResolverInterface;

class RequestCurrentPageResolver implements CurrentPageResolverInterface
{
    private $requestResolver;

    public function __construct(CurrentRequestResolverInterface $requestResolver)
    {
        $this->requestResolver = $requestResolver;
    }

    public function resolve(string $pageAttribute = 'page') : int
    {
        $queryValue = $this->requestResolver->getCurrentRequest()->getQueryParams()[$pageAttribute];

        if (is_numeric($queryValue)) {
            return (int) $queryValue;
        }

        return 1;
    }
}
