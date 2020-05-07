<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\device_command;

class device_commandApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_device_command()
    {
        $deviceCommand = factory(device_command::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/device_commands', $deviceCommand
        );

        $this->assertApiResponse($deviceCommand);
    }

    /**
     * @test
     */
    public function test_read_device_command()
    {
        $deviceCommand = factory(device_command::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/device_commands/'.$deviceCommand->id
        );

        $this->assertApiResponse($deviceCommand->toArray());
    }

    /**
     * @test
     */
    public function test_update_device_command()
    {
        $deviceCommand = factory(device_command::class)->create();
        $editeddevice_command = factory(device_command::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/device_commands/'.$deviceCommand->id,
            $editeddevice_command
        );

        $this->assertApiResponse($editeddevice_command);
    }

    /**
     * @test
     */
    public function test_delete_device_command()
    {
        $deviceCommand = factory(device_command::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/device_commands/'.$deviceCommand->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/device_commands/'.$deviceCommand->id
        );

        $this->response->assertStatus(404);
    }
}
