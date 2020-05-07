<?php namespace Tests\Repositories;

use App\Models\bot_users_pair_devices;
use App\Repositories\bot_users_pair_devicesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class bot_users_pair_devicesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var bot_users_pair_devicesRepository
     */
    protected $botUsersPairDevicesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->botUsersPairDevicesRepo = \App::make(bot_users_pair_devicesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_bot_users_pair_devices()
    {
        $botUsersPairDevices = factory(bot_users_pair_devices::class)->make()->toArray();

        $createdbot_users_pair_devices = $this->botUsersPairDevicesRepo->create($botUsersPairDevices);

        $createdbot_users_pair_devices = $createdbot_users_pair_devices->toArray();
        $this->assertArrayHasKey('id', $createdbot_users_pair_devices);
        $this->assertNotNull($createdbot_users_pair_devices['id'], 'Created bot_users_pair_devices must have id specified');
        $this->assertNotNull(bot_users_pair_devices::find($createdbot_users_pair_devices['id']), 'bot_users_pair_devices with given id must be in DB');
        $this->assertModelData($botUsersPairDevices, $createdbot_users_pair_devices);
    }

    /**
     * @test read
     */
    public function test_read_bot_users_pair_devices()
    {
        $botUsersPairDevices = factory(bot_users_pair_devices::class)->create();

        $dbbot_users_pair_devices = $this->botUsersPairDevicesRepo->find($botUsersPairDevices->id);

        $dbbot_users_pair_devices = $dbbot_users_pair_devices->toArray();
        $this->assertModelData($botUsersPairDevices->toArray(), $dbbot_users_pair_devices);
    }

    /**
     * @test update
     */
    public function test_update_bot_users_pair_devices()
    {
        $botUsersPairDevices = factory(bot_users_pair_devices::class)->create();
        $fakebot_users_pair_devices = factory(bot_users_pair_devices::class)->make()->toArray();

        $updatedbot_users_pair_devices = $this->botUsersPairDevicesRepo->update($fakebot_users_pair_devices, $botUsersPairDevices->id);

        $this->assertModelData($fakebot_users_pair_devices, $updatedbot_users_pair_devices->toArray());
        $dbbot_users_pair_devices = $this->botUsersPairDevicesRepo->find($botUsersPairDevices->id);
        $this->assertModelData($fakebot_users_pair_devices, $dbbot_users_pair_devices->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_bot_users_pair_devices()
    {
        $botUsersPairDevices = factory(bot_users_pair_devices::class)->create();

        $resp = $this->botUsersPairDevicesRepo->delete($botUsersPairDevices->id);

        $this->assertTrue($resp);
        $this->assertNull(bot_users_pair_devices::find($botUsersPairDevices->id), 'bot_users_pair_devices should not exist in DB');
    }
}
