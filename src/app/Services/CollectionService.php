<?php

namespace App\Services;

use Illuminate\Support\Collection;

class CollectionService
{
    /**
     * Получение рандомных записей
     *
     * @param Collection $collection
     * @param int $count
     * @return array
     */
    public static function getRandom(Collection $collection, int $count): array
    {
        $result = [];
        while (count($result) < $count) {
            $item = $collection->random();
            if (!in_array($item, $result)) {
                $result[] = $item;
            }
        }

        return $result;
    }
}
