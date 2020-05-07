<?php namespace Tests\Repositories;

use App\Models\devices;
use App\Repositories\devicesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class devicesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var devicesRepository
     */
    protected $devicesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->devicesRepo = \App::make(devicesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_devices()
    {
        $devices = factory(devices::class)->make()->toArray();

        $createddevices = $this->devicesRepo->create($devices);

        $createddevices = $createddevices->toArray();
        $this->assertArrayHasKey('id', $createddevices);
        $this->assertNotNull($createddevices['id'], 'Created devices must have id specified');
        $this->assertNotNull(devices::find($createddevices['id']), 'devices with given id must be in DB');
        $this->assertModelData($devices, $createddevices);
    }

    /**
     * @test read
     */
    public function test_read_devices()
    {
        $devices = factory(devices::class)->create();

        $dbdevices = $this->devicesRepo->find($devices->id);

        $dbdevices = $dbdevices->toArray();
        $this->assertModelData($devices->toArray(), $dbdevices);
    }

    /**
     * @test update
     */
    public function test_update_devices()
    {
        $devices = factory(devices::class)->create();
        $fakedevices = factory(devices::class)->make()->toArray();

        $updateddevices = $this->devicesRepo->update($fakedevices, $devices->id);

        $this->assertModelData($fakedevices, $updateddevices->toArray());
        $dbdevices = $this->devicesRepo->find($devices->id);
        $this->assertModelData($fakedevices, $dbdevices->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_devices()
    {
        $devices = factory(devices::class)->create();

        $resp = $this->devicesRepo->delete($devices->id);

        $this->assertTrue($resp);
        $this->assertNull(devices::find($devices->id), 'devices should not exist in DB');
    }
}
