<?php
namespace App\Repositories\V1\Concrete\User;

use App\Repositories\V1\Concrete\User\FileProviderTrait;
use App\Repositories\V1\Abstraction\JsonFileProviderI;

class ProviderYRepository implements JsonFileProviderI
{
    use FileProviderTrait;

    public $jsonObjectKeys = [
        'balanceMin' => 'balance',
        'balanceMax' => 'balance',
        'currency'   => 'currency',
        'email'      => 'email',
        'statusCode' => 'status',
        'date'       => 'created_at',
        'id'         => 'id'

    ];
    public $filePath = 'DataSource/User/ProviderY.json';
    public $statusCode = [
        'authorised' => 100,
        'decline'    => 200,
        'refunded'   => 300
    ];
    private $data = [];
}