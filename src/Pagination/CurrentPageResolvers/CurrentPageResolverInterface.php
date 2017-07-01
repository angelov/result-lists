<?php

namespace Angelov\ResultLists\Pagination\CurrentPageResolvers;

interface CurrentPageResolverInterface
{
    public function resolve(string $pageAttribute = 'page') : int;
}
