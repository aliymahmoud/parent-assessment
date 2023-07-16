<?php
namespace App\Repositories\V1\Abstraction;

use App\Repositories\V1\Abstraction\jsonFileProviderI;

interface FilterInterface 
{
    function apply(jsonFileProviderI $provider, $itemKey, $value);
}