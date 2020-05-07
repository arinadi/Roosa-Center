<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\device_data_categories;

class device_data_categoriesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_device_data_categories()
    {
        $deviceDataCategories = factory(device_data_categories::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/device_data_categories', $deviceDataCategories
        );

        $this->assertApiResponse($deviceDataCategories);
    }

    /**
     * @test
     */
    public function test_read_device_data_categories()
    {
        $deviceDataCategories = factory(device_data_categories::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/device_data_categories/'.$deviceDataCategories->id
        );

        $this->assertApiResponse($deviceDataCategories->toArray());
    }

    /**
     * @test
     */
    public function test_update_device_data_categories()
    {
        $deviceDataCategories = factory(device_data_categories::class)->create();
        $editeddevice_data_categories = factory(device_data_categories::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/device_data_categories/'.$deviceDataCategories->id,
            $editeddevice_data_categories
        );

        $this->assertApiResponse($editeddevice_data_categories);
    }

    /**
     * @test
     */
    public function test_delete_device_data_categories()
    {
        $deviceDataCategories = factory(device_data_categories::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/device_data_categories/'.$deviceDataCategories->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/device_data_categories/'.$deviceDataCategories->id
        );

        $this->response->assertStatus(404);
    }
}
