<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\telegram_users;

class telegram_usersApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_telegram_users()
    {
        $telegramUsers = factory(telegram_users::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/telegram_users', $telegramUsers
        );

        $this->assertApiResponse($telegramUsers);
    }

    /**
     * @test
     */
    public function test_read_telegram_users()
    {
        $telegramUsers = factory(telegram_users::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/telegram_users/'.$telegramUsers->id
        );

        $this->assertApiResponse($telegramUsers->toArray());
    }

    /**
     * @test
     */
    public function test_update_telegram_users()
    {
        $telegramUsers = factory(telegram_users::class)->create();
        $editedtelegram_users = factory(telegram_users::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/telegram_users/'.$telegramUsers->id,
            $editedtelegram_users
        );

        $this->assertApiResponse($editedtelegram_users);
    }

    /**
     * @test
     */
    public function test_delete_telegram_users()
    {
        $telegramUsers = factory(telegram_users::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/telegram_users/'.$telegramUsers->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/telegram_users/'.$telegramUsers->id
        );

        $this->response->assertStatus(404);
    }
}
