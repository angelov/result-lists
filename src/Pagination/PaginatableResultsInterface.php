<?php

namespace Angelov\ResultLists\Pagination;

interface PaginatableResultsInterface
{
    /**
     * @return void
     */
    public function setOffset(int $offset);

    public function getOffset() : int;

    /**
     * @return void
     */
    public function setItemsPerPage(int $items);

    public function getItemsPerPage() : int;

    public function countTotal() : int;

    public function getResults() : array;
}
