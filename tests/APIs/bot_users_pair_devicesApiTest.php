<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\bot_users_pair_devices;

class bot_users_pair_devicesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_bot_users_pair_devices()
    {
        $botUsersPairDevices = factory(bot_users_pair_devices::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/bot_users_pair_devices', $botUsersPairDevices
        );

        $this->assertApiResponse($botUsersPairDevices);
    }

    /**
     * @test
     */
    public function test_read_bot_users_pair_devices()
    {
        $botUsersPairDevices = factory(bot_users_pair_devices::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/bot_users_pair_devices/'.$botUsersPairDevices->id
        );

        $this->assertApiResponse($botUsersPairDevices->toArray());
    }

    /**
     * @test
     */
    public function test_update_bot_users_pair_devices()
    {
        $botUsersPairDevices = factory(bot_users_pair_devices::class)->create();
        $editedbot_users_pair_devices = factory(bot_users_pair_devices::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/bot_users_pair_devices/'.$botUsersPairDevices->id,
            $editedbot_users_pair_devices
        );

        $this->assertApiResponse($editedbot_users_pair_devices);
    }

    /**
     * @test
     */
    public function test_delete_bot_users_pair_devices()
    {
        $botUsersPairDevices = factory(bot_users_pair_devices::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/bot_users_pair_devices/'.$botUsersPairDevices->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/bot_users_pair_devices/'.$botUsersPairDevices->id
        );

        $this->response->assertStatus(404);
    }
}
