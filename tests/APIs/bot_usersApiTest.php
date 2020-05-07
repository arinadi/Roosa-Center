<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\bot_users;

class bot_usersApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_bot_users()
    {
        $botUsers = factory(bot_users::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/bot_users', $botUsers
        );

        $this->assertApiResponse($botUsers);
    }

    /**
     * @test
     */
    public function test_read_bot_users()
    {
        $botUsers = factory(bot_users::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/bot_users/'.$botUsers->id
        );

        $this->assertApiResponse($botUsers->toArray());
    }

    /**
     * @test
     */
    public function test_update_bot_users()
    {
        $botUsers = factory(bot_users::class)->create();
        $editedbot_users = factory(bot_users::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/bot_users/'.$botUsers->id,
            $editedbot_users
        );

        $this->assertApiResponse($editedbot_users);
    }

    /**
     * @test
     */
    public function test_delete_bot_users()
    {
        $botUsers = factory(bot_users::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/bot_users/'.$botUsers->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/bot_users/'.$botUsers->id
        );

        $this->response->assertStatus(404);
    }
}
