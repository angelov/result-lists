<?php

namespace Angelov\ResultLists\Sorting;

interface SortableResultsInterface
{
    /**
     * @param OrderField[] $fields
     * @return void
     */
    public function orderBy(array $fields);

    /**
     * @return OrderField[]
     */
    public function getOrderFields() : array;
}
