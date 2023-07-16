<?php
namespace App\Services\Base\Abstraction;

interface BaseUserServiceI
{
    public function index(array $filters = []);
}