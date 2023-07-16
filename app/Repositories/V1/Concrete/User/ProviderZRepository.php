<?php

namespace App\Repositories\V1\Concrete\User;

use App\Repositories\V1\Concrete\User\FileProviderTrait;
use App\Repositories\V1\Abstraction\JsonFileProviderI;

class ProviderZRepository implements JsonFileProviderI
{
    use FileProviderTrait;

    public $jsonObjectKeys = [
        'balanceMin' => 'MockingAmount',
        'balanceMax' => 'MockingAmount',
        'statusCode' => 'MockingStatusCode',
        'currency'   => 'MockingCurrency',
        'email'      => 'MockingEmail',
        'date'       => 'MockingDate',
        'id'         => 'MockingIdentification'

    ];
    public $filePath = 'DataSource/User/ProviderZ.json';
    public $statusCode = [
        'authorised' => 8000,
        'decline'    => 3000,
        'refunded'   => 4000
    ];
    private $data = [];
}
