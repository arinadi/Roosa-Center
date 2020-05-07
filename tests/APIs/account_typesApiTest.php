<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\account_types;

class account_typesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_account_types()
    {
        $accountTypes = factory(account_types::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/account_types', $accountTypes
        );

        $this->assertApiResponse($accountTypes);
    }

    /**
     * @test
     */
    public function test_read_account_types()
    {
        $accountTypes = factory(account_types::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/account_types/'.$accountTypes->id
        );

        $this->assertApiResponse($accountTypes->toArray());
    }

    /**
     * @test
     */
    public function test_update_account_types()
    {
        $accountTypes = factory(account_types::class)->create();
        $editedaccount_types = factory(account_types::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/account_types/'.$accountTypes->id,
            $editedaccount_types
        );

        $this->assertApiResponse($editedaccount_types);
    }

    /**
     * @test
     */
    public function test_delete_account_types()
    {
        $accountTypes = factory(account_types::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/account_types/'.$accountTypes->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/account_types/'.$accountTypes->id
        );

        $this->response->assertStatus(404);
    }
}
