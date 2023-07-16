<?php
namespace App\Services\Base\Concrete;

use App\Services\Base\Abstraction\BaseUserServiceI;

class BaseUserService implements BaseUserServiceI
{
    public function index()
    {
        return 'Hello World';
    }
}