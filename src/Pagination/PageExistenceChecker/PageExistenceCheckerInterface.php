<?php

namespace Angelov\ResultLists\Pagination\PageExistenceChecker;

use Angelov\ResultLists\Pagination\PaginatableResultsInterface;

interface PageExistenceCheckerInterface
{
    public function hasNextPage(PaginatableResultsInterface $list, int $currentPage = 1) : bool;

    public function hasPreviousPage(PaginatableResultsInterface $list, int $currentPage = 1) : bool;
}
