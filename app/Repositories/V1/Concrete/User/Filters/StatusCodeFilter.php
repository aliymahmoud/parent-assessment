<?php
namespace App\Repositories\V1\Concrete\User\Filters;

use App\Repositories\V1\Abstraction\FilterInterface;
use App\Repositories\V1\Abstraction\jsonFileProviderI;

class StatusCodeFilter implements FilterInterface
{

    function apply(jsonFileProviderI $provider, $itemKey, $value)
    {
        $data = $provider->getData();
        if (array_key_exists($value, $provider->statusCode)){
            $statusCode = $provider->statusCode[$value];
        }
        $data = array_filter($data, function ($item) use ($statusCode, $itemKey) {
            return $item[$itemKey] == $statusCode;
        });
        return $data;
    }
}