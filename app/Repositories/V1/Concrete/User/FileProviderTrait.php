<?php
namespace App\Repositories\V1\Concrete\User;

use App\Repositories\V1\Abstraction\FilterInterface;
use App\Repositories\V1\Concrete\User\Filters\StatusCodeFilter;
use App\Repositories\V1\Concrete\User\Filters\CurrencyFilter;
use App\Repositories\V1\Concrete\User\Filters\BalanceMinFilter;
use App\Repositories\V1\Concrete\User\Filters\BalanceMaxFilter;

trait FileProviderTrait
{
    protected $filters = [
        'currency'   => CurrencyFilter::class,
        'statusCode' => StatusCodeFilter::class,
        'balanceMin' => BalanceMinFilter::class,
        'balanceMax' => BalanceMaxFilter::class,
    ];

    function applyFilters($requestFilters = [])
    {
        $filterProviders = array_intersect_key($this->filters, $requestFilters);
        foreach ($filterProviders as $requestFilterKey => $filterProvider) {
            $requestFilterValue = $requestFilters[$requestFilterKey];
            $this->filter(new $filterProvider, $requestFilterKey, $requestFilterValue);
        }
    }

    private function filter(FilterInterface $filterProvider, $requestKey, $requestValue)
    {
        $objectKey = $this->jsonObjectKeys[$requestKey];
        $filteredData = $filterProvider->apply($this, $objectKey, $requestValue);
        $this->setInternalData($filteredData);
    }

    function setData($data)
    {
        $transformedData = array_map(function ($item) {
            return array_intersect_key($item, array_flip($this->jsonObjectKeys));
        }, $data['users']);
        $this->setInternalData($transformedData);
    }

    private function setInternalData($data)
    {
        $this->data = $data;
    }
    
    function getData(): array
    {
        return $this->data;
    }

}