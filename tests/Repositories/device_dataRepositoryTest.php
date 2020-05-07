<?php namespace Tests\Repositories;

use App\Models\device_data;
use App\Repositories\device_dataRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class device_dataRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var device_dataRepository
     */
    protected $deviceDataRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->deviceDataRepo = \App::make(device_dataRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_device_data()
    {
        $deviceData = factory(device_data::class)->make()->toArray();

        $createddevice_data = $this->deviceDataRepo->create($deviceData);

        $createddevice_data = $createddevice_data->toArray();
        $this->assertArrayHasKey('id', $createddevice_data);
        $this->assertNotNull($createddevice_data['id'], 'Created device_data must have id specified');
        $this->assertNotNull(device_data::find($createddevice_data['id']), 'device_data with given id must be in DB');
        $this->assertModelData($deviceData, $createddevice_data);
    }

    /**
     * @test read
     */
    public function test_read_device_data()
    {
        $deviceData = factory(device_data::class)->create();

        $dbdevice_data = $this->deviceDataRepo->find($deviceData->id);

        $dbdevice_data = $dbdevice_data->toArray();
        $this->assertModelData($deviceData->toArray(), $dbdevice_data);
    }

    /**
     * @test update
     */
    public function test_update_device_data()
    {
        $deviceData = factory(device_data::class)->create();
        $fakedevice_data = factory(device_data::class)->make()->toArray();

        $updateddevice_data = $this->deviceDataRepo->update($fakedevice_data, $deviceData->id);

        $this->assertModelData($fakedevice_data, $updateddevice_data->toArray());
        $dbdevice_data = $this->deviceDataRepo->find($deviceData->id);
        $this->assertModelData($fakedevice_data, $dbdevice_data->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_device_data()
    {
        $deviceData = factory(device_data::class)->create();

        $resp = $this->deviceDataRepo->delete($deviceData->id);

        $this->assertTrue($resp);
        $this->assertNull(device_data::find($deviceData->id), 'device_data should not exist in DB');
    }
}
