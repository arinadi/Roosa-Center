<?php namespace Tests\Repositories;

use App\Models\bot_users;
use App\Repositories\bot_usersRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class bot_usersRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var bot_usersRepository
     */
    protected $botUsersRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->botUsersRepo = \App::make(bot_usersRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_bot_users()
    {
        $botUsers = factory(bot_users::class)->make()->toArray();

        $createdbot_users = $this->botUsersRepo->create($botUsers);

        $createdbot_users = $createdbot_users->toArray();
        $this->assertArrayHasKey('id', $createdbot_users);
        $this->assertNotNull($createdbot_users['id'], 'Created bot_users must have id specified');
        $this->assertNotNull(bot_users::find($createdbot_users['id']), 'bot_users with given id must be in DB');
        $this->assertModelData($botUsers, $createdbot_users);
    }

    /**
     * @test read
     */
    public function test_read_bot_users()
    {
        $botUsers = factory(bot_users::class)->create();

        $dbbot_users = $this->botUsersRepo->find($botUsers->id);

        $dbbot_users = $dbbot_users->toArray();
        $this->assertModelData($botUsers->toArray(), $dbbot_users);
    }

    /**
     * @test update
     */
    public function test_update_bot_users()
    {
        $botUsers = factory(bot_users::class)->create();
        $fakebot_users = factory(bot_users::class)->make()->toArray();

        $updatedbot_users = $this->botUsersRepo->update($fakebot_users, $botUsers->id);

        $this->assertModelData($fakebot_users, $updatedbot_users->toArray());
        $dbbot_users = $this->botUsersRepo->find($botUsers->id);
        $this->assertModelData($fakebot_users, $dbbot_users->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_bot_users()
    {
        $botUsers = factory(bot_users::class)->create();

        $resp = $this->botUsersRepo->delete($botUsers->id);

        $this->assertTrue($resp);
        $this->assertNull(bot_users::find($botUsers->id), 'bot_users should not exist in DB');
    }
}
