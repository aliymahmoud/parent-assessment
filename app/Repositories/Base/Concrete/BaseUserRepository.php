<?php
namespace App\Repositories\Base\Concrete;

class BaseUserRepository
{
    private $availableFilters = [
        'statusCode',
        'currency',
        'provider',
        'balanceMin',
        'balanceMax'
    ];
    public function index(array $filters)
    {
        return 'Hello World from base, happy api versioning!';
    }
}