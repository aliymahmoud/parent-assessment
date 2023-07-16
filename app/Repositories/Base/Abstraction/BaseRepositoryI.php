<?php
namespace App\Repositories\Base\Abstraction;

interface BaseRepositoryI
{
    public function index(array $filters = []);
}