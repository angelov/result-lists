<?php

namespace Angelov\ResultLists\Pagination\Renderers;

use Angelov\ResultLists\Pagination\PaginatableResultsInterface;

interface PaginationRendererInterface
{
    public function render(PaginatableResultsInterface $list, string $pageAttribute = 'page') : string;
}
