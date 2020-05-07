<?php namespace Tests\Repositories;

use App\Models\device_data_categories;
use App\Repositories\device_data_categoriesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class device_data_categoriesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var device_data_categoriesRepository
     */
    protected $deviceDataCategoriesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->deviceDataCategoriesRepo = \App::make(device_data_categoriesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_device_data_categories()
    {
        $deviceDataCategories = factory(device_data_categories::class)->make()->toArray();

        $createddevice_data_categories = $this->deviceDataCategoriesRepo->create($deviceDataCategories);

        $createddevice_data_categories = $createddevice_data_categories->toArray();
        $this->assertArrayHasKey('id', $createddevice_data_categories);
        $this->assertNotNull($createddevice_data_categories['id'], 'Created device_data_categories must have id specified');
        $this->assertNotNull(device_data_categories::find($createddevice_data_categories['id']), 'device_data_categories with given id must be in DB');
        $this->assertModelData($deviceDataCategories, $createddevice_data_categories);
    }

    /**
     * @test read
     */
    public function test_read_device_data_categories()
    {
        $deviceDataCategories = factory(device_data_categories::class)->create();

        $dbdevice_data_categories = $this->deviceDataCategoriesRepo->find($deviceDataCategories->id);

        $dbdevice_data_categories = $dbdevice_data_categories->toArray();
        $this->assertModelData($deviceDataCategories->toArray(), $dbdevice_data_categories);
    }

    /**
     * @test update
     */
    public function test_update_device_data_categories()
    {
        $deviceDataCategories = factory(device_data_categories::class)->create();
        $fakedevice_data_categories = factory(device_data_categories::class)->make()->toArray();

        $updateddevice_data_categories = $this->deviceDataCategoriesRepo->update($fakedevice_data_categories, $deviceDataCategories->id);

        $this->assertModelData($fakedevice_data_categories, $updateddevice_data_categories->toArray());
        $dbdevice_data_categories = $this->deviceDataCategoriesRepo->find($deviceDataCategories->id);
        $this->assertModelData($fakedevice_data_categories, $dbdevice_data_categories->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_device_data_categories()
    {
        $deviceDataCategories = factory(device_data_categories::class)->create();

        $resp = $this->deviceDataCategoriesRepo->delete($deviceDataCategories->id);

        $this->assertTrue($resp);
        $this->assertNull(device_data_categories::find($deviceDataCategories->id), 'device_data_categories should not exist in DB');
    }
}
