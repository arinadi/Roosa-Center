<?php namespace Tests\Repositories;

use App\Models\device_command;
use App\Repositories\device_commandRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class device_commandRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var device_commandRepository
     */
    protected $deviceCommandRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->deviceCommandRepo = \App::make(device_commandRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_device_command()
    {
        $deviceCommand = factory(device_command::class)->make()->toArray();

        $createddevice_command = $this->deviceCommandRepo->create($deviceCommand);

        $createddevice_command = $createddevice_command->toArray();
        $this->assertArrayHasKey('id', $createddevice_command);
        $this->assertNotNull($createddevice_command['id'], 'Created device_command must have id specified');
        $this->assertNotNull(device_command::find($createddevice_command['id']), 'device_command with given id must be in DB');
        $this->assertModelData($deviceCommand, $createddevice_command);
    }

    /**
     * @test read
     */
    public function test_read_device_command()
    {
        $deviceCommand = factory(device_command::class)->create();

        $dbdevice_command = $this->deviceCommandRepo->find($deviceCommand->id);

        $dbdevice_command = $dbdevice_command->toArray();
        $this->assertModelData($deviceCommand->toArray(), $dbdevice_command);
    }

    /**
     * @test update
     */
    public function test_update_device_command()
    {
        $deviceCommand = factory(device_command::class)->create();
        $fakedevice_command = factory(device_command::class)->make()->toArray();

        $updateddevice_command = $this->deviceCommandRepo->update($fakedevice_command, $deviceCommand->id);

        $this->assertModelData($fakedevice_command, $updateddevice_command->toArray());
        $dbdevice_command = $this->deviceCommandRepo->find($deviceCommand->id);
        $this->assertModelData($fakedevice_command, $dbdevice_command->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_device_command()
    {
        $deviceCommand = factory(device_command::class)->create();

        $resp = $this->deviceCommandRepo->delete($deviceCommand->id);

        $this->assertTrue($resp);
        $this->assertNull(device_command::find($deviceCommand->id), 'device_command should not exist in DB');
    }
}
