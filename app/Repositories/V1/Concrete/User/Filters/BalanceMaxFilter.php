<?php

namespace App\Repositories\V1\Concrete\User\Filters;

use App\Repositories\V1\Abstraction\FilterInterface;

class BalanceMaxFilter implements FilterInterface
{

    function apply($provider, $itemKey, $value)
    {
        $data = $provider->getData();
        $data = array_filter($data, function ($item) use ($value, $itemKey) {
            return $item[$itemKey] <= $value;
        });
        return $data;
    }
}
