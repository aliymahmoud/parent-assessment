<?php

namespace Tests\Unit;

use Tests\TestCase;


class ListUsersTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    // we can mock provider z which implements JsonFileProviderI interface to assert number of data based on every filter
    public function test_get_all_users_end_point()
    {
        $this->get('/api/users')->assertStatus(200);
    }

    function test_get_all_users_with_currency_filter()
    {
        $response = $this->get('/api/users?currency=USD');
        $response->assertStatus(200);
    }

    function test_get_all_users_with_provider_filter()
    {
        $this->get('/api/users?provider=DataProviderX')->assertStatus(200);
        $this->get('/api/users?provider=DataProviderY')->assertStatus(200);
    }

    function test_get_all_users_with_status_code_filter()
    {
        $response = $this->get('/api/users?status_code=authorised');
        $response->assertStatus(200);
    }

    function test_get_all_users_with_min_max_amount()
    {
        $response = $this->get('/api/users?balanceMax=1000&balanceMin=100');
        $response->assertStatus(200);
    }
}
