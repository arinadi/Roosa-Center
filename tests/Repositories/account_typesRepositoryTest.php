<?php namespace Tests\Repositories;

use App\Models\account_types;
use App\Repositories\account_typesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class account_typesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var account_typesRepository
     */
    protected $accountTypesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->accountTypesRepo = \App::make(account_typesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_account_types()
    {
        $accountTypes = factory(account_types::class)->make()->toArray();

        $createdaccount_types = $this->accountTypesRepo->create($accountTypes);

        $createdaccount_types = $createdaccount_types->toArray();
        $this->assertArrayHasKey('id', $createdaccount_types);
        $this->assertNotNull($createdaccount_types['id'], 'Created account_types must have id specified');
        $this->assertNotNull(account_types::find($createdaccount_types['id']), 'account_types with given id must be in DB');
        $this->assertModelData($accountTypes, $createdaccount_types);
    }

    /**
     * @test read
     */
    public function test_read_account_types()
    {
        $accountTypes = factory(account_types::class)->create();

        $dbaccount_types = $this->accountTypesRepo->find($accountTypes->id);

        $dbaccount_types = $dbaccount_types->toArray();
        $this->assertModelData($accountTypes->toArray(), $dbaccount_types);
    }

    /**
     * @test update
     */
    public function test_update_account_types()
    {
        $accountTypes = factory(account_types::class)->create();
        $fakeaccount_types = factory(account_types::class)->make()->toArray();

        $updatedaccount_types = $this->accountTypesRepo->update($fakeaccount_types, $accountTypes->id);

        $this->assertModelData($fakeaccount_types, $updatedaccount_types->toArray());
        $dbaccount_types = $this->accountTypesRepo->find($accountTypes->id);
        $this->assertModelData($fakeaccount_types, $dbaccount_types->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_account_types()
    {
        $accountTypes = factory(account_types::class)->create();

        $resp = $this->accountTypesRepo->delete($accountTypes->id);

        $this->assertTrue($resp);
        $this->assertNull(account_types::find($accountTypes->id), 'account_types should not exist in DB');
    }
}
