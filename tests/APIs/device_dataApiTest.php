<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\device_data;

class device_dataApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_device_data()
    {
        $deviceData = factory(device_data::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/device_data', $deviceData
        );

        $this->assertApiResponse($deviceData);
    }

    /**
     * @test
     */
    public function test_read_device_data()
    {
        $deviceData = factory(device_data::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/device_data/'.$deviceData->id
        );

        $this->assertApiResponse($deviceData->toArray());
    }

    /**
     * @test
     */
    public function test_update_device_data()
    {
        $deviceData = factory(device_data::class)->create();
        $editeddevice_data = factory(device_data::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/device_data/'.$deviceData->id,
            $editeddevice_data
        );

        $this->assertApiResponse($editeddevice_data);
    }

    /**
     * @test
     */
    public function test_delete_device_data()
    {
        $deviceData = factory(device_data::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/device_data/'.$deviceData->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/device_data/'.$deviceData->id
        );

        $this->response->assertStatus(404);
    }
}
