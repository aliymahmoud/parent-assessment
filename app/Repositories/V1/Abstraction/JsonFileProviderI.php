<?php
namespace App\Repositories\V1\Abstraction;

interface JsonFileProviderI
{
    /**
     * @property string $filePath
     * @property array $jsonObjectKeys
     * @property array $filters
     * @property array $statusCode
     */
    function applyFilters(array $filters = []);
    function setData(array $data);
    function getData(): array;
}