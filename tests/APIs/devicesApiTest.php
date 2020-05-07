<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\devices;

class devicesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_devices()
    {
        $devices = factory(devices::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/devices', $devices
        );

        $this->assertApiResponse($devices);
    }

    /**
     * @test
     */
    public function test_read_devices()
    {
        $devices = factory(devices::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/devices/'.$devices->id
        );

        $this->assertApiResponse($devices->toArray());
    }

    /**
     * @test
     */
    public function test_update_devices()
    {
        $devices = factory(devices::class)->create();
        $editeddevices = factory(devices::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/devices/'.$devices->id,
            $editeddevices
        );

        $this->assertApiResponse($editeddevices);
    }

    /**
     * @test
     */
    public function test_delete_devices()
    {
        $devices = factory(devices::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/devices/'.$devices->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/devices/'.$devices->id
        );

        $this->response->assertStatus(404);
    }
}
