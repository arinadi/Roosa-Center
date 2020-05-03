<?php namespace Tests\Repositories;

use App\Models\telegram_users;
use App\Repositories\telegram_usersRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class telegram_usersRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var telegram_usersRepository
     */
    protected $telegramUsersRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->telegramUsersRepo = \App::make(telegram_usersRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_telegram_users()
    {
        $telegramUsers = factory(telegram_users::class)->make()->toArray();

        $createdtelegram_users = $this->telegramUsersRepo->create($telegramUsers);

        $createdtelegram_users = $createdtelegram_users->toArray();
        $this->assertArrayHasKey('id', $createdtelegram_users);
        $this->assertNotNull($createdtelegram_users['id'], 'Created telegram_users must have id specified');
        $this->assertNotNull(telegram_users::find($createdtelegram_users['id']), 'telegram_users with given id must be in DB');
        $this->assertModelData($telegramUsers, $createdtelegram_users);
    }

    /**
     * @test read
     */
    public function test_read_telegram_users()
    {
        $telegramUsers = factory(telegram_users::class)->create();

        $dbtelegram_users = $this->telegramUsersRepo->find($telegramUsers->id);

        $dbtelegram_users = $dbtelegram_users->toArray();
        $this->assertModelData($telegramUsers->toArray(), $dbtelegram_users);
    }

    /**
     * @test update
     */
    public function test_update_telegram_users()
    {
        $telegramUsers = factory(telegram_users::class)->create();
        $faketelegram_users = factory(telegram_users::class)->make()->toArray();

        $updatedtelegram_users = $this->telegramUsersRepo->update($faketelegram_users, $telegramUsers->id);

        $this->assertModelData($faketelegram_users, $updatedtelegram_users->toArray());
        $dbtelegram_users = $this->telegramUsersRepo->find($telegramUsers->id);
        $this->assertModelData($faketelegram_users, $dbtelegram_users->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_telegram_users()
    {
        $telegramUsers = factory(telegram_users::class)->create();

        $resp = $this->telegramUsersRepo->delete($telegramUsers->id);

        $this->assertTrue($resp);
        $this->assertNull(telegram_users::find($telegramUsers->id), 'telegram_users should not exist in DB');
    }
}
