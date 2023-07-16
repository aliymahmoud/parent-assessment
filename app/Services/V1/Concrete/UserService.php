<?php
namespace App\Services\V1\Concrete;

use App\Services\V1\Abstraction\UserServiceI;
use App\Repositories\V1\Abstraction\UserRepositoryI;

class UserService implements UserServiceI
{
    protected $repository;
    function __construct(UserRepositoryI $repository)
    {
        $this->repository = $repository;
    }

    public function index(array $filters = [])
    {
        $filters = $this->prepareFilters($filters);
        return [$this->repository->index($filters), 200];
    }

    private function prepareFilters(array $filters)
    {
        $filters = array_filter($filters, function ($value) {
            return $value !== null;
        });
        $availableFilters = $this->getAvailableFilters();
        $filters = array_intersect_key($filters, $availableFilters);
        return $filters;
    }

    private function getAvailableFilters()
    {
        return [
            'statusCode' => '',
            'balanceMin' => '',
            'balanceMax' => '',
            'currency'   => '',
            'provider'   => '',
        ];
    }


}