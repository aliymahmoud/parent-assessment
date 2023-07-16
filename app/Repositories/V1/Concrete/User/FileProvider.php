<?php
namespace App\Repositories\V1\Concrete\User;

use App\Helpers\JSONHelper;
use App\Repositories\Base\Abstraction\UserFileProviderI;
use App\Repositories\Base\Concrete\BaseUserRepository;
use App\Repositories\V1\Abstraction\jsonFileProviderI;
use App\Repositories\V1\Abstraction\UserRepositoryI;
use App\Repositories\V1\Concrete\User\ProviderXRepository;
use App\Repositories\V1\Concrete\User\ProviderYRepository;

class FileProvider extends BaseUserRepository implements UserRepositoryI, UserFileProviderI
{
    protected $providers = [
        'DataProviderX' => ProviderXRepository::class,
        'DataProviderY' => ProviderYRepository::class,
    ];

    function index(array $filters = []) {
        $providers = $this->providers;

        if (!array_key_exists('provider', $filters)) {
            $data = [];
            foreach ($providers as $provider) {
                $data = array_merge($data, $this->fetch(new $provider, $filters));
            }
            return $data;
        }

        if (!array_key_exists($filters['provider'], $providers)) {
            throw new \Exception('Provider not found');
        }

        $provider = $providers[$filters['provider']];
        $filtersExceptProvider = array_diff_key($filters, ['provider' => '']);
        $data = $this->fetch(new $provider, $filtersExceptProvider);
        return $data;
    }

    
    private function fetch(jsonFileProviderI $provider, $filters = []) {
        $data = JSONHelper::readDataFromJsonFile($provider->filePath);
        $provider->setData($data);
        $provider->applyFilters($filters);
        $filteredData = $provider->getData();
        return $filteredData;
    }
}