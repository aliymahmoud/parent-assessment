<?php
namespace App\Repositories\V1\Concrete\User;

use App\Repositories\V1\Concrete\User\FileProviderTrait;
use App\Repositories\V1\Abstraction\JsonFileProviderI;

class ProviderXRepository implements JsonFileProviderI
{
    use FileProviderTrait;
    
    public $jsonObjectKeys = [
        'balanceMin' => 'parentAmount',
        'balanceMax' => 'parentAmount',
        'statusCode' => 'statusCode',
        'currency'   => 'Currency',
        'email'      => 'parentEmail',
        'date'       => 'registerationDate',
        'id'         => 'parentIdentification'

    ];
    public $filePath = 'DataSource/User/ProviderX.json';
    public $statusCode = [
        'authorised' => 1,
        'decline'    => 2,
        'refunded'   => 3
    ];
    private $data = [];

    
}