<?php

namespace Angelov\ResultLists\Pagination\CurrentRequestResolvers;

use Psr\Http\Message\ServerRequestInterface;

interface CurrentRequestResolverInterface
{
    public function getCurrentRequest() : ServerRequestInterface;
}
